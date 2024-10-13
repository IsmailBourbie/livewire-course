<?php

use App\Http\Controllers\LogoutController;
use App\Livewire\Counter;
use App\Livewire\EditProfile;
use App\Livewire\LoginForm;
use App\Livewire\Order\Index\Page;
use App\Livewire\ShowPosts;
use App\Livewire\Signup;
use App\Livewire\TodoList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('counter', Counter::class);
Route::get('todo-list', TodoList::class);
Route::get('show-posts', ShowPosts::class);

// Login Route
Route::get('login', LoginForm::class)->name('login');
Route::middleware(['auth'])->post('logout', LogoutController::class)->name('logout');

// Form Essentials

Route::middleware(['auth'])->get('edit-profile', EditProfile::class)->name('edit-profile');
Route::middleware(['guest'])->get('signup', Signup::class)->name('signup');


// Tables
Route::get('store/1/orders', Page::class)->name('store.orders.index');
