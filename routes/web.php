<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BranchController;
use App\Http\Controllers\RepresentController;
use App\Http\Controllers\RepresentController2;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\shipmentdetialsController;

use App\Http\Controllers\AddShipmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;



Route::get('/', function () {
    return view('auth.login');
});





Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource( 'Branch' ,BranchController::class);

Route::resource( 'represent' ,RepresentController::class);


Route::resource( 'represent2' ,RepresentController2::class);

Route::resource( 'Shipment' ,ShipmentController::class);

Route::resource( 'AddShipment' ,AddShipmentController::class);

Route::post('search',[ SearchController::class ,'store'])->name('search.store');


Route::get('/shipmentdetials/{id}',[shipmentdetialsController::class,'show']);

Route::middleware('auth')->group(function () {
    
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});



Route::get('/{page}', 'App\Http\Controllers\AdminController@index');



