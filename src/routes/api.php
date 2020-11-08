<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/**
 * authenticate routes
 */
Route::any('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

/**
 * reservations
 */

Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::put('reservation/cancel/{id}', [\App\Http\Controllers\ReservationController::class, 'cancel']);

    Route::resource('reservation', \App\Http\Controllers\ReservationController::class)
        ->except(['create', 'edit']);

});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
