<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;

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

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

Route::get('/', '\App\Http\Controllers\HomeController@login')->name('login');
Route::get('/kullanici/giris', '\App\Http\Controllers\LoginController@get_login')->name('user-login');
Route::post('/kullanici-giris/post', '\App\Http\Controllers\LoginController@post_form')->name('login-post');
Route::get('/kayit-ol', '\App\Http\Controllers\RegisterController@getRegister')->name('get-register');
Route::post('/yeni-kullanici', '\App\Http\Controllers\RegisterController@postRegister')->name('post-register');
Route::get('/aktiflestir/{slug}', '\App\Http\Controllers\RegisterController@getActivation')->name('get-activation');
Route::get('/cikis', '\App\Http\Controllers\LoginController@getLogout')->name('get-logout');


Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/kullanici', '\App\Http\Controllers\AdminController@getUser')->name('get-user');
        Route::get('/yeni-kullanici', '\App\Http\Controllers\UserController@getUserForm')->name('get-user-new');
        Route::get('/kullanici-guncelle/{id}', '\App\Http\Controllers\UserController@getUserForm')->name('get-user-arrangement');
        Route::post('/kullanici-kaydet/{id}', '\App\Http\Controllers\UserController@postUserCreated')->name('post-user-created');
        Route::get('/kullanici-sil/{id}', '\App\Http\Controllers\UserController@getDelete')->name('get-delete');
        Route::get('/gorev', '\App\Http\Controllers\AdminController@getTask')->name('get-task');
        Route::get('/yeni-gorev', '\App\Http\Controllers\TaskController@getTaskForm')->name('get-task-new');
        Route::get('/gorev-guncelle/{id}', '\App\Http\Controllers\TaskController@getTaskForm')->name('get-task-arrangement');
        Route::post('/gorev-kaydet/{id}', '\App\Http\Controllers\TaskController@postTaskCreated')->name('post-task-created');
        Route::get('/görev-sil/{id}', '\App\Http\Controllers\TaskController@getDeleteTask')->name('get-delete-task');

    });
});
Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'projeyoneticisi'], function () {
        Route::get('/', '\App\Http\Controllers\SupervisorController@getSupervisor')->name('get-supervisor-login');
        Route::get('/gorevler', '\App\Http\Controllers\SupervisorController@getTaskSupervisor')->name('get-task-supervisor');
        Route::get('/yeni-gorev', '\App\Http\Controllers\TaskController@getSupervisorTaskForm')->name('get-supervisor-task-new');
        Route::get('/gorev-guncelle/{id}', '\App\Http\Controllers\TaskController@getSupervisorTaskForm')->name('get-supervisor-task-arrangement');
        Route::post('/gorev-kaydet/{id}', '\App\Http\Controllers\TaskController@postSupervisorTaskCreated')->name('post-supervisor-task-created');
        Route::get('gorev/kontrol/{id}/{description}', '\App\Http\Controllers\SupervisorController@getSupervisorDescriptionChange')->name('get-supervisor-description-change');
        Route::post('/yildizlar/{id}', '\App\Http\Controllers\SupervisorController@postPerformance')->name('post-performance');
        Route::get('/yildiz/{id}', '\App\Http\Controllers\SupervisorController@getPerformance')->name('get-performance');
    });

});

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'kullanici'], function () {
        Route::get('/', '\App\Http\Controllers\UserController@getUser')->name('get-user-login');
        Route::get('/mesaj', '\App\Http\Controllers\UserController@getMessage')->name('get-message');
        Route::get('/yeni-mesaj', '\App\Http\Controllers\UserController@getNewMessage')->name('get-new-message');
        Route::post('/yeni-mesajlar', '\App\Http\Controllers\UserController@postNewMessage')->name('post-new-message');
        Route::get('/mesaj-sil/{id}', '\App\Http\Controllers\UserController@getDeleteMessage')->name('get-delete-message');
        Route::get('/islem/{id}/{description}', '\App\Http\Controllers\UserController@getDescriptionChange')->name('get-description-change');
    });

});


Auth::routes();







