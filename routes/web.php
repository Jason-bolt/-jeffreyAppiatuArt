<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ArtworksController;
use App\Http\Controllers\BioController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/artist', [Controller::class, 'artist']);
Route::get('/contact', [Controller::class, 'contact']);
Route::post('/contact', [Controller::class, 'send']) ->name('contact.send');

Route::resource('control/cms/artworks', ArtworksController::class)->middleware(['auth']);
Route::resource('control/cms/bio', BioController::class)->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
