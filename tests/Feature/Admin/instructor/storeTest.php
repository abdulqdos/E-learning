<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    $this->data = User::factory(10)->create([
        'role' => 'instructor',
    ]);


});

it('should return the correct Livewire component', function () {
    Livewire::test('admin.instructor.create')
        ->assertViewIs('livewire.admin.instructor.create');
});

it('must be an admin' , function ($badRole) {

    $user = User::factory()->create([
        'role' => $badRole,
    ]);

    actingAs($user)->get('/admin/instructors/create')->assertRedirect('/');
})->with([
    'student',
    'instructor',
]);

it('can store a new instructor' , function () {
    Livewire::test('admin.instructor.create')
        ->set('name' , 'abdulqdos')
        ->set('email' , 'test@com')
        ->set('password' , 'password')
        ->set('password_confirmation' , 'password')
        ->call('store');

    $this->assertDatabaseHas('users' , [
        'name' => 'abdulqdos',
        'email' => 'test@com',
    ]);

    $user = User::where('email', 'test@com')->first();

    $this->assertTrue(Hash::check('password', $user->password));
});

it('Invalid Name' , function ($badName) {
    Livewire::test('admin.instructor.create')
        ->set('name' , $badName)
        ->set('email' , 'test@com')
        ->set('password' , 'password')
        ->call('store')
        ->assertHasErrors('name');
})->with([
        'aaa',
        str_repeat('a' , 21),
        1,
        1.5,
        null,
        '<script>']);

it('Invalid  Email' , function ($badEmail) {
    Livewire::test('admin.instructor.create')
        ->set('name' , 'abdulqdos')
        ->set('email' , $badEmail)
        ->set('password' , 'password')
        ->call('store')
        ->assertHasErrors('email');
})->with([
        'aaa',
        str_repeat('a' , 21),
        1,
        1.5,
        null,
        '<script>'
    ]);

it('Invalid Password' , function ($badPass) {
    Livewire::test('admin.instructor.create')
        ->set('name' , 'abdulqdos')
        ->set('email' , 'test@com')
        ->set('password' , $badPass)
        ->call('store')
        ->assertHasErrors('password');
})->with([
        'aaa',
        str_repeat('a' , 21),
        1,
        1.5,
        null,
        '<script>'
    ]);

it('validates password and confirmation', function () {
    Livewire::test('admin.instructor.create')
        ->set('name' , 'abdulqdos')
        ->set('email' , 'test@com')
        ->set('password', 'Test1234')
        ->set('password_confirmation', 'Test1234')
        ->call('store');

    Livewire::test('admin.instructor.create')
        ->set('password', 'Test1234')
        ->set('password_confirmation', 'Mismatch1234')
        ->call('store')
        ->assertHasErrors(['password']);
});

it('Redirect to correct Page' , function () {
    Livewire::test('admin.instructor.create')
        ->set('name' , 'abdulqdos')
        ->set('email' , 'test@com')
        ->set('password' , 'password')
        ->set('password_confirmation' , 'password')
        ->call('store')
        ->assertRedirect(route('admin.instructors'));
});


