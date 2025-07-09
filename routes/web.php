<?php

use App\Http\Controllers\CompanyController;
use App\Livewire\CompanyCreate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('companies', CompanyController::class);
//Route::get('companies/create', CompanyCreate::class)->name('companies.create');
