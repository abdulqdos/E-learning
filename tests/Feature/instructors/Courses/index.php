<?php

use App\Models\Course;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('must be a instructor', function () {
   get(route('instructors.courses'))->assertStatus(403);
});
