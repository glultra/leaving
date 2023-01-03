<?php

namespace App\Http\Livewire\Components;

use App\Events\LikePost;
use App\Models\User;
use Livewire\Component;

class PostLike extends Component
{
    // use User;
    public $post;
    public User $user;

    protected $listeners = [
        
    ];

    public function getListeners(){
        return [
            'refresh' => '$refresh',
            "echo:like-received,LikePost" => 'likeBroadcast',
        ];
    }

    public function likeBroadcast($event){
        $this->emit('refresh');
        $this->emitUp('postLiked');
    }

    public function mount(){
        $this->user = auth()->user();
    }

    public function like()
    {
        if(!$this->post->likedBy(auth()->user())){
            $this->post->likes()->create([
                'user_id' => auth()->user()->id,
            ]);

            $this->emit('refresh');
            $this->emitUp('postLiked');
    
            event(new LikePost($this->post));
        }   
    }
    
    public function unlike()
    {
        if($this->post->likedBy(auth()->user()))
        {
            $this->user->likes()->where('post_id', $this->post->id)->delete();

            $this->emit('refresh');
            $this->emitUp('postLiked');
    
            event(new LikePost($this->post));
        }
    }

    public function render()
    {
        return view('livewire.components.post-like');
    }
}
