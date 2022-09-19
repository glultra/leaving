<?php

namespace App\Http\Livewire;

use App\Models\Post as ModelsPost;
use Illuminate\Support\Facades\Storage;
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
        'updatedPost' => 'onUpdatePost',
    ];


    public function onUpdatePost(){
        $this->posts = ModelsPost::latest()->get();

        $this->notification([
            'title'       => 'Post updated!',
            'description' => 'Your post was successfull updated',
            'icon'        => 'success'
        ]);

        $this->emitTo('post', 'updatePost');
    }

    public function showSuccess($tempPost){
        $this->notification()->confirm([
            'title'       => 'Post deleted!',
            'description' => 'Your post was successfull deleted',
            'icon'        => 'warning',
            'accept' => [
                "label" => 'Undo',
                "method" => 'undo',
                'params' => $tempPost
            ],
            'onClose' => [
                "method" => 'close',
                'params' => $tempPost

            ]
        ]);
    }

    public function close($tempPost){
        // dd('closed');
        Storage::delete('public/temp/'.$tempPost['image']);
    }

    public function undo($tempPost){

        $post = ModelsPost::create([
            'id' => $tempPost['id'],
            'user_id' => $tempPost['user']['id'],
            'body' => $tempPost['body'],
            'image' => $tempPost['image'],
            'created_at' => $tempPost['created_at'],
        ]);

        // $post = new ModelsPost();
        // dd($post);
        foreach($tempPost['likes'] as $like){
            $post->likes()->create([
                'id' => $like['id'],
                'user_id' => $like['user_id'],
                'post_id' => $like['post_id'],
                'created_at' => $like['created_at'],
            ]);
        }

        Storage::move('public/temp/'.$post->image, 'public/'.$post->image);


        $this->posts = ModelsPost::latest()->get();
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
