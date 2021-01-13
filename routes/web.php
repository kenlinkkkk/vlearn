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

        Route::prefix('/lesson')->name('lesson.')->group(function () {
            Route::get('/', 'Admin\LessonController@index')->name('index');
            Route::get('/add', 'Admin\LessonController@add')->name('add');
            Route::get('/edit/{lesson_id}', 'Admin\LessonController@edit')->name('edit');

            Route::post('/create', 'Admin\LessonController@create')->name('create');
            Route::post('/update/{lesson_id}', 'Admin\LessonController@update')->name('update');
        });
    });
});

Route::get('/backurl', 'Home\HomeController@backUrl')->name('back-url');

//Route::middleware('isdn')->group(function () {
    Route::prefix('/')->name('home.')->group(function () {
        Route::get('/', 'Home\HomeController@index')->name('index');
        Route::get('/dang-nhap', 'Home\HomeController@showLogin')->name('showLogin');

        Route::middleware('check.client')->group(function () {
            Route::get('/thong-tin-ca-nhan', 'Home\ClientController@viewProfile')->name('showProfile');
            Route::prefix('/khoa-hoc')->name('course.')->group(function () {
                Route::get('/', 'Home\ClientController@viewListCourses')->name('listCourse');
                Route::get('/{slug}', 'Home\ClientController@viewListLessons')->name('listLessons');
                Route::prefix('/bai-hoc')->name('lessons.')->group(function () {
                    Route::get('/{slug}', 'Home\ClientController@detailLesson')->name('detailLesson');
                });
            });
        });

        Route::get('/{page_slug}', 'Home\HomeController@showPage')->name('show-page');

        Route::post('/reg', 'Home\HomeController@regSubmit')->name('reg');
        Route::post('/post-login', 'Home\ClientController@localLogin')->name('postLogin');
        Route::post('/post-logout', 'Home\ClientController@clientLogout')->name('postLogout');
    });
//});
