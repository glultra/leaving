<?php

namespace App\Policies;

use App\Models\Post;
// use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(Post $post){
        // dd($post->user());
        return auth()->user === $post->user();
    }
}
