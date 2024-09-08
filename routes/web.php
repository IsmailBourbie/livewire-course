<?php

use App\Http\Controllers\LogoutController;
use App\Livewire\Counter;
use App\Livewire\CreatePost;
use App\Livewire\LoginForm;
use App\Livewire\ShowPosts;
use App\Livewire\TodoList;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('counter', Counter::class);
Route::get('todo-list', TodoList::class);
Route::get('show-posts', ShowPosts::class);
Route::get('create-post', CreatePost::class);

// Login Route
Route::get('login', LoginForm::class)->name('login');
Route::middleware(['auth'])->post('logout', LogoutController::class)->name('logout');
