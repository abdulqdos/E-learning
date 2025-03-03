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

class Edit extends AdminComponent
{
    use WithFileUploads;

    #[Title('تعديل كورس')]

    public Course $course;

    #[Validate('required|string|min:3|max:255')]
    public $title;

    #[Validate('required|in:ongoing,completed,not_started')]
    public $status;

    #[Validate('required|string|min:10')]
    public $description;

    #[Validate('required|exists:categories,id')]
    public $category;

    #[Validate('required|exists:users,id')]
    public $instructor;

    #[Validate('required|in:beginner,intermediate,advanced')]
    public $level;

    #[Validate('nullable|image|max:1024')]
    public $img;

    public $img_url;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->title = $course->title;
        $this->status = $course->status;
        $this->description = $course->description;
        $this->category = $course->category_id;
        $this->instructor = $course->instructor_id;
        $this->level = $course->level;
        $this->img_url = $course->img_url;
    }

    public function update()
    {
        $this->validate();

        if ($this->img) {

            if ($this->course->img_url) {
                Storage::disk('public')->delete($this->course->img_url);
            }

            $this->img_url = $this->img->store('courses_photos', 'public');

        } elseif (!$this->img && $this->course->img_url) {
            $this->img_url = $this->course->img_url;
        }

        $this->course->update([
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category,
            'instructor_id' => $this->instructor,
            'level' => $this->level,
            'img_url' => $this->img_url,
            'status' => $this->status,
        ]);

        session()->flash('success', 'تم تحديث الكورس بنجاح');
        return redirect()->route('admin.courses');
    }

    public function render()
    {
        return view('livewire.admin.courses.edit', [
            'categories' => Category::all(),
            'instructors' => User::where('role', 'instructor')->get(),
        ]);
    }
}
