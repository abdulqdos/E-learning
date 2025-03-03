<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[validate('required|string|regex:/^[a-zA-Z0-9]+$/|min:8|max:20')]
    public $name;

    #[validate('required|email')]
    public $email;

    #[validate('required|min:8|max:20|confirmed')]
    public $password;

    public $password_confirmation;

    public $profile_url ;
    public function signUp()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'student',
            'profile_url' => $this->profile_url ?? 'user_images/default.png'
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
