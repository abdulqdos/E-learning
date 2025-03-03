<?php

namespace App\Livewire\Admin\Courses;

use App\Livewire\AdminComponent;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Create extends AdminComponent
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

    #[validate('required|exists:users,id')]
    public $instructor;

    #[validate('required|in:beginner,intermediate,advanced')]
    public $level = 'beginner';

    #[validate('required|image|max:1024')]
    public $img = '';

    public $img_url = '';

    public function store()
    {

        $this->validate();

        if ($this->img && !app()->runningUnitTests()) {
            $this->img_url = $this->img->storePublicly('courses_photos', ['disk' => 'public']);
        }


        Course::create([
           'title' => $this->title,
           'description' => $this->description,
           'category_id' => $this->category,
           'instructor_id' => $this->instructor,
            'level' => $this->level,
            'img_url' => $this->img_url,
            'status' => $this->status
        ]);

        session()->flash('success', ' تم إنشاء كورس بنجاح');

        return redirect()->route('admin.courses');
    }

    public function render()
    {
        $instructor = User::where('role' , 'instructor');
        return view('livewire.admin.courses.create', [
            'categories' => Category::all(),
            'instructors' => $instructor->get(),
        ]);
    }
}
