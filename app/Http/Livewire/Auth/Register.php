<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function rules() 
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'nullable|same:password',
        ];
    }

    // public function validate
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store(Request $request){
        $validatedData = $this->validate();
        User::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => Hash::make($this->password),
        ]);

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password], false)){
            session()->put('success', 'successfully created account !');
            $this->emit('redirect', '/dashboard');
            return redirect()->route('dashboard');
        }
        
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
