<?php

namespace App\Livewire\Admin\Courses;

use App\Livewire\AdminComponent;
use App\Models\Course;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends AdminComponent
{
    #[title('كورسات')]

    public function delete(Course $course)
    {
            $course->delete();
    }

    public function render()
    {
        $courses = Course::with(['instructor' , 'category'])->orderBy('created_at' , 'desc')->paginate(9);

        return view('livewire.admin.courses.index' , [
            'courses' => $courses,
        ]);
    }
}
