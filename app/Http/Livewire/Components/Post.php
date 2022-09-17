<?php

namespace App\Http\Livewire\Components;

use App\Models\Post as ModelsPost;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use WireUi\Traits\Actions;

class Post extends Component
{
    use Actions;
    use AuthorizesRequests;
    
    public $post;
    public $isOpened = false;
    public $newBody;
    public $image;
    public $body;

    public function mount(){
        $this->body = $this->post->body;
        $this->newBody = $this->post->body;
        $this->image = $this->post->image;
    }

    public function editText(){
        // Frontend Update:
        $this->post->body = $this->newBody;

        // Backend Update:
        ModelsPost::where([
            'id' => $this->post->id,
        ])->update([
            'body' => $this->newBody,
        ]);
    }

    public function checkForDeletion($isOpened = false): void{
        // $this->post_id = $post_id;
        $post_id = $this->post->id;
        $this->isOpened = $isOpened;

        if($this->isOpened){
            return;
        }
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete the post?',
            'icon'        => 'warning',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'delete',
                'params' => $post_id,
            ],
            'reject' => [
                'label'  => 'No, cancel',
                'method' => 'cancel',
            ],
            'onClose'=> [
                // method: 'firedEvent',
                // params: 'onClose'
            ],
        ]);
    }

    public function delete(): void
    {
        // dd($post->id);
        $this->authorize('delete', $this->post);
        ModelsPost::where(['id' => $this->post->id])->delete();
        
        // $this->emit('$refresh');
        
        // dd($post_id);
        $this->emitUp('removed');
        $this->emitUp('showSuccess');
    }

    public function cancel():void{
        
    }

    public function render()
    {
        return view('livewire.components.post');
    }
}
