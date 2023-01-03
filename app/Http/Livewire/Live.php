<?php

namespace App\Http\Livewire;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Livewire\Component;

class Live extends Component
{
    public $test;

    public function mount(){
    }

    public function broadcastOn(){
        // return new Channel('orders');
    }

    public function render()
    {
        return view('livewire.live');
    }
}
