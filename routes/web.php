<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){

    Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', App\Livewire\Auth\Register::class)->name('register');

});

Route::name('dashboard.')
    // ->middleware(['role:admin|pimpinan' , 'auth'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/', App\Livewire\Dashboard\Index::class)->name('index');

    });
