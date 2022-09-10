<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        Auth::logout();

        return view('livewire.home');
    }
}
