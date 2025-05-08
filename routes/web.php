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

//reservation
Route::post('/reservation',[HomeController::class,'reservation']);

//add to cart
Route::post('/add-to-cart/{id}',[HomeController::class,'addToCart']);
Route::get('/showcart/{id}',[HomeController::class,'showCart']);
Route::get('/remove/{id}',[HomeController::class,'remove']);

//order

Route::post('/orderconfirm',[HomeController::class,'orderconfirm']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/users',[AdminController::class,'user']);
    Route::get('/deleteUser/{id}',[AdminController::class,'deleteUser']);
    //food
    Route::get('/foodmenu',[AdminController::class,'foodMenu']);
    Route::post('/storefood',[AdminController::class,'storeFood']);
    Route::get('/deletefood/{id}',[AdminController::class,'deletefood']);
    Route::get('/editfood/{id}',[AdminController::class,'editfood']);
    Route::post('/updatefood/{id}',[AdminController::class,'updatefood']);
   
    //reservation
    Route::get('/viewreservation',[AdminController::class,'viewreservation']);


    //chefs

    //reservation
    Route::get('/viewchefs',[AdminController::class,'viewchefs']);
    Route::post('/storechef',[AdminController::class,'storechef']);
    Route::get('/deletechef/{id}',[AdminController::class,'deletechef']);
    Route::get('/editchef/{id}',[AdminController::class,'editchef']);
    Route::post('/updatechef/{id}',[AdminController::class,'updatechef']);
    
});
