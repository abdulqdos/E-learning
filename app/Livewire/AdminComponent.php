<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\layout;
#[layout('components.layouts.admin')]
class AdminComponent extends Component
{
    #[Title('dashboard')]
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
