<?php

use App\Models\Course;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('must be an instructor' , function () {
   get(route('instructors.index'))->assertRedirect('/');
});

//it('')
