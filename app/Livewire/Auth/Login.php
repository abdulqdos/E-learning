<?php

namespace App\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Title('تسجيل دخول')]
    #[validate('required|email')]
    public $email;

    #[validate('required|min:8|max:20')]
    public $password;
    public function authenticate()
    {
        $this->validate();
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            throw ValidationException::withMessages([
                'password' => ['Sorry, the email or password is incorrect.'],
            ]);
        }

        $user = Auth::user();

        Auth::login($user);

        if ($user->role === 'admin')
        {
            return redirect()->route('admin');
        } else if ($user->role === 'instructor')
        {

            return redirect()->route('instructors.index' , $user->id);
        }
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
