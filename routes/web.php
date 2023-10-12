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

Route::get('/', App\Livewire\Public\Index::class)->name('home');
Route::get('about-us', App\Livewire\Public\AboutUs::class)->name('about-us');
Route::get('services', App\Livewire\Public\Services::class)->name('services');
Route::get('portfolio', App\Livewire\Public\Portfolio::class)->name('portfolio');
Route::get('packages', App\Livewire\Public\Packages::class)->name('packages');

Route::get('login', App\Livewire\Public\Login::class)->name('login');
Route::post('logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::get('register', App\Livewire\Public\Register::class)->name('register');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', App\Livewire\Admin\Dashboard\Index::class)->name('dashboard');
    Route::get('transaction-records', App\Livewire\Admin\TransactionRecord\Index::class)->name('transaction-records');
    Route::get('services', App\Livewire\Admin\Service\Index::class)->name('services');
});
