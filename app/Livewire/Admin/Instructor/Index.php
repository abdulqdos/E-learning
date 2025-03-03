<?php

namespace App\Livewire\Admin\Instructor;

use App\Livewire\AdminComponent;
use App\Models\User;
use Livewire\Attributes\Title;

class Index extends AdminComponent
{
    #[title('المحاضرين')]
    public function render()
    {
        $instructor = User::where('role' , 'instructor')->orderBy('created_at' , 'desc')->paginate(9);

        return view('livewire.admin.instructor.index' , [
            'instructors' => $instructor,
        ]);
    }
}
