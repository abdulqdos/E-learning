<?php

use App\Models\Course;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    $this->data = User::factory()->create([
        'role' => 'instructor',
    ]);

    $this->instructor = $this->data->paginate();
});

it('should return the correct Livewire component', function () {
    Livewire::test('admin.instructor.index')
        ->assertViewIs('livewire.admin.instructor.index');
});


it('must be an admin' , function ($badRole) {

    $user = User::factory()->create([
        'role' => $badRole,
    ]);

    actingAs($user)->get('/admin/instructors')->assertRedirect('/');
})->with([
    'student',
    'instructor',
]);


it('must show instructors if available', function () {
    $component = Livewire::test('admin.instructor.index', [
        'instructors' => $this->instructor,
    ])->assertViewIs('livewire.admin.instructor.index');

    if ($this->instructor->total() > 0) {
        $component->assertSee($this->instructor[0]->name);
    } else {
        $component->assertSee('لا يوجد محاضرين متاحين');
    }
});


