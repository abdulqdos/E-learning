<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    $this->data = User::factory()->create([
        'role' => 'instructor',
    ]);

    $this->newData = [
            'name' => 'abdu',
            'email' => "abdu@gmail.com",
        ];
});

it('should return the correct Livewire component', function () {
    Livewire::test('admin.instructor.edit')
        ->assertViewIs('livewire.admin.instructor.edit');
});

it('must be an admin' , function ($badRole) {

    $user = User::factory()->create([
        'role' => $badRole,
    ]);

    actingAs($user)->get(route('admin.instructors.edit' , $this->data))->assertRedirect('/');
})->with([
    'student',
    'instructor',
]);

it('can update an instructor without password change', function () {
    $this->newData = [
        'name' => 'abdu',
        'email' => "abdu@gmail.com",
    ];

    $instructor = User::factory()->create([
        'password' => Hash::make('oldpassword123'),
    ]);

    Livewire::test('admin.instructor.edit', ['instructor' => $instructor])
        ->set('name', $this->newData['name'])
        ->set('email', $this->newData['email'])
        ->set('change_password', false)  // تعطيل تغيير كلمة المرور
        ->call('update');

    $this->assertDatabaseHas('users', [
        'name' => $this->newData['name'],
        'email' => $this->newData['email'],
    ]);
});


it('can update an instructor with password change', function () {
    $this->newData = [
        'name' => 'abdu',
        'email' => "abdu@gmail.com",
        'old_password' => "oldpassword123",  // كلمة المرور القديمة
        'new_password' => "newpassword123",  // كلمة المرور الجديدة
        'new_password_confirmation' => "newpassword123",  // تأكيد كلمة المرور الجديدة
    ];

    $instructor = User::factory()->create([
        'password' => Hash::make($this->newData['old_password']),
    ]);

    Livewire::test('admin.instructor.edit', ['instructor' => $instructor])
        ->set('name', $this->newData['name'])
        ->set('email', $this->newData['email'])
        ->set('old_password', $this->newData['old_password'])
        ->set('new_password', $this->newData['new_password'])
        ->set('new_password_confirmation', $this->newData['new_password_confirmation'])
        ->set('change_password', true)  // تمكين تغيير كلمة المرور
        ->call('update');

    $this->assertDatabaseHas('users', [
        'name' => $this->newData['name'],
        'email' => $this->newData['email'],
    ]);

    $user = User::where('email', $this->newData['email'])->first();
    $this->assertTrue(Hash::check($this->newData['new_password'], $user->password));
});

it('Invalid Name', function ($badName) {
    $instructor = User::factory()->create(); // Create a sample instructor.blade.php

    Livewire::test('admin.instructor.edit', ['instructor' => $instructor])
        ->set('name', $badName)
        ->set('email', 'test@com')
        ->call('update')
        ->assertHasErrors('name');
})->with([
    'aaa',
    str_repeat('a', 21),
    1,
    1.5,
    null,
]);



