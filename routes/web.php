<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Logout;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Home;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Post;
use Illuminate\Support\Facades\Route;


Route::get('/home', Home::class)->name('home');

Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware(['auth']);
Route::get('auth/logout', Logout::class)->name('logout')->middleware(['auth']);

Route::get('auth/register', Register::class)->name('register')->middleware(['guest']);
Route::get('auth/login', Login::class)->name('login')->middleware(['guest']);


Route::get('/posts', Post::class)->name('posts');