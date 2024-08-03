<?php

namespace App\Livewire\Admin\Users;

use App\Http\Controllers\Services\Services;
use App\Models\User;
use App\Traits\LivewireHelper;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use LivewireHelper;

    public $model = null;

    public $route = 'admin.users.index';
    public $name = '';
    public $phone = "";
    public $email = "";
    public $photo = "";
    public $address = "";
    public $region_id = "";
    public $city_id = "";
    public $password = "";
    public $type = '';
    public $status = '';
    public $facebook = '';
    public $twitter = '';
    public $linkedin = '';
    public $youtube = '';

    private function setService()
    {
        return Services::createInstance("UserService") ?? new Services();
    }

    public function mount(User $user)
    {
        $this->model = $user;
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->region_id = $user->region_id;
        $this->city_id = $user->city_id;
        // $this->photo = $user->photo;
        $this->type = $user->type;
        $this->status = $user->status;
        $this->facebook = $user->facebook;
        $this->twitter = $user->twitter;
        $this->linkedin = $user->linkedin;
        $this->youtube = $user->youtube;
    }

    #[Title('لوحة التحكم - تعديل المستخدم'), Layout('layouts.admin.app')]
    public function render()
    {
        return view('livewire.admin.users.edit-user');
    }

    public function updated($input, $value)
    {
        if ($input == "region_id") {
            $this->city_id = "";
            $this->dispatch('setSelectCities', region_cities($value));
        }
    }
}
