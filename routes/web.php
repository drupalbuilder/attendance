<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ResourcesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppSettingsController;





Route::get('/', [HomeController::class, 'index']);
Route::get('/get-menu', [MenuController::class, 'getMenu'])->name('getMenu');
Route::get('/wedding-cakes-category', [WeddingController::class, 'weddingCakesCategory'])->name('wedding-cakes-category');
Route::get('/wedding-cakes', [WeddingController::class, 'weddingCakes'])->name('wedding-cakes');
Route::get('/birthday-party-and-cakes', [WeddingController::class, 'birthdayParty'])->name('birthday-party-and-cakes');
Route::get('/voucher-redemption', [WeddingController::class, 'voucherRedemption'])->name('voucher-redemption');
Route::get('/about-us', [WeddingController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [WeddingController::class, 'contactUs'])->name('contact-us');
Route::get('/myWishlist', [WeddingController::class, 'myWishlist'])->name('myWishlist');


Route::get('/dashboard', function () {
    return view('Admin.dashboard');
});

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

Route::group(['middleware' => ['web', 'bwsback']], function () {

	Route::get('/login', [LoginController::class, 'index'])->name('login');
	Route::post('login', [LoginController::class, 'authcheck']);
	Route::post('login', [LoginController::class, 'authenticate']);


	Route::group(['middleware' => ['auth']], function () {

		Route::group(['prefix' => 'admin'], function () {

			Route::get('dashboard', [DashboardController::class, 'dashboard']);
			Route::get('profile', [UserController::class, 'profile']);
			Route::get('users', [UserController::class, 'users']);
			Route::get('user/edit/{id}', [UserController::class, 'editUser']);
			Route::get('user/add', [UserController::class, 'addUser']);
			Route::post('user/save-user', [UserController::class, 'saveUser']);
			Route::post('user/update', [UserController::class, 'updateUser']);
			Route::get('user/password-edit/{id}', [UserController::class, 'editPasswordUser']);
			Route::post('user/password/update', [UserController::class, 'passwordUpdateUser']);


			



			#settings dashboard
			Route::get('appsettings/dashboard', [AppSettingsController::class, 'index']);




			#user authentication
			Route::get('not-authorized', [UserController::class, 'noAuth'])->name('not-authorized');
		});
		Route::get('logout', [UserController::class, 'logout']);

		Route::fallback(function () {
			return redirect('admin/dashboard');
		});
	});
});

Route::group(['middleware' => ['guest']], function () {

	Route::get('/forgot-pass', function () {
		return view('auth.forgot-password');
	})->name('forgot.password');

	Route::post('/forgot-pass', function (Request $request) {
		$request->validate(['email' => 'required|email']);

		$status = Password::sendResetLink(
			$request->only('email')
		);

		return $status === Password::RESET_LINK_SENT
			? back()->with(['status' => __($status)])
			: back()->withErrors(['email' => __($status)]);
	})->name('password.email');
});

