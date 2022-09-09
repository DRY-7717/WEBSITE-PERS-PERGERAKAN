<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutomotiveController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardAdsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardEditorChoiceController;
use App\Http\Controllers\DashboardIklanController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EntertaimentController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\PoliticController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\WorldController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('login');
Route::get('/home/show/{post:slug}', [HomeController::class, 'show']);

// World
Route::get('/world', [WorldController::class, 'index']);
Route::get('/world/searchnewsworld', [WorldController::class, 'searchworld'])->middleware('search');

// Technology
Route::get('/technology', [TechnologyController::class, 'index']);
Route::get('/technology/searchnewstechnology', [TechnologyController::class, 'searchtechnology'])->middleware('search');
// Sport
Route::get('/sport', [SportController::class, 'index']);
Route::get('/sport/searchnewssport', [SportController::class, 'searchsport'])->middleware('search');
// Automotive
Route::get('/automotive', [AutomotiveController::class, 'index']);
Route::get('/automotive/searchnewsautomotive', [AutomotiveController::class, 'searchautomotive'])->middleware('search');
// Food
Route::get('/food', [FoodController::class, 'index']);
Route::get('/food/searchnewsfood', [FoodController::class, 'searchfood'])->middleware('search');
// Education
Route::get('/education', [EducationController::class, 'index']);
Route::get('/education/searchnewseducation', [EducationController::class, 'searcheducation'])->middleware('search');
// finance
Route::get('/finance', [FinanceController::class, 'index']);
Route::get('/finance/searchnewsfinance', [FinanceController::class, 'searchfinance'])->middleware('search');
// Politic
Route::get('/politic', [PoliticController::class, 'index']);
Route::get('/politic/searchnewspolitic', [PoliticController::class, 'searchpolitic'])->middleware('search');
// Entertaiment
Route::get('/entertaiment', [EntertaimentController::class, 'index']);
Route::get('/entertaiment/searchnewsentertaiment', [EntertaimentController::class, 'searchentertaiment'])->middleware('search');
// Travel
Route::get('/travel', [TravelController::class, 'index']);
Route::get('/travel/searchnewstravel', [TravelController::class, 'searchtravel'])->middleware('search');
// Health
Route::get('/health', [HealthController::class, 'index']);
Route::get('/health/searchnewshealth', [HealthController::class, 'searchhealth'])->middleware('search');

Route::get('/auth/signin', [AuthController::class, 'signin']);
Route::post('/auth/signin', [AuthController::class, 'authenticate']);
Route::get('/auth/register', [AuthController::class, 'registrasi']);
Route::post('/auth/register', [AuthController::class, 'registered']);
// // Forgot password
// Route::get('/auth/forgotpassword',[AuthController::class,'showforgotpassword'])->name('auth.showforgotpassword');
// Route::post('/auth/forgotpassword',[AuthController::class,'sendlinkforgotpassword'])->name('auth.sendlinkforgotpassword');
// Route::get('/auth/resetpassword/{token}',[AuthController::class,'showresetpassword'])->name('auth.showresetpassword');
// Route::post('/auth/resetpassword',[AuthController::class,'resetpassword'])->name('auth.resetpassword');
// End forgot password
Route::post('/auth/logout', [AuthController::class, 'logout']);

// Admin
Route::get('/dashboardadmin/post/checkSlug', [DashboardAdminController::class, 'checkSlug'])->middleware('admin');
Route::resource('dashboardadmin/post',DashboardAdminController::class)->middleware('admin'); 

// Post
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');
Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/post', DashboardPostController::class)->middleware('auth');

// Editor
Route::resource('/dashboardeditor/post', DashboardEditorChoiceController::class)->middleware('admin');
// Ads
Route::resource('/dashboard/iklan', DashboardIklanController::class)->middleware('admin');


// User
Route::get('/dashboard/user/changepassword', [DashboardUserController::class, 'editpassword'])->middleware('auth');
Route::post('/dashboard/user/changepassword/{user:username}', [DashboardUserController::class, 'changepassword'])->middleware('auth');
Route::resource('/dashboard/user', DashboardUserController::class)->middleware('auth');
