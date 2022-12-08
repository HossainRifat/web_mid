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
Route::get('/buyer/profile/get', [BuyerController::class, 'Profile'])->name("BuyerDashboard")->middleware('ValidToken');
Route::get('/buyer/security/get', [BuyerController::class, 'Security'])->name("BuyerDashboard")->middleware('ValidToken');



Route::post('/buyer/registration1', [BuyerController::class, 'RegistrationSubmit']);
Route::post('/buyer/registration2', [BuyerController::class, 'Registration02Submit']);
Route::post('/buyer/registration3', [BuyerController::class, 'Registration03Submit']);


