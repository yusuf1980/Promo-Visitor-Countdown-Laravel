<?php

use App\Http\Controllers\PromoController;
use App\Http\Controllers\SocialProofController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);


Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('/promos', PromoController::class);
        Route::get('/visitors', [VisitorController::class, 'index'])->name('visitor.index');
        Route::resource('products', ProductController::class);

        Route::resource('social-proofs', SocialProofController::class);
    });
});
