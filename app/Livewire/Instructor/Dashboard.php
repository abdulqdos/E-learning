<?php

namespace App\Livewire\Instructor;

use App\Livewire\InstructorComponent;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends instructorComponent
{
    #[title('لوحة التحكم خاصة بالأستاذ')]
    public function render()
    {
        return view('livewire.instructor.dashboard');
    }
}
