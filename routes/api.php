<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\LoginController;
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

Route::post('/login', [LoginController::class, 'LoginSubmit']);
Route::get('/all', [LoginController::class, 'LoginAll']);
Route::get('/t', [LoginController::class, 't']);
Route::get('/buyer/dashboard', [BuyerController::class, 'BuyerDashboard'])->name("BuyerDashboard");