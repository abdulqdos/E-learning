<?php

namespace App\Livewire\Admin ;

use App\Livewire\AdminComponent;
use Livewire\Attributes\Title;

class Dashboard extends AdminComponent
{
    #[title('Dashboard')]
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
