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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::prefix('/admin')->name('admin.')->group(function () {
        Route::get('/admin-profile', 'Admin\UserController@index')->name('profile');

        Route::post('/change-password', 'Admin\UserController@changePassword')->name('change.password');
        Route::post('/upload', 'Admin\PageController@upload')->name('upload');
        Route::prefix('/page')->name('page.')->group(function () {
            Route::get('/', 'Admin\PageController@index')->name('index');
            Route::get('/add', 'Admin\PageController@add')->name('add');
            Route::get('/edit/{page_id}', 'Admin\PageController@edit')->name('edit');

            Route::post('/create', 'Admin\PageController@create')->name('create');
            Route::post('/update/{page_id}', 'Admin\PageController@update')->name('update');
        });

        Route::prefix('/package')->name('package.')->group(function () {
            Route::get('/', 'Admin\PackageController@index')->name('index');
            Route::get('/add', 'Admin\PackageController@add')->name('add');
            Route::get('/edit/{package_id}', 'Admin\PackageController@edit')->name('edit');

            Route::post('/create', 'Admin\PackageController@create')->name('create');
            Route::post('/update/{package_id}', 'Admin\PackageController@update')->name('update');
        });
    });
});

Route::get('/backurl', 'Home\HomeController@backUrl')->name('back-url');

Route::middleware('isdn')->group(function () {
    Route::prefix('/')->name('home.')->group(function () {
        Route::get('/', 'Home\HomeController@index')->name('index');
        Route::get('/{page_slug}', 'Home\HomeController@showPage')->name('show-page');

        Route::post('/reg', 'Home\HomeController@regSubmit')->name('reg');
    });
});
