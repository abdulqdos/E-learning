<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('must be a guest' , function () {
    $user = User::factory()->create();
    actingAs($user)->get('/register')->assertRedirect('/');
});


it('assert redirect' , function () {

    Livewire::test(Register::class)
        ->set('name' , 'abdulqdos')
        ->set('email', 'abdulqdos@gmail.com')
        ->set('profile_url' , 'user_images/default.png')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('signUp')
        ->assertRedirect(route('home'));
});


it('validate password' , function ($badPass) {
    Livewire::test(Register::class)
        ->set('email', 'email@example.com')
        ->set('password', $badPass)
        ->call('signUp')
        ->assertHasErrors(['password']);
})->with([
    str_repeat('a' , '7'),
    str_repeat('a' , '21'),
    1,
    1.5,
    null
]);


it('validate name' , function ($badName) {
    Livewire::test(Register::class)
        ->set('name', $badName)
        ->set('email', 'email@example.com')
        ->set('password', 'password')
        ->call('signUp')
        ->assertHasErrors(['name']);
})->with([
    str_repeat('a' , '7'),
    str_repeat('a' , '21'),
    1,
    1.5,
    null,
    '<script src="nahh"> </script>',
]);

