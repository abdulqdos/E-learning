<?php

use App\Models\Course;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('must be a instructor', function ($badRole) {
    $user = User::factory()->create(
        [
            'role' => $badRole,
        ]
    );
    actingAs($user)->get(route('instructors.courses' , $user->id))->assertRedirect('/');
})->with([
    'admin',
    'student'
]);
