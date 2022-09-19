<?php

namespace App\Http\Livewire\Components;

use App\Models\Post as ModelsPost;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class Post extends Component
{
    use Actions;
    use AuthorizesRequests;
    use WithFileUploads;
    
    public $post;
    public $isOpened = false;
    public $newBody;
    public $newImage;
    public $body;

    public $listeners = [
        'updatedPost' => '$refresh',
        'likedPost' => '$refresh',
    ];

    public function rules(){
        if($this->newImage){
            // dd('here ?');
            return [
                'body' => 'required',
                'newImage' => 'image|max:7168|mimes:jpeg,png,svg,jpg,gif',
            ];
        }else{
            return [
                'body' => 'required',
            ];
        }
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function mount(){
        $this->body = $this->post->body;
        $this->newBody = $this->post->body;
        $this->image = $this->post->image;
    }

    public function removeTemp(){
        $this->newImage = null;
    }

    public function editText(){
        // Frontend Update:
        $this->validate();
        $this->post->body = $this->newBody;

        // Backend Update:
        if($this->newImage){
            $imageName = $this->newImage->store('images', 'public');
            ModelsPost::where([
                'id' => $this->post->id,
            ])->update([
                'body' => $this->newBody,
                'image'=> $imageName,
            ]);
        }else{
            ModelsPost::where([
                'id' => $this->post->id,
            ])->update([
                'body' => $this->newBody,
            ]);
        }

        $this->newImage = null;
        // $this->newBody = null;
        // $this->$refr
        $this->emitUp('updatedPost');
        $this->emitSelf('updatedPost');

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
        Storage::delete('public/'.$this->post->image);
        ModelsPost::where(['id' => $this->post->id])->delete();
        
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
