<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

trait ModelHelper
{
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeData($query)
    {
        $columns = array_merge(['id'], $this->getFillable());
        return $query->select($columns);
    }

    public function scopeDeleteModel(Builder $builder, $id)
    {
        $model = $builder->find($id);
        $builder->deletePhoto($id);
        if ($model) {
            $model->delete();
            return "تم حذف البيانات بنجاح";
        }

        return false;
    }

    public function scopeChangeStatus(Builder $builder, $id)
    {
        $model = $builder->find($id);
        if ($model) {
            $model->update([
                'status' => $model->status == 'active' ? 'inactive' : 'active'
            ]);
            return "تم تحديث الحالة بنجاح";
        }

        return false;
    }

    public function deleteLivewireTempFiles()
    {
        if (Storage::disk('local')->exists('livewire-tmp')) {
            Storage::disk('local')->deleteDirectory('livewire-tmp');
        }
        return "";
    }

    public function scopeDeletePhoto(Builder $builder, $id)
    {
        $model = $builder->find($id);
        if ($model->photo) {
            if (Storage::disk('public')->exists($model->photo)) {
                Storage::disk('public')->delete($model->photo);
            }
        }
        return "";
    }

    public function scopeDeleteFile(Builder $builder, $id, $name)
    {
        $model = $builder->find($id);
        if ($model->{$name}) {
            if (Storage::disk('public')->exists($model->{$name})) {
                Storage::disk('public')->delete($model->{$name});
            }
        }
        return "";
    }

    public function scopeDeleteVideo(Builder $builder, $id)
    {
        $model = $builder->find($id);
        if ($model->video) {
            if (Storage::disk('public')->exists($model->video)) {
                Storage::disk('public')->delete($model->video);
            }
        }

        return "";
    }

    public function scopeStoreFile(Builder $builder, $file)
    {
        if ($file) {
            $file_path = $file->store($this->file_path, 'public');
            return $file_path;
        }

        return "";
    }
}
