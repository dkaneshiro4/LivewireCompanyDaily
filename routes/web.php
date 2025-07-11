<?php

use App\Http\Controllers\CompanyController;
use App\Livewire\CompanyCreate;
use App\Livewire\CompanyEdit;
use App\Livewire\ViewPost;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('companies', CompanyController::class);
//Route::get('companies/create', CompanyCreate::class)->name('companies.create');

Route::get('companies/create', CompanyCreate::class)->name('companies.create');
Route::get('companies/{company}/edit', CompanyEdit::class)->name('companies.edit');

//Route::get('posts', ShowPosts::class);
//Route::get('posts/create', CreatePost::class);
//Route::get('users', ShowUsers::class);
Route::get('post/{post}', ViewPost::class)->name('post.view');
