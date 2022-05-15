<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@landing')->name('welcome');

/* api routes */
Route::post('/api/login', 'ApiController@login');


Route::get('install/pre-installation', 'InstallController@preInstallation');
Route::get('install/configuration', 'InstallController@getConfiguration');
Route::post('install/configuration', 'InstallController@postConfiguration');
Route::get('install/complete', 'InstallController@complete');

Route::auth();

Route::get('/ref/{id}', 'RefController@index');

/* User routes */
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'HomeController@index');

    Route::get('/settings/account', 'UserController@account');
    Route::post('/settings/account', 'UserController@updateAccount');

    Route::get('/settings/billing', 'BillingController@index');

    Route::get('/transfer', 'TransferController@index');
    Route::post('transfer', 'TransferController@transferCredits');

    Route::get('/websites', 'WebsiteController@index');
    Route::get('/websites/add', 'WebsiteController@addWebsite');
    Route::post('/websites/add', 'WebsiteController@addWebsite');

    Route::get('/websites/edit/{site_id?}', 'WebsiteController@getSiteInfo');
    Route::post('/websites/edit/{site_id?}', 'WebsiteController@editWebsite');

    Route::get('/websites/delete/{site_id?}', 'WebsiteController@getSiteInfo');
    Route::post('/websites/delete/{site_id?}', 'WebsiteController@delWebsite');

    Route::get('/surf', 'SurfController@surf');


    Route::get('/session', 'SurfController@session');
    Route::post('/session', 'SurfController@session');

    Route::get('/referrals', 'HomeController@referrals');

    Route::get('/buy/credits', 'HomeController@buycredits')->name('credits');

    // route for processing payment
    Route::get('/paymen', function () {
        return view('payment');
    })->name('paymen');
    Route::post('/rave/pay', 'FlutterwaveController@initialize' )->name('rave-pay');
    // The callback url after a payment
    Route::get('/rave/callback', 'FlutterwaveController@callback')->name('rave-callback');
    

    Route::get('/contact', 'HomeController@contact');
    Route::post('/contact', 'HomeController@postContact');
    Route::get('/faq', 'HomeController@faq');
});

/* Admin routes */
Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {

    Route::get('/', 'AdminController@index');

    Route::get('/users', 'AdminController@users');
    Route::get('/users/add', 'AdminController@adduser');
    Route::post('/users/add', 'AdminController@adduser');
    Route::get('/users/edit/{id}', 'AdminController@editUser');
    Route::post('/users/edit/{id}', 'AdminController@editUser');
    Route::get('/users/delete/{id}', 'AdminController@delUser');

    Route::get('/credits', 'AdminController@credits');
    Route::get('/credits/addpack', 'AdminController@addCredits');
    Route::post('/credits/addpack', 'AdminController@addCredits');
    Route::get('/credits/delete/{id}', 'AdminController@delCredits');

    Route::get('/websites', 'AdminController@websites');
    Route::get('/websites/edit/{id}', 'AdminController@editSite');
    Route::post('/websites/edit/{id}', 'AdminController@editSite');
    Route::get('/websites/delete/{id}', 'AdminController@delSite');

    Route::get('/transfers', 'AdminController@transfers');

    Route::get('/sales', 'AdminController@sales');

    Route::get('/settings', 'AdminController@settings');
    Route::post('/settings', 'AdminController@postSettings');

    //Route::match(['get', 'post'], '/', function () { });
});


