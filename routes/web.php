<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Courses\index as Course;
use App\Livewire\Admin\Courses\Create as CourseCreate;
use App\Livewire\Admin\Courses\Edit as CourseEdit;
use App\Livewire\Admin\Courses\Show as CourseShow;
use App\Livewire\Admin\instructor\index as instructor;
use App\Livewire\Admin\instructor\Create as instructorCreate;
use App\Livewire\Admin\instructor\Edit as instructorEdit;

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;

use App\Livewire\Instructor\Dashboard as instructorDashboard;
use App\Livewire\Instructor\Courses\index as instructorCourse;
use App\Livewire\Instructor\Courses\Create as instructorCreateCourse;
use App\Livewire\Instructor\Courses\Show as instructorShowCourse;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');


Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect(route('home'));
    })->name('logout');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', Dashboard::class)->name('admin');

    // Courses
    Route::get('/admin/courses', Course::class)->name('admin.courses');
    Route::get('/admin/courses/create', CourseCreate::class)->name('admin.courses.create');
    Route::get('/admin/courses/{course}', CourseShow::class)->name('admin.courses.show');
    Route::get('/admin/courses/{course}/edit', CourseEdit::class)->name('admin.courses.edit');

    // Instructors
    Route::get('/admin/instructors', Instructor::class)->name('admin.instructors');
    Route::get('/admin/instructors/create', InstructorCreate::class)->name('admin.instructors.create');
    Route::get('/admin/instructors/{instructor}/edit', InstructorEdit::class)->name('admin.instructors.edit');
});

Route::middleware('instructor')->group(function () {

    Route::get('/instructor', instructorDashboard::class)->name('instructor');
    Route::get('/instructors/{instructor}', instructorDashboard::class)->name('instructors.index');
    Route::get('/instructors/{instructor}/courses', instructorCourse::class)->name('instructors.courses');
    Route::get('/instructors/{instructor}/courses/create', instructorCreateCourse::class)->name('instructors.courses.create');
    Route::get('/instructors/{instructor}/courses/{course}', instructorShowCourse::class)->name('instructors.courses.show');

});
