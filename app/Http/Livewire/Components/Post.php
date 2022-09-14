<?php

namespace App\Http\Livewire\Components;

use App\Models\Post as ModelsPost;
use Livewire\Component;
use WireUi\Traits\Actions;

class Post extends Component
{
    use Actions;
    
    public $post;
    public $isOpened = false;

    public function checkForDeletion($post_id, $isOpened = false): void{
        // $this->post_id = $post_id;
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

    public function delete($post_id): void
    {
        ModelsPost::where(['id' => $post_id])->delete();
        
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
