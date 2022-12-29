<?php

use App\Http\Livewire\Pages\AddCadeau;
use App\Http\Livewire\Pages\AddFopper;
use App\Http\Livewire\Pages\Admin;
use App\Http\Livewire\Pages\EditCadeau;
use App\Http\Livewire\Pages\EditFopper;
use App\Http\Livewire\Pages\Foppers;
use App\Http\Livewire\Pages\Lijst;
use App\Http\Livewire\Pages\Login;
use App\Http\Livewire\Pages\Regels;
use App\Http\Livewire\Pages\Reserveringen;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Login::class)->name('home');

Route::group(['middleware' => 'isLoggedIn'], function () {
//    Route::get('/reset-cache', function () {
//        return shell_exec('sh -c "cd .. && ./deployment_caching.sh"');
//    });
//
//    Route::get('/reset-database', function () {
//        return shell_exec('sh -c "cd .. && ./database-reset.sh"');
//    });

    Route::get('/lijst/{lijstId}', Lijst::class)
        ->name('lijst');

    Route::get('/regels', Regels::class)->name('regels');

    Route::get('/reserveringen', Reserveringen::class)->name('reserveringen');

    Route::get('/foppers', Foppers::class)->name('foppers');

    Route::get('/cadeau-toevoegen',  AddCadeau::class)->name('cadeau.add');
    Route::get('/cadeau-bewerken/{id}',  EditCadeau::class)->name('cadeau.edit');

    Route::get('/fopper-toevoegen',  AddFopper::class)->name('fopper.add');
    Route::get('/fopper-bewerken/{id}',  EditFopper::class)->name('fopper.edit');

    Route::get('/admin', Admin::class)->name('admin.index');
});

// Authentication routes
Route::get('/login', Login::class)->name('login')->middleware('alreadyLoggedIn');

