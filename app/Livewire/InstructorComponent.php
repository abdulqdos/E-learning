<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\layout;
#[layout('components.layouts.instructor')]
class InstructorComponent extends Component
{
    #[Title('dashboard')]
    public function render()
    {
        return view('livewire.instructor.dashboard');
    }
}
