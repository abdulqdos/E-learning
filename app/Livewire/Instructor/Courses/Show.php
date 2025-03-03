<?php

namespace App\Livewire\Instructor\Courses;

use App\Livewire\InstructorComponent;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Show extends InstructorComponent
{
    #[title('كورس')]
    public ?Course $course;
    public ?User $instructor;

    public function mount(Course $course, User $instructor)
    {

        if($instructor->id !== Auth::user()->id)
        {
            abort(403);
        }

        if ($instructor->courses->contains('id', $course->id)) {
            $this->course = $course;
            $this->instructor = $instructor;
            return;
        }

        abort(403);

    }

    public function render()
    {
        return view('livewire.instructor.courses.show' ,
            [
                'course' => $this->course,
                'instructor' => $this->instructor
            ]);
    }
}
