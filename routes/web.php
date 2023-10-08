<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', App\Livewire\Public\Index::class)->name('home');
Route::get('/about-us', App\Livewire\Public\AboutUs::class)->name('about-us');
Route::get('/services', App\Livewire\Public\Services::class)->name('services');
Route::get('/portfolio', App\Livewire\Public\Portfolio::class)->name('portfolio');
