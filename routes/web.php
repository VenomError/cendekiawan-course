<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', App\Livewire\Auth\Register::class)->name('register');

});
Route::middleware('auth')->get('/logout', function (Request $request) {

    \Illuminate\Support\Facades\Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();
    $request->session()->flush();

    return redirect()->route('login');

})->name('logout');

// START Landing Page
Route::get('/', function () {
    return 'Home Page';
})->name('home');
// END Landing Page

// START Dashboard
Route::name('dashboard.')
    ->middleware(['role:admin|pimpinan', 'auth'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/', App\Livewire\Dashboard\Index::class)->name('index');

        Route::prefix('users')->name('user.')->group(function () {
            Route::get('/pimpinan', App\Livewire\Dashboard\Users\Pimpinan::class)->name('pimpinan');
            Route::get('/admin', App\Livewire\Dashboard\Users\Admin::class)->name('admin');
            Route::get('/peserta', App\Livewire\Dashboard\Users\Peserta::class)->name('peserta');
        });

    });
// END Dashboard
