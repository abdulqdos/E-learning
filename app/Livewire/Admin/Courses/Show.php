<?php

namespace App\Livewire\Admin\Courses;

use App\Livewire\AdminComponent;
use App\Models\Course;
use Livewire\Attributes\Title;

class Show extends AdminComponent
{
    #[title('عرض الكورس')]

    public ?Course $course;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.admin.courses.show' , [
            'course' => $this->course
        ]);
    }
}
