<?php

namespace App\Http\Livewire\Components;

use App\Models\User;
use Livewire\Component;

class PostLike extends Component
{
    // use User;
    public $post;
    public User $user;

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    public function mount(){
        $this->user = auth()->user();
    }

    public function like()
    {
        if(!$this->post->likedBy(auth()->user())){
            $this->post->likes()->create([
                'user_id' => auth()->user()->id,
            ]);
            $this->emit("refresh");
            $this->emitUp('postLiked');
        }
    }

    public function unlike(){
        // dd('here!');
        if($this->post->likedBy(auth()->user()))
        {
            $this->user->likes()->where('post_id', $this->post->id)->delete();
            $this->emit("refresh"); 
            $this->emitUp('postLiked');
        }
        
    }

    public function render()
    {
        return view('livewire.components.post-like');
    }
}
