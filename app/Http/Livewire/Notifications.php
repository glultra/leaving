<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notifications extends Component
{
    public function save(): void
    {
        // use a simple syntax: success | error | warning | info
        $this->notification()->success(
            $title = 'Profile saved',
            $description = 'Your profile was successfull saved'
        );
        $this->notification()->error(
            $title = 'Error !!!',
            $description = 'Your profile was not saved'
        );
 
        // or use a full syntax
        $this->notification([
            'title'       => 'Profile saved!',
            'description' => 'Your profile was successfull saved',
            'icon'        => 'success'
        ]);
        $this->notification()->send([
            'title'       => 'Profile saved!',
            'description' => 'Your profile was successfull saved',
            'icon'        => 'success'
        ]);
    }
    public function render()
    {
        return view('livewire.notifications');
    }
}
