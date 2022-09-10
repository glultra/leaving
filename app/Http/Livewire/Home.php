<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $isAbleToWatchNavigation = true;
    public function render()
    {
        return view('livewire.home');
    }
}
