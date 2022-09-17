<?php

namespace App\Policies;

use App\Models\Post as ModelsPost;
use App\Models\User;
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

    public function delete(User $user,ModelsPost $post){
        // dd($post->user());
        // dd($user, $post->user);
        
        return $user == $post->user;
    }
}
