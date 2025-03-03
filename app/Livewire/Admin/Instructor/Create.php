<?php

namespace App\Livewire\Admin\Instructor;

use App\Livewire\AdminComponent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

class Create extends AdminComponent
{

    #[title('تسجيل محاضر جديد')]

    #[Validate('required|min:4|max:20|string|regex:/^(?!.*[<>]).*$/')]
    public $name;

    #[validate('required|min:4|max:8|string|confirmed')]
    public $password;

    public $password_confirmation;


    #[validate('required|email|unique:users,email')]
    public $email ;


    protected $messages = [
        'name.required' => 'الاسم مطلوب',
        'name.regex' => 'الاسم يجب أن يحتوي على حروف فقط (بما في ذلك الحروف العربية)',
        'name.min' => 'الاسم يجب أن يكون على الأقل 4 أحرف',
        'name.max' => 'الاسم يجب أن لا يتجاوز 20 حرفًا',

        'password.required' => 'كلمة المرور مطلوبة',
        'password.regex' => 'كلمة المرور يجب أن تحتوي على حروف فقط (بما في ذلك الحروف العربية)',
        'password.min' => 'كلمة المرور يجب أن تكون على الأقل 4 أحرف',
        'password.max' => 'كلمة المرور يجب أن لا تتجاوز 8 أحرف',
        'password.confirmed' => 'تأكيد كلمة المرور غير مطابق',

        'email.required' => 'البريد الإلكتروني مطلوب',
        'email.email' => 'البريد الإلكتروني غير صالح',
    ];

    public function store()
    {

        $this->validate();

        User::create(
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => 'instructor',
            ]
        );

        session()->flash('success', ' تم تسجيل المحاضر بنجاح');

        $this->redirect(route('admin.instructors'));
    }
    public function render()
    {
        return view('livewire.admin.instructor.create');
    }
}
