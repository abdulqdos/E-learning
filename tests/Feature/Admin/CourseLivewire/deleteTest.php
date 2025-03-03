<?php

use App\Models\Course;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;


it('should return the correct Livewire component', function () {
    Livewire::test('admin.courses.index')
        ->assertViewIs('livewire.admin.courses.index');
});


it('must be an admin' , function ($badRole) {

    $user = User::factory()->create([
        'role' => $badRole,
    ]);

    actingAs($user)->get('/admin/courses')->assertRedirect('/');
})->with([
    'student',
    'instructor',
]);

it('delete a Course', function () {
    $course = Course::factory()->create();

    Livewire::test('admin.courses.index')
        ->call('delete', $course);

    $this->assertModelMissing($course);
});

