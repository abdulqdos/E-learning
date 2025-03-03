<?php

use App\Livewire\Auth\Login;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('must be a guest' , function () {
    $user = User::factory()->create();
    actingAs($user)->get('/login')->assertRedirect('/');
});


it('assert redirect' , function () {
    $user = User::factory()->create([
        'email' => 'email@example.com',
        'password' => bcrypt('password'),
    ]);

    Livewire::test(Login::class)
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('authenticate')
        ->assertRedirect(route('home'));
});

it('invalid password', function () {
    $user = User::factory()->create([
        'email' => 'email@example.com',
        'password' => bcrypt('password'),
    ]);


    Livewire::test(Login::class)
        ->set('email', $user->email)
        ->set('password', 'wrong-password')
        ->call('authenticate')
        ->assertHasErrors(['password' => 'Sorry, the email or password is incorrect.']);
});



it('validate password' , function ($badPass) {
    Livewire::test(Login::class)
        ->set('email', 'email@example.com')
        ->set('password', $badPass)
        ->call('authenticate')
        ->assertHasErrors(['password']);
})->with([
    str_repeat('a' , '7'),
    str_repeat('a' , '21'),
    1,
    1.5,
    null
]);




