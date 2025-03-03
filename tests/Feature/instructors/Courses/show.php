<?php

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    $this->instructor = User::factory()->create([
        'role' => 'instructor',
    ]);

    $this->category = Category::factory()->create();

    $this->course = Course::factory()->create([
        'instructor_id' => $this->instructor->id,
        'category_id' => $this->category->id,
    ]);
});

it('should return a correct component', function () {
    actingAs($this->instructor)
        ->get(route('instructors.courses.show', [
            'instructor' => $this->instructor->id,
            'course' => $this->course->id,
        ]))
        ->assertStatus(200)
        ->assertSeeLivewire('instructor.courses.show');
});


it('must be a instructor', function ($badRole) {
    $user = User::factory()->create(
        [
            'role' => $badRole,
        ]
    );

    actingAs($user)->get(route('instructors.courses.show', [
        'instructor' => $this->instructor->id,
        'course' => $this->course->id,
    ]))->assertRedirect('/');

})->with([
    'admin',
    'student'
]);
