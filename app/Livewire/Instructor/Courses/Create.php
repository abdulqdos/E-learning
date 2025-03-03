<?php

namespace App\Livewire\Instructor\Courses;

use App\Http\Middleware\instructor;
use App\Livewire\InstructorComponent;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends InstructorComponent
{
    use withFileUploads ;
    #[title('إنشاء كورس')]

    #[validate('required|string|min:3|max:255')]
    public $title ;

    #[validate('required|in:ongoing,completed,not_started')]
    public $status ;

    #[validate('required|string|min:10')]
    public $description  ;

    #[validate('required|exists:categories,id')]
    public $category;

    public $instructor;

    #[validate('required|in:beginner,intermediate,advanced')]
    public $level = 'beginner';

    #[validate('required|image|max:1024')]
    public $img = '';

    public $img_url = '';

    public function mount(User $instructor)
    {
        if($instructor->id !== Auth::user()->id) {
            abort(403);
        }

        $this->instructor = $instructor ;
    }

    public function store()
    {

        if ($this->img && !app()->runningUnitTests()) {
            $this->img_url = $this->img->storePublicly('courses_photos', ['disk' => 'public']);
        }



        Course::create([
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category,
            'instructor_id' => $this->instructor->id,
            'level' => $this->level,
            'img_url' => $this->img_url,
            'status' => $this->status
        ]);

        session()->flash('success', ' تم إنشاء كورس بنجاح');

        return redirect()->route('instructors.courses' , $this->instructor->id);
    }
    public function render()
    {
        return view('livewire.instructor.courses.create' , [
            'categories' => Category::all(),
        ]);
    }
}
