<?php

use App\Livewire\Counter;
use App\Livewire\ShowPosts;
use App\Livewire\TodoList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('counter', Counter::class);
Route::get('todo-list', TodoList::class);
Route::get('show-posts', ShowPosts::class);
