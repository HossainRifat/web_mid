<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/', [GlobalController::class, 'Home'])->name("Home");

// Route::get('/login', [LoginController::class, 'Login'])->name("Login");
// Route::post('/login', [LoginController::class, 'LoginSubmit'])->name("LoginSubmit");

// Route::get('/registration/{id}', [GlobalController::class, 'Registration'])->name("Registration");
// Route::post('/registration/buyer', [BuyerController::class, 'RegistrationSubmit'])->name("RegistrationSubmit");

// Route::get('/registration/buyer/valid', [BuyerController::class, 'ValidationEmail'])->name("ValidationEmail")->middleware('ValidReg02');

// Route::get('/registration02/buyer/{id}', [BuyerController::class, 'Registration02'])->name("Registration02")->middleware('ValidReg02');
// Route::post('/registration02/buyer', [BuyerController::class, 'Registration02Submit'])->name("Registration02Submit");

// Route::get('/registration03/buyer', [BuyerController::class, 'Registration03'])->name("Registration03")->middleware('ValidReg03');
// Route::post('/registration03/buyer', [BuyerController::class, 'Registration03Submit'])->name("Registration03Submit");

// Route::get('/buyer/dashboard', [BuyerController::class, 'BuyerDashboard'])->name("BuyerDashboard")->middleware('ValidBuyerLogin');

// Route::get('/buyer/logout', [BuyerController::class, 'Logout'])->name("Logout")->middleware('ValidBuyerLogin');

// Route::get('/buyer/post', [PostController::class, 'Post'])->name("Post")->middleware('ValidBuyerLogin');
// Route::post('/buyer/post', [PostController::class, 'PostSubmit'])->name("PostSubmit")->middleware('ValidBuyerLogin');

// Route::get('/buyer/posts/{name}/{id}', [PostController::class, 'GetPosts'])->name("GetPosts")->middleware('ValidBuyerLogin');
// Route::get('/buyer/profile/{id}', [BuyerController::class, 'Profile'])->name("Profile")->middleware('ValidBuyerLogin');

// Route::post('/buyer/profile', [BuyerController::class, 'ProfileSubmit'])->name("ProfileSubmit")->middleware('ValidBuyerLogin');

// Route::get('/buyer/security', [BuyerController::class, 'Security'])->name("Security")->middleware('ValidBuyerLogin');

// Route::get('/buyer/post/details/{id}', [PostController::class, 'PostDetails'])->name("PostDetails")->middleware('ValidBuyerLogin');
// Route::get('/buyer/bid/confirm/{id}', [BidController::class, 'ConfirmBid'])->name("ConfirmBid")->middleware('ValidBuyerLogin');

// Route::get('/buyer/logout/session/{id}', [BuyerController::class, 'SessionLogout'])->name("SessionLogout")->middleware('ValidBuyerLogin');

// Route::post('/buyer/changepass', [BuyerController::class, 'ChangePass'])->name("ChangePass")->middleware('ValidBuyerLogin');

// Route::get('/buyer/account/remove', [BuyerController::class, 'RemoveAccount'])->name("RemoveAccount")->middleware('ValidBuyerLogin');

// Route::post('/search', [PostController::class, 'Search']);

// Route::get('/test', [GlobalController::class, 'Test']);
// Route::post('/test', [GlobalController::class, 'TestSub']);
