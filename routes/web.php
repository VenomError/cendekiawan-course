<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/php-info', function () {
    return phpinfo();
})->name('login');
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
Route::get('/', App\Livewire\Landing\Index::class)->name('home');
Route::prefix('kursus')->name('landing.kursus.')->group(function () {

    Route::get('/', App\Livewire\Landing\Kursus\ListKursus::class)->name('list');
    Route::get('/{slug}', App\Livewire\Landing\Kursus\KursusDetail::class)->name('detail');
    Route::get('/{slug}/booking', App\Livewire\Landing\Kursus\BookingKursus::class)
        ->middleware(['auth', 'role:peserta'])
        ->name('booking');
});
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

        Route::prefix('kursuses')->name('kursus.')->group(function () {
            Route::get('/create', App\Livewire\Dashboard\Kursus\CreateKursus::class)->name('create');
            Route::get('/list', App\Livewire\Dashboard\Kursus\ListKursus::class)->name('list');
            Route::get('/detail/{kursus_id}', App\Livewire\Dashboard\Kursus\DetailKursus::class)->name('detail');
            Route::get('/edit/{kursus_id}', App\Livewire\Dashboard\Kursus\EditKursus::class)->name('edit');
        });

        Route::prefix('pendaftar')->name('pendaftar.')->group(function () {
            Route::get('/list', App\Livewire\Dashboard\Pendaftar\ListPendaftar::class)->name('list');
            Route::get('/new', App\Livewire\Dashboard\Pendaftar\NewPendaftar::class)->name('new');
            Route::get('/cancel', App\Livewire\Dashboard\Pendaftar\CancelPendaftar::class)->name('cancel');
            Route::get('/active', App\Livewire\Dashboard\Pendaftar\ActivePendaftar::class)->name('active');
        });

        Route::prefix('jadwal')->name('jadwal.')->group(function () {
            Route::get('/', App\Livewire\Jadwal\ListJadwal::class)->name('list');
        });

    });
// END Dashboard
