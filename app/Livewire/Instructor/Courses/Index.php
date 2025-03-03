<?php

namespace App\Livewire\Instructor\Courses;

use App\Livewire\InstructorComponent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Title;

class Index extends InstructorComponent
{
    #[title('كورساتي')]
    public $instructor;

    public function mount(User $instructor)
    {
//        Gate::authorize('viewAny', $instructor);
        if($instructor->id !== Auth::user()->id) {
            abort(403);
        }
        $this->instructor = $instructor;
    }

    public function render()
    {
        $courses = $this->instructor->courses;
        return view('livewire.instructor.courses.index' , [
            'courses' => $courses
        ]);
    }
}
