<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class Main extends Component
{
    protected $listeners = [
        'refresh' => '$refresh',
    ];
    public function render()
    {
        return view('livewire.chat.main');
    }
}
