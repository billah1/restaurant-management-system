<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\HomeController;
 use App\Http\Controllers\DashboardController;

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

Route::get('/',[HomeController::class,'home'])->name('home');



Route::get('/redirects', [HomeController::class, 'redirects'])->middleware(['auth'])->name('redirects');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/users',[AdminController::class,'user']);
    Route::get('/deleteUser/{id}',[AdminController::class,'deleteUser']);
    Route::get('/foodmenu',[AdminController::class,'foodMenu']);
    Route::post('/storefood',[AdminController::class,'storeFood']);
    Route::get('/deletefood/{id}',[AdminController::class,'deletefood']);

    
});
