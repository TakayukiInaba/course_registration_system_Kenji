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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
Route::get('course','CourseController@index')->name('top');;
Route::get('add','CourseController@add');
Route::post('add','CourseController@addpost');
Route::get('edit/{id}','CourseController@edit');
Route::post('update','CourseController@update');
Route::get('table','CourseController@table');
Route::post('table','CourseController@tablepost');
Route::get('list','CourseController@list')->name('list');
Route::get('list/{id}','CourseController@postList');
Route::get('cancel','CourseController@cancel')->name('cancel');
Route::post('cancel','CourseController@confirmCancel');
Route::post('postCancel','CourseController@postCancel');
Route::get('/home', 'HomeController@index')->name('home');
});
Auth::routes();

//生徒ページ用ルーティング
Route::prefix('student')->namespace('Student')->as('student.')->group(function(){
    Route::middleware('guest:student')->group(function(){
    Route::get('login','LoginController@showLoginForm')->name('login');
    Route::post('login','LoginController@login');
    //生徒ユーザー登録用
    Route::get('register/index','RegisterController@index')->name('register.index');
    Route::post('register/index','RegisterController@postIndex');
    Route::get('register/confirm','RegisterController@confirm')->name('register.confirm');
    Route::post('register/confirm','RegisterController@postConfirm');
    });

    Route::middleware('auth:student')->group(function(){
    Route::get('logout','LoginController@logout')->name('logout');
    Route::get('','IndexController@index')->name('top');
    Route::get('register/thanks','RegisterController@thanks')->name('register.thanks');
    Route::get('entry','IndexController@entry')->name('entry');
    Route::post('entry','IndexController@confirm');
    Route::post('postEntry','IndexController@postEntry');
    Route::get('entry/{term}/{time}/{id}','IndexController@singleEntry');
    Route::post('entry/{term}/{time}/{id}','IndexController@postSingleEntry');
    });
});
