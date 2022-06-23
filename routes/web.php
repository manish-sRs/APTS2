<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get("Profile",'App\Http\Controllers\AdminController@Profile');
    Route::put("updateProfile",'App\Http\Controllers\AdminController@updateProfile');
    Route::post('change_password',[AdminController::class,'password'])->name('changePassword');

});

// for farmer
Route::group(['middleware' => ['auth', 'role:farmer']], function() { 
    //Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
    Route::post("/ProductEntry",[App\Http\Controllers\productController::class, 'store'])->name('ProductEntry');
    Route::post("/ProductUpdate",[App\Http\Controllers\productController::class, 'update'])->name('ProductUpdate');
    Route::get("/ProductDelete",[App\Http\Controllers\productController::class, 'destroy'])->name('ProductDelete');
    Route::get("/farmerProfile",[App\Http\Controllers\farmerController::class, 'view'])->name('farmerProfile');
    Route::post("/ProductBid",[App\Http\Controllers\productController::class, 'placeToBid'])->name('ProductBid');


});

// for vendors
Route::group(['middleware' => ['auth', 'role:vendor']], function() { 
    //Route::get('/dashboard/postcreate', 'App\Http\Controllers\DashboardController@postcreate')->name('dashboard.postcreate');
});


Route::group(['middleware' => ['auth', 'role:admin']], function() { 
   //  Route::get('/dashboard/postcreate', 'App\Http\Controllers\DashboardController@postcreate')->name('dashboard.postcreate');
    // Route::get("adminProfile",'App\Http\Controllers\AdminController@adminProfile');
    // Route::put("updateProfile",'App\Http\Controllers\AdminController@updateProfile');
    Route::get('/adminFarmer', 'App\Http\Controllers\DashboardController@adminFarmer')->name('adminFarmer');
    // Route::get("Profile",'App\Http\Controllers\AdminController@Profile');
    // Route::put("updateProfile",'App\Http\Controllers\AdminController@updateProfile');
    // Route::post('change_password',[AdminController::class,'password'])->name('changePassword');

});
require __DIR__.'/auth.php';
