<?php

use App\Http\Controllers\AdminAPIController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\BuyerAPIController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostAPIController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductAPIController;
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

// ################################ BUYER ###############################

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

Route::post('/buyer/forget', [BuyerController::class, 'ForgetEmail']);

Route::get('/buyer/bid/confirm/{id}', [BidController::class, 'ConfirmBid'])->middleware('ValidToken');



// ################################ SELLER ###############################

Route::post('/sellerlogin', [SellerAPIController::class, 'APILogin']); //done
Route::post('/sellerlogout', [SellerAPIController::class, 'APILogout']); //done
Route::post('/sellerregister', [SellerAPIController::class, 'APIRegister']);
Route::get('/sellerorders/{id}', [SellerAPIController::class, 'APIOrders']);
Route::get('/sellerorderdetails/{id}', [SellerAPIController::class, 'APIOrderDetails']);
Route::get('/sellerprofile/{id}', [SellerAPIController::class, 'APIProfile']); // done
Route::get('/sendmail', [SellerEmailController::class, 'sendMail']);
Route::get('/orderhistoryinvoice', [SellerEmailController::class, 'historyMail']);
Route::get('/sellerbids/{id}', [SellerAPIController::class, 'APIBids']);
Route::get('/sellerdashboard/{id}', [SellerAPIController::class, 'APIDashboard']);
Route::get('/postlist', [PostAPIController::class, 'apilist']); //done
Route::get('/postdetails/{id}', [PostAPIController::class, 'apidetails']); //done



// ################################ ADMIN ###############################

Route::post('/adminlogin', [AdminAPIController::class, "adminLogin"]);
Route::post('/adminregistration', [AdminAPIController::class, "adminRegistration"]);
Route::get('/admin/profile', [AdminAPIController::class, 'profile'])->middleware('APIAuth');
Route::get('/products/list', [ProductAPIController::class, 'list'])->middleware('APIAuth');
Route::get('buyers/list', [BuyerAPIController::class, 'list'])->middleware('APIAuth');

Route::post('admin/logout', [AdminAPIController::class, 'logout']);
Route::get('/email/{id}', [AdminAPIController::class, 'email']);
