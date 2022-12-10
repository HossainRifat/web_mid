<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostAPIController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SellerAPIController;
use App\Http\Controllers\SellerEmailController;
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
Route::get('/buyer/dashboard', [BuyerController::class, 'BuyerDashboard'])->middleware('ValidToken');
Route::get('/buyer/profile/get', [BuyerController::class, 'Profile'])->middleware('ValidToken');
Route::get('/buyer/security/get', [BuyerController::class, 'Security'])->middleware('ValidToken');
Route::post('/buyer/security/update', [BuyerController::class, 'ChangePass'])->middleware('ValidToken');
Route::get('/buyer/logout', [BuyerController::class, 'SessionLogout'])->middleware('ValidToken');
Route::get('/buyer/posts/{id}', [PostController::class, 'GetPosts'])->middleware('ValidToken');
Route::get('/buyer/posts/search/{id}', [PostController::class, 'search'])->middleware('ValidToken');
Route::get('/buyer/post/details/{id}', [PostController::class, 'PostDetails'])->middleware('ValidToken');
Route::get('/buyer/delete', [BuyerController::class, 'RemoveAccount'])->middleware('ValidToken');




Route::post('/buyer/registration1', [BuyerController::class, 'RegistrationSubmit']);
Route::post('/buyer/registration2', [BuyerController::class, 'Registration02Submit']);
Route::post('/buyer/registration3', [BuyerController::class, 'Registration03Submit']);


Route::post('/sellerlogin', [SellerAPIController::class, 'APILogin']); //done
Route::post('/sellerlogout', [SellerAPIController::class, 'APILogout']); //done
Route::post('/sellerregister', [SellerAPIController::class, 'APIRegister']);
Route::get('/sellerorders', [SellerAPIController::class, 'APIOrders']);
Route::get('/sellerorderdetails/{id}', [SellerAPIController::class, 'APIOrderDetails']);
Route::get('/sellerprofile/{id}', [SellerAPIController::class, 'APIProfile']); // done
Route::get('/sendmail', [SellerEmailController::class, 'showMail']);
Route::get('/orderhistoryinvoice', [SellerEmailController::class, 'historyMail']);

Route::get('/postlist', [PostAPIController::class, 'apilist']); //done
Route::get('/postdetails/{id}', [PostAPIController::class, 'apidetails']); //done
