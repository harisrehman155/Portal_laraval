<?php

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

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get("/link", function () {
    Artisan::call('storage:link');
});

Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', 'UserController@show')->name('portal.login');
    Route::post('/login',  'UserController@login')->name('login');

    Route::get('/register',  'UserController@showRegister')->name('register');
    Route::post('/register',  'UserController@register')->name('register');
});

Route::group(['middleware' => 'auth'], function () {

    Route::post('/logout',  'UserController@logout')->name('logout');

    Route::get('/profile',  'UserController@profile')->name('profile');
    Route::put('/update',  'UserController@update')->name('update');

    // Route url
    Route::get('/', function () {
        return redirect('/dashboard');
    });

    Route::get('file-manager', function () {
        return view('portal.pages.filemanager');
    })->name('file-manager');

    Route::get('/dashboard', 'DashboardController@dashboardAnalytics')->name('portal.dashboard');

    Route::get('/vector-order', 'DashboardController@showVectorForm')->name('vector.order');
    Route::get('/digitizing-order', 'DashboardController@showDigitizingForm')->name('digitizing.order');

    Route::post('/place-order', 'DashboardController@placeOrder')->name('place.order');
    Route::patch('/update-order/{id}', 'DashboardController@updateOrder')->name('update.order');


    Route::get('/vector-orders', 'DashboardController@vectorListView')->name('vectorListView');
    Route::get('/digitizing-orders', 'DashboardController@digitizingListView')->name('digitizingListView');

    Route::get('/vectorList', 'DashboardController@vectorList')->name('vectorList');
    Route::get('/digitizingList', 'DashboardController@digitizingList')->name('digitizingList');
    Route::delete('/delete/{id}', 'DashboardController@destroyOrder')->name('order.destroy');

    Route::get('/edit-vector-order/{id}', 'DashboardController@editVectorOrder')->name('vector-order.edit');
    Route::get('/edit-digitizing-order/{id}', 'DashboardController@editDigitizingOrder')->name('digitizing-order.edit');

    Route::post('customer/media', 'DashboardController@storeMedia')
        ->name('customer.storeMedia');

    Route::group(['middleware' => 'manage-orders'], function () {
        Route::get('users', 'DashboardController@users')->name('users');
        Route::get('users-list', 'DashboardController@usersList')->name('usersList');
        Route::get('manage-orders', 'DashboardController@manageOrdersShow')->name('manage.orders');
        Route::post('complete/order', 'DashboardController@completeOrder')->name('complete.order');
        Route::delete('/users/{id}', 'DashboardController@destroyUser')->name('user.destroy');
    });
});

Route::get('download/ordered/files/{id}', 'DashboardController@downloadOrderedFiles')->name('download.ordered.files');

Route::get('/download-files/{orderId}',  'DashboardController@downloadFiles')->name('download.files');
