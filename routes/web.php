<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Logout;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Home;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use App\Http\Livewire\Post;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('home');
Route::get('/posts', Post::class)->name('posts');

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('auth/logout', Logout::class)->name('logout');
    Route::get('/users',  CreateChat::class)->name('users');
    Route::get('/chat{key?}',  Main::class)->name('chat');
});

Route::middleware(['guest'])->group(function(){
    Route::get('auth/register', Register::class)->name('register');
    Route::get('auth/login', Login::class)->name('login');
});
