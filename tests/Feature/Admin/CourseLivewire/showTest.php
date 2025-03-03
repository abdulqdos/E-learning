<?php

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    $this->category = Category::factory()->create();

    $this->user = User::factory()->create([
        'role' => 'instructor'
    ]);

    $this->admin = User::factory()->create([
        'role' => 'admin'
    ]);

    $this->data = Course::factory()->create();

});


it('should return the correct Livewire component', function () {
    Livewire::test('admin.courses.show' , [  'course' => $this->data ])
        ->assertViewIs('livewire.admin.courses.show');
});


it('must be an admin' , function ($badRole) {

    $user = User::factory()->create([
        'role' => $badRole,
    ]);

    actingAs($user)
        ->get(route('admin.courses.show' , $this->data))->assertRedirect('/');
})->with([
    'student',
    'instructor',
]);


it('send a course' , function () {
    $component = Livewire::test('admin.courses.show' ,
    [
        'course' => $this->data,
    ])->assertViewIs('livewire.admin.courses.show')
    ->assertSee($this->data->title)
        ->assertSee($this->data->description);
});

