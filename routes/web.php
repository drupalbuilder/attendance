<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ResourcesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TextAndImageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AppSettingsController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\Admin\BlockController;
use App\Http\Controllers\Admin\CardcontentController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\WeddingController;
use App\Http\Controllers\Admin\BlockcategoryController;




Route::get('/', [HomeController::class, 'index']);
Route::get('/get-menu', [MenuController::class, 'getMenu'])->name('getMenu');
Route::get('/wedding-cakes-category', [WeddingController::class, 'weddingCakesCategory'])->name('wedding-cakes-category');
Route::get('/wedding-cakes', [WeddingController::class, 'weddingCakes'])->name('wedding-cakes');
Route::get('/birthday-party-and-cakes', [WeddingController::class, 'birthdayParty'])->name('birthday-party-and-cakes');
Route::get('/voucher-redemption', [WeddingController::class, 'voucherRedemption'])->name('voucher-redemption');
Route::get('/about-us', [WeddingController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [WeddingController::class, 'contactUs'])->name('contact-us');
Route::get('/myWishlist', [WeddingController::class, 'myWishlist'])->name('myWishlist');

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


			/* #Resources
			Route::get('resources/list', [ResourcesController::class, 'index']);
			Route::get('resources/edit/{id}', [ResourcesController::class, 'edit']);
			Route::post('resources/update', [ResourcesController::class, 'update']);
			Route::get('resources/add', [ResourcesController::class, 'create']);
			Route::post('resources/save-resource', [ResourcesController::class, 'store']);
			Route::get('resources/action/{action}/{id}', [ResourcesController::class, 'action']);

			#Videos
			Route::get('videos/list', [VideosController::class, 'index']);
			Route::get('videos/edit/{id}', [VideosController::class, 'edit']);
			Route::post('videos/update', [VideosController::class, 'update']);
			Route::get('videos/add', [VideosController::class, 'create']);
			Route::post('videos/save-videos', [VideosController::class, 'store']);
			Route::get('videos/action/{action}/{id}', [VideosController::class, 'action']);

			#FAQ
			Route::get('faq/list', [FaqController::class, 'index']);
			Route::get('faq/edit/{id}', [FaqController::class, 'edit']);
			Route::post('faq/update', [FaqController::class, 'update']);
			Route::get('faq/add', [FaqController::class, 'create']);
			Route::post('faq/save-faq', [FaqController::class, 'store']);
			Route::get('faq/action/{action}/{id}', [FaqController::class, 'action']);

			#Notifications
			Route::get('notification/list', [NotificationController::class, 'index']);
			Route::get('notification/edit/{id}', [NotificationController::class, 'edit']);
			Route::post('notification/update', [NotificationController::class, 'update']);
			Route::get('notification/add', [NotificationController::class, 'create']);
			Route::post('notification/save', [NotificationController::class, 'store']);
			Route::get('notification/action/{action}/{id}', [NotificationController::class, 'action']);





			#Category
			Route::get('category/list', [CategoryController::class, 'index']);
			Route::get('category/edit/{id}', [CategoryController::class, 'edit']);
			Route::post('category/update', [CategoryController::class, 'update']);
			Route::get('category/add', [CategoryController::class, 'create']);
			Route::post('category/save-category', [CategoryController::class, 'store']);
			Route::get('category/action/{action}/{id}', [CategoryController::class, 'action']);


			#Blockcategory
			Route::get('blockcategory/list', [BlockcategoryController::class, 'index']);
			Route::get('blockcategory/edit/{id}', [BlockcategoryController::class, 'edit']);
			Route::post('blockcategory/update', [BlockcategoryController::class, 'update']);
			Route::get('blockcategory/add', [BlockcategoryController::class, 'create']);
			Route::post('blockcategory/save-category', [BlockcategoryController::class, 'store']);
			Route::get('blockcategory/action/{action}/{id}', [BlockcategoryController::class, 'action']);


			#Product
			Route::get('product/list', [ProductController::class, 'index'])->name('admin.product.list');
			Route::get('product/edit/{id}', [ProductController::class, 'edit']);
			Route::post('product/update', [ProductController::class, 'update']);
			Route::get('product/add', [ProductController::class, 'create']);
			Route::post('product/save-product', [ProductController::class, 'store']);
			Route::get('product/action/{action}/{id}', [ProductController::class, 'action']);

			#Product Attributes
			Route::get('product_attribute/{productId}', [ProductController::class, 'productAttribute'])->name('product_attribute');
			Route::get('product_attribute_options/{productId}', [ProductController::class, 'showAttributeOptions'])->name('product_attribute_options');
			Route::post('product_attribute_options/store', [ProductController::class, 'storeAttributeOption'])->name('store_attribute_option');
			Route::post('product/product_attribute/save/{productId}', [ProductController::class, 'saveAttributes'])->name('admin.product_attribute.save');
			Route::get('product/productAttribute/options/{productId}/{attributeId}', [ProductController::class, 'showAttributeOptions'])->name('admin.product.product_attribute_options');
			Route::get('product/showAttributeOptions/{productId}/{attributeId}', [ProductController::class, 'showAttributeOptions'])->name('admin.product.showAttributeOptions');
			Route::post('save-attribute-options/{productId}/{attributeId}', [ProductController::class, 'saveAttributeOptions'])->name('save_attribute_options');
			Route::get('delete-attribute-option/{optionId}', [ProductController::class, 'deleteAttributeOption'])->name('delete_attribute_option');


			#Block
			Route::get('block/list', [BlockController::class, 'index']);
			Route::get('block/edit/{id}', [BlockController::class, 'edit']);
			Route::post('block/update', [BlockController::class, 'update']);
			Route::get('block/add', [BlockController::class, 'create']);
			Route::post('block/save-category', [BlockController::class, 'store']);
			Route::get('block/action/{action}/{id}', [BlockController::class, 'action']);


			#Card
			Route::get('card/list', [CardcontentController::class, 'index']);
			Route::get('card/edit/{id}', [CardcontentController::class, 'edit']);
			Route::post('card/update', [CardcontentController::class, 'update']);
			Route::get('card/add', [CardcontentController::class, 'create']);
			Route::post('card/save-category', [CardcontentController::class, 'store']);
			Route::get('card/action/{action}/{id}', [CardcontentController::class, 'action']);


			#Attribute
			Route::get('attribute/list', [AttributeController::class, 'index']);
			Route::get('attribute/add', [AttributeController::class, 'create']);
			Route::post('attribute/save-attribute', [AttributeController::class, 'store']);
			Route::get('attribute/edit/{id}', [AttributeController::class, 'edit']);
			Route::get('attribute/option/{id}', [AttributeController::class, 'option']);
			Route::post('attribute/update', [AttributeController::class, 'update']);
			Route::get('attribute/action/{action}/{id}', [AttributeController::class, 'action']);
			Route::get('attribute/options', [AttributeController::class, 'attributeOptionsPage'])->name('admin.attribute.options');
			#Page
			Route::get('page/list', [PageController::class, 'index']);
			Route::get('page/edit/{id}', [PageController::class, 'edit']);
			Route::post('page/update', [PageController::class, 'update']);
			Route::get('page/add', [PageController::class, 'create']);
			Route::post('page/save-category', [PageController::class, 'store']);
			Route::get('page/action/{action}/{id}', [PageController::class, 'action']);

			#Banners
			Route::get('banners/list', [BannersController::class, 'index']);
			Route::get('banners/edit/{id}', [BannersController::class, 'edit']);
			Route::post('banners/update', [BannersController::class, 'update']);
			Route::get('banners/add', [BannersController::class, 'create']);
			Route::post('banners/save-category', [BannersController::class, 'store']);
			Route::get('banners/action/{action}/{id}', [BannersController::class, 'action']);




			#Cms
			Route::get('cms/list', [CmsController::class, 'index']);
			Route::get('cms/edit/{id}', [CmsController::class, 'edit']);
			Route::post('cms/update', [CmsController::class, 'update']);
			Route::get('cms/add', [CmsController::class, 'create']);
			Route::post('cms/save-cms', [CmsController::class, 'store']);
			Route::get('cms/text', [CmsController::class, 'create1']);
			Route::post('cms/save-text', [CmsController::class, 'store1']);

			Route::get('cms/action/{action}/{id}', [CmsController::class, 'action']);




			#Menu
			Route::get('menu/list', [MenuController::class, 'index']);
			Route::get('menu/edit/{id}', [MenuController::class, 'edit']);
			Route::post('menu/update', [MenuController::class, 'update']);
			Route::get('menu/add', [MenuController::class, 'create']);
			Route::post('menu/save-menu', [MenuController::class, 'store']);
			Route::get('menu/action/{action}/{id}', [MenuController::class, 'action']);


			Route::get('menu/action/{action}/{id}', [MenuController::class, 'action']);


			#test_c
	
			Route::get('test_c/one', [TestController::class, 'index']);
			Route::get('test_c/xt', [TestController::class, 'index1']);
			Route::get('test_c/cd', [TestController::class, 'index2']);
			Route::get('test_c/list', [TestController::class, 'index3'])->name('test_c.list');
			Route::post('test_c/save-content', [TestController::class, 'store']);
			Route::get('/admin/test_c/xt', [TestController::class, 'getHtml']);
			Route::get('/admin/test_c/cd', [TestController::class, 'getHtml1']);
			Route::get('test_c/delete-group/{groupId}', [TestController::class, 'deleteGroup']);
			Route::post('test_c/update-form/{id}', [TestController::class, 'updateFormData'])->name('test_c.update_form');
			Route::post('test_c/remove-section/{id}', [TestController::class, 'removeSection'])->name('test_c.remove_section');
            Route::get('test_c/edit-group/{groupId}', [TestController::class, 'editGroup'])->name('test_c.edit_group');
			Route::post('test_c/store', [TestController::class, 'store'])->name('test_c.store');
			Route::post('test_c/store-or-update/{groupId}', [TestController::class, 'storeOrUpdate'])->name('test_c.storeOrUpdate');


			// #Category
			// Route::get('categorytest/list', [CategorytestController::class, 'index']);
			// Route::get('categorytest/edit/{id}', [CategorytestController::class, 'edit']);
			// Route::post('categorytest/update', [CategorytestController::class, 'update']);
			// Route::get('categorytest/add', [CategorytestController::class, 'create']);
			// Route::get('ajax/categories/{id}', [CategorytestController::class, 'ajax']);


			// Route::post('categorytest/save-category', [CategorytestController::class, 'store']);
			// Route::get('categorytest/action/{action}/{id}', [CategorytestController::class, 'action']); */



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
