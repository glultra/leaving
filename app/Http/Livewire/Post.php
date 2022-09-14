<?php

namespace App\Http\Livewire;

use App\Models\Post as ModelsPost;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\Actions;

class Post extends Component
{
    use Actions;
    
    public $posts;
    public $body;

    public $listeners = [
        'removed' => '$refresh',
        'showSuccess' => 'showSuccess',
    ];

    public function showSuccess(){
        $this->notification()->success(
            $title = 'Post deleted',
            $description = 'Your post was successfull deleted'
        );
    }

    public function rules(){
        return [
            'body' => 'required',
        ];
    }

    public function mount(){
        $this->posts = ModelsPost::latest()->get();
    }

    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store(){
        // Validate...
        $this->validate();

        // Store
        ModelsPost::create([
            'user_id' => auth()->user()->id,
            'body' => $this->body,
        ]);

        $this->posts = ModelsPost::latest()->get();
        $this->body = '';

        $this->notification([
            'title'       => 'Post uploaded!',
            'description' => 'Your post was successfull uploaded',
            'icon'        => 'success'
        ]);

    }

    public function render()
    {
        return view('livewire.post');
    }
}
