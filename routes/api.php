<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/customer',[CustomerController::class,'index']);
Route::post('/register', [RegisterController::class, 'store']);
 
Route::post('/login', [LoginController::class, 'check']);
Route::post('/tokenvalidate', [LoginController::class, 'tokenvalidate']);
//Route::post('/loginmail', [LoginController::class, 'getdetail']);