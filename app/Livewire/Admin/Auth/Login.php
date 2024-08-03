<?php

namespace App\Livewire\Admin\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    public $phone = "";
    public $password = "";

    #[Layout('layouts.admin.login'), Title('أكرمها - تسجيل الدخول')]
    public function render()
    {
        return view('livewire.admin.auth.login');
    }

    #[On('submitting-admin-login-data')]
    public function submit()
    {
        $admin = User::where('phone', $this->phone)->first();

        if ($admin) {
            if (Hash::check($this->password, $admin->password)) {
                Auth::login($admin);
                return redirect()->route('index');
            }

            $this->dispatch('admin-db-login-validation', ["password" => "تأكد من كلمة المرور!"]);
            return "";
        }

        $this->dispatch('admin-db-login-validation', ["email" => "تأكد من رقم الهاتف لو سمحت !"]);
        return "";
    }
}
