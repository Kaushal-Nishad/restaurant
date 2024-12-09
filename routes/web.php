<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\WaiterController;
use App\Http\Controllers\KitchenSettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManageFoodController;
use App\Http\Controllers\TableListController;
use App\Http\Controllers\CustomerListController;
use App\Http\Controllers\CustomerTypeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderMenuController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\BannerController;


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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [HomeController::class, 'index']);
Route::get('category/{text}', [HomeController::class, 'category_items']);
Route::get('menu/{text}', [HomeController::class, 'menu_items']);
Route::any('reservation', [HomeController::class, 'reservation']);
Route::get('add-reservation', [HomeController::class, 'addReservation_view']);
Route::post('create-reservation', [ReservationController::class, 'store']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact', [HomeController::class, 'contactStore']);
Route::any('/login', [CustomerListController::class, 'login']);
Route::get('/signup', [CustomerListController::class, 'create']);
Route::post('/signup', [CustomerListController::class, 'store']);
Route::get('/logout', [CustomerListController::class, 'logout']);
Route::get('user/profile', [CustomerListController::class, 'show']);
Route::post('/user/profile', [CustomerListController::class, 'customerUpdate']);
Route::any('user/change-password', [CustomerListController::class, 'changePassword']);
Route::any('forgot-password', [CustomerListController::class, 'forgotPassword']);
Route::get('reset-password', [CustomerListController::class, 'reset_password']);
Route::post('reset-password', [CustomerListController::class, 'reset_passwordUpdate']);


Route::get('/admin', function () {
    return redirect('/admin/login');
});
Route::post('/admin/login', [AdminController::class, 'index']);
Route::group(['middleware' => ['protectedPage']], function () {
    Route::get('/admin/login', [AdminController::class, 'index']);
    Route::post('admin/logout', [AdminController::class, 'logout']);
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    Route::any('admin/change-password', [AdminController::class, 'changePassword']);
    Route::resource('admin/menu_type', MenuController::class);
    Route::resource('admin/waiters', WaiterController::class);
    Route::resource('admin/manage_category', CategoryController::class);
    Route::resource('admin/manage_food', ManageFoodController::class);
    Route::resource('admin/table_list', TableListController::class);
    Route::resource('admin/customer_list', CustomerListController::class);
    Route::resource('admin/customer_types', CustomerTypeController::class);
    Route::resource('admin/payment_method', PaymentMethodController::class);
    Route::resource('admin/pages', PageController::class);
    Route::resource('admin/country', CountryController::class);
    Route::resource('admin/city', CityController::class);
    Route::resource('admin/state', StateController::class);
    Route::any('admin/reservation/check', [ReservationController::class, 'checkavailablity']);
    Route::resource('admin/reservation', ReservationController::class);
    Route::any('admin/general_settings', [SettingsController::class, 'general_settings']);
    Route::any('admin/social_links', [SettingsController::class, 'social_links']);
    Route::any('admin/kitchen-settings', [SettingsController::class, 'kitchen_settings']);
    // Route::resource('admin/riders', RiderController::class);
    Route::post('admin/get-cat-items', [OrderMenuController::class, 'showCatItems']);
    Route::post('admin/search-items', [OrderMenuController::class, 'searchItems']);
    Route::post('admin/food_item', [OrderMenuController::class, 'addFoodList']);
    Route::get('admin/on_going_order', [OrderMenuController::class, 'onGoing_orders']);

    Route::get('admin/order_list/print/{id}', [OrderMenuController::class, 'printInvoice']);
    Route::get('admin/cancel_order/{id}', [OrderMenuController::class, 'cancel_order']);
    Route::post('admin/complete_order', [OrderMenuController::class, 'complete_order']);
    Route::resource('admin/order_list', OrderMenuController::class);

    Route::resource('admin/banners', BannerController::class);
    Route::any('admin/contact-query', [SettingsController::class, 'contact_query']);
    Route::any('admin/contact-query/{id}', [SettingsController::class, 'destroy_contact_query']);
});

Route::group(['middleware' => ['kitchenprotectedPage']], function () {
    Route::any('/kitchen', [KitchenSettingController::class, 'kitchenLogin']);
    Route::get('kitchen/dashboard', [KitchenSettingController::class, 'homePage']);
    Route::get('kitchen/all_kitchen', [KitchenSettingController::class, 'allKitchen']);
    Route::get('kitchen/all_kitchen', [KitchenSettingController::class, 'singleKitchen']);
    Route::get('kitchen/logout', [KitchenSettingController::class, 'logout']);

    Route::post('admin/order_status_accept', [OrderMenuController::class, 'acceptOrderByKitchen']);
});

Route::get('/{text}', [HomeController::class, 'custom_page']);
