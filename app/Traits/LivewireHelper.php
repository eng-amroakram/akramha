<?php

namespace App\Traits;

use App\Http\Controllers\Services\Services;
use Illuminate\Support\Facades\Validator;

trait LivewireHelper
{
    public function changeStatus($id)
    {
        $service = $this->setService();
        $message = $service->changeStatus($id);
        if ($message) {
            $this->alertMessage($message, 'success');
        } else {
            $this->alertMessage("حدث خطأ يرجى المحاولة مرة اخرى", 'error');
        }
    }

    public function delete($id)
    {
        $service = $this->setService();
        $message = $service->delete($id);
        $this->alertMessage($message, 'success');
    }

    public function alertMessage($message, $type)
    {
        $this->alert($type, '', [
            'toast' => true,
            'position' => 'top-start',
            'timer' => 3000,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }

    public function add()
    {
        $service = $this->setService();

        $fillable = $service->model->getFillable();

        $data = [];

        foreach ($fillable as $field) {
            $data[$field] = $this->{$field};
        }

        $rules = $service->rules();
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('validation-errors', $errors);
            $this->alertMessage('يرجى التأكد من إدخال البيانات', 'error');
            return false;
        }

        $model = $service->store($data);

        if ($model) {
            $this->alertMessage('تم تسجيل البيانات بنجاح', 'success');
            $this->dispatch('data-submitted-successfully');
            $this->reset();
            return true;
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل بياناتك', 'error');
        return false;
    }

    public function edit()
    {
        $service = $this->setService();

        $fillable = $service->model->getFillable();

        $data = [];

        foreach ($fillable as $field) {
            $data[$field] = $this->{$field};
        }

        $rules = $service->rules($this->model->id);
        $messages = $service->messages();

        if (array_key_exists('password', $rules)) {
            unset($rules["password"]);
        }

        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('validation-errors', $errors);
            $this->alertMessage('يرجى التأكد من البيانات', 'error');
            return false;
        }

        $result = $service->update($data, $this->model->id);

        if ($result) {
            if ($this->route) {
                return redirect()->route($this->route);
            }

            $this->alertMessage('تم تعديل البيانات بنجاح', 'success');
            $this->dispatch('data-submitted-successfully');
            return true;
        }

        $this->alertMessage('حدث خطأ اثناء تحديث البيانات', 'error');
        return false;
    }
}
