<?php

namespace App\Livewire\Admin\Instructor;

use App\Livewire\AdminComponent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends AdminComponent
{
    #[title('تعديل بيانات المحاضر')]

    #[validate('required|min:4|max:20|string')]
    public $name ;

    public $change_password = false;

    public $old_password;

    #[validate('sometimes|min:4|max:8|string|confirmed')]
    public $new_password;
    public $new_password_confirmation;


    #[validate('required|email|unique:users,email,except,id')]
    public $email ;

    public User $instructor ;

//    public $img ;
//
//    public $img_url ;
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

    public function mount(User $instructor)
    {
        $this->instructor = $instructor ;
        $this->name = $instructor->name ;
        $this->email = $instructor->email ;
    }

    public function update()
    {

        if ($this->change_password) {
            if (!Hash::check($this->old_password, $this->instructor->password)) {
                throw ValidationException::withMessages([
                    'old_password' => ['كلمة مرور قديمة غير صحيحة'],
                ]);
            }

            $this->validate([
                'new_password' => 'required|min:4|max:22|string|confirmed',
            ]);
            $this->instructor->update([
                'password' => Hash::make($this->new_password),
            ]);
        }

        $this->validate([
            'name' => 'required|min:4|max:20|string',
            'email' => 'required|email'
        ]);


        $this->instructor->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'تم تحديث البيانات بنجاح');
        $this->redirect(route('admin.instructors'));
    }


    public function render()
    {
        return view('livewire.admin.instructor.edit');
    }
}
