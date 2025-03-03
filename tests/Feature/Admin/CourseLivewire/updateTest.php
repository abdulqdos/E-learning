<?php

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;


beforeEach(function () {
    $this->category = Category::factory()->create();

    $this->user = User::factory()->create([
        'role' => 'instructor'
    ]);

    $this->admin = User::factory()->create([
        'role' => 'admin'
    ]);

    $this->course = Course::factory()->create();

    $this->data = [
        'title' => 'Frontend',
        'status' => 'ongoing',
        'description' => 'Learn Html Css Js',
        'category' => $this->category->id,
        'instructor' => $this->user->id,
        'level' => 'intermediate',
        'img' => \Illuminate\Http\UploadedFile::fake()->image('test.jpg'),
    ];

    $this->newCourse  = Course::factory()->create(
        [
            'title' => 'Backend Development',
            'status' => 'ongoing',
            'description' => 'Learn Laravel for backend development.',
            'category_id' => $this->category->id,
            'instructor_id' => $this->user->id,
            'level' => 'beginner',
            'img_url' => 'courses_photos/sample.jpg',
        ]
    );
});

it('should return the correct Livewire component', function () {
    Livewire::test('admin.courses.edit')
        ->assertViewIs('livewire.admin.courses.edit');
});


it('must be an admin' , function ($badRole) {
    $auth = User::factory()->create(
        [ 'role' => $badRole ]
    );

    actingAs($auth)->get(route('admin.courses.edit' , [ 'course' => $this->course ]))->assertRedirect('/');
})->with([
    'student',
    'instructor',
]);

it('Data update Course' , function () {


    Livewire::test('admin.courses.edit')
        ->set('title' , $this->newCourse['title'])
        ->set('status' , $this->newCourse['status'])
        ->set('description' , $this->newCourse['description'])
        ->set('category' , $this->newCourse['category'])
        ->set('instructor' , $this->newCourse['instructor'])
        ->set('level' , $this->newCourse['level'])
        ->set('img_url' , $this->newCourse['img_url'])
        ->call('update');


   $this->assertDatabaseHas('courses', [
       'title' => $this->newCourse['title'],
       'status' => $this->newCourse['status'],
       'description' => $this->newCourse['description'],
       'category_id' => $this->newCourse['category']['id'],
       'instructor_id' => $this->newCourse['instructor']['id'],
       'level' => $this->newCourse['level'],
       'img_url' => $this->newCourse['img_url'],
   ]);

});

it('assert Redirected' , function () {

    $this->withoutExceptionHandling();

    $image = \Illuminate\Http\UploadedFile::fake()->image('test.jpg');

    Livewire::test('admin.courses.edit')
        ->set('title' , $this->newCourse['title'])
        ->set('status' , $this->newCourse['status'])
        ->set('description' , $this->newCourse['description'])
        ->set('category' , $this->newCourse['category_id'])
        ->set('instructor' , $this->newCourse['instructor_id'])
        ->set('level' , $this->newCourse['level'])
        ->set('img' , $image)
        ->call('update')
        ->assertRedirect(route('admin.courses'));
});

it('should validate title', function ($title) {
    actingAs($this->admin);

    $image = \Illuminate\Http\UploadedFile::fake()->image('test.jpg');

    Livewire::test('admin.courses.edit')
        ->set('title', $title)
        ->set('status', $this->newCourse['status'])
        ->set('description', $this->newCourse['description'])
        ->set('category', $this->newCourse['category_id'])
        ->set('instructor', $this->newCourse['instructor_id'])
        ->set('level', $this->newCourse['level'])
        ->set('img', $image)
        ->call('update')
        ->assertHasErrors(['title']);
})->with([
     'ab',
     str_repeat('a', 256),
    1,
    1.5,
    null
]);

it('should validate status', function ($status) {
    actingAs($this->admin);

    $image = \Illuminate\Http\UploadedFile::fake()->image('test.jpg');

    Livewire::test('admin.courses.edit')
        ->set('title', $this->newCourse['title'])
        ->set('status', $status)
        ->set('description', $this->newCourse['description'])
        ->set('category', $this->newCourse['category_id'])
        ->set('instructor', $this->newCourse['instructor_id'])
        ->set('level', $this->newCourse['level'])
        ->set('img', $image)
        ->call('update')
        ->assertHasErrors(['status' => 'in']);
})->with([
    'invalid_status'
]);

it('should validate description', function ($description) {
    actingAs($this->admin);

    $image = \Illuminate\Http\UploadedFile::fake()->image('test.jpg');

    Livewire::test('admin.courses.edit')
        ->set('title', $this->newCourse['title'])
        ->set('status', $this->newCourse['status'])
        ->set('description', $description)
        ->set('category', $this->newCourse['category_id'])
        ->set('instructor', $this->newCourse['instructor_id'])
        ->set('level', $this->newCourse['level'])
        ->set('img', $image)
        ->call('update')
        ->assertHasErrors(['description']);
})->with([
    'ab',
    1,
    1.5,
    null
]);



it('should validate level', function ($level) {
    actingAs($this->admin);

    $image = \Illuminate\Http\UploadedFile::fake()->image('test.jpg');

    Livewire::test('admin.courses.edit')
        ->set('title', $this->newCourse['title'])
        ->set('status', $this->newCourse['status'])
        ->set('description', $this->newCourse['description'])
        ->set('category', $this->newCourse['category_id'])
        ->set('instructor', $this->newCourse['instructor_id'])
        ->set('level', $level)
        ->set('img', $image)
        ->call('update')
        ->assertHasErrors(['level' => 'in']);
})->with([
    'invalid' => 'expert',
]);

it('should validate img', function ($img) {
    actingAs($this->admin);

    Livewire::test('admin.courses.edit')
        ->set('title', $this->newCourse['title'])
        ->set('status', $this->newCourse['status'])
        ->set('description', $this->newCourse['description'])
        ->set('category', $this->newCourse['category_id'])
        ->set('instructor', $this->newCourse['instructor_id'])
        ->set('level', $this->newCourse['level'])
        ->set('img', $img)
        ->call('update')
        ->assertHasErrors(['img']);
})->with([
    \Illuminate\Http\UploadedFile::fake()->create('test.jpg', 5000),
]);

