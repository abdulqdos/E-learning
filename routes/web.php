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
<<<<<<< HEAD
=======
use App\Livewire\Instructor\Courses\index as instructorCourse;
>>>>>>> 98fde8b (initial)
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
<<<<<<< HEAD
    return 'ok';
=======
    return view('index');
>>>>>>> 98fde8b (initial)
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
<<<<<<< HEAD
    Route::get('/instructor', instructorDashboard::class)->name('instructor');
=======
    Route::get('/instructors/{instructor}', instructorDashboard::class)->name('instructors.index');
    Route::get('/instructors/{instructor}/courses', instructorCourse::class)->name('instructor.courses');
>>>>>>> 98fde8b (initial)

});
