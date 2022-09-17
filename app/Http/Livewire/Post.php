<?php

namespace App\Http\Livewire;

use App\Models\Post as ModelsPost;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class Post extends Component
{
    use Actions;
    use WithFileUploads;

    public $posts;
    public $body;
    public $image;
    public $name;

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

    public function removeTemp(){
        $this->image = null;
        // dd($this->image);
    }

    public function rules(){
        if($this->image){
            // dd('here ?');
            return [
                'body' => 'required',
                'image' => 'image|max:7168|mimes:jpeg,png,svg,jpg,gif',
            ];
        }else{
            return [
                'body' => 'required',
            ];
        }
       
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
        $data = $this->validate();

        // Store
        if($this->image){
            $imageName = $this->image->store('images', 'public');
            ModelsPost::create([
                'user_id' => auth()->user()->id,
                'body' => $this->body,
                'image' => $imageName, 
            ]);
            // dd('success');
        }else{
            ModelsPost::create([
                'user_id' => auth()->user()->id,
                'body' => $this->body,
            ]);
        }
        // $this->image->store('images', 'public');

        $this->posts = ModelsPost::latest()->get();
        $this->body = '';
        $this->image = null;

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
