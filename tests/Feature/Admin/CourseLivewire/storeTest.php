<?php

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('should return the correct Livewire component', function () {
    Livewire::test('admin.courses.create')
        ->assertViewIs('livewire.admin.courses.create');
});


it('must be an admin' , function ($badRole) {

    $user = User::factory()->create([
        'role' => $badRole,
    ]);

    actingAs($user)->get('/admin/courses/create')->assertRedirect('/');
})->with([
    'student',
    'instructor',
]);

it('Redirect to the index page' , function () {

    $category = Category::factory()->create();

    $user = User::factory()->create([
        'role' => 'instructor'
    ]);

   Livewire::test('admin.courses.create')
       ->set('title' , 'Frontend')
       ->set('status' , 'ongoing')
       ->set('description' , 'Learn Html Css Js')
       ->set('category' , $category->id)
       ->set('instructor' , $user->id)
       ->set('level' , 'intermediate')
       ->set('img' ,\Illuminate\Http\UploadedFile::fake()->image('test.jpg'))
       ->call('store')
       ->assertRedirect(route('admin.courses'));
});


it('Database Has' , function () {

    $category = Category::factory()->create();

    $user = User::factory()->create([
        'role' => 'instructor'
    ]);

    Livewire::test('admin.courses.create')
        ->set('title' , 'Frontend')
        ->set('status' , 'ongoing')
        ->set('description' , 'Learn Html Css Js')
        ->set('category' , $category->id)
        ->set('instructor' , $user->id)
        ->set('level' , 'intermediate')
        ->set('img' ,\Illuminate\Http\UploadedFile::fake()->image('test.jpg'))
        ->call('store');

    $this->assertDatabaseHas('courses', [
        'title' => 'Frontend',
        'status' => 'ongoing',
        'description' => 'Learn Html Css Js',
        'category_id' => $category->id,
        'instructor_id' => $user->id,
        'level' => 'intermediate',
    ]);

});

it('Invalid Description', function ($badDes) {
    $category = Category::factory()->create();
    $user = User::factory()->create(['role' => 'instructor']);

    Livewire::test('admin.courses.create')
        ->set('title', 'Frontend')
        ->set('status', 'ongoing')
        ->set('description', $badDes)
        ->set('category', $category->id)
        ->set('instructor', $user->id)
        ->set('level', 'intermediate')
        ->set('img_url', 'user_images/default.png')
        ->call('store')
        ->assertHasErrors(['description']);
})->with([
    '', 'short', str_repeat('A', 5), 12345, null,
]);

it('Invalid Title', function ($badTitle) {
    Livewire::test('admin.courses.create')
        ->set('title', $badTitle)
        ->call('store')
        ->assertHasErrors(['title']);
})->with([
    '', 'A', str_repeat('A', 256), 12345, null,
]);

it('Invalid Status', function ($badStatus) {
    Livewire::test('admin.courses.create')
        ->set('status', $badStatus)
        ->call('store')
        ->assertHasErrors(['status']);
})->with([
    '', 'invalid', 123, null,
]);

it('Invalid Instructor', function ($badInstructor) {
    Livewire::test('admin.courses.create')
        ->set('instructor', $badInstructor)
        ->call('store')
        ->assertHasErrors(['instructor']);
})->with([
    '', 99999, 'text', null,
]);

it('Invalid Category', function ($badCategory) {
    Livewire::test('admin.courses.create')
        ->set('category', $badCategory)
        ->call('store')
        ->assertHasErrors(['category']);
})->with([
    '', 99999, 'text', null,
]);

it('Invalid Level', function ($badLevel) {
    Livewire::test('admin.courses.create')
        ->set('level', $badLevel)
        ->call('store')
        ->assertHasErrors(['level']);
})->with([
    '', 'expert', 123, null,
]);



