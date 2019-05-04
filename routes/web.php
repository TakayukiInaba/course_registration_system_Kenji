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

Route::prefix('teacher')->namespace('Teacher')->as('teacher.')->group(function(){
    Route::middleware('guest:teacher')->group(function(){
        Route::get('login','LoginController@showLoginForm')->name('login');
        Route::post('login','LoginController@login');
        //生徒ユーザー登録用
        Route::get('register/index','RegisterController@index')->name('register.index');
        Route::post('register/index','RegisterController@postIndex');
        Route::get('register/confirm','RegisterController@confirm')->name('register.confirm');
        Route::post('register/confirm','RegisterController@postConfirm');
    });
    Route::middleware('auth:teacher')->group(function(){
        Route::get('register/thanks','RegisterController@thanks')->name('register.thanks');
        Route::get('logout','LoginController@logout')->name('logout');
        Route::get('','IndexController@index')->name('top');;
        Route::get('add','CourseController@add')->name('add');
        Route::post('add','CourseController@addpost');
        Route::get('edit/{id}','CourseController@edit');
        Route::post('update','CourseController@update');
        Route::get('table','CourseController@table')->name('table');
        Route::post('table','CourseController@tablepost');
        Route::get('list','CourseController@list')->name('list');
        Route::get('list/{id}','CourseController@postList');
        Route::get('cancel','CourseController@cancel')->name('cancel');
        Route::post('cancel','CourseController@confirmCancel');
        Route::post('postCancel','CourseController@postCancel');
        Route::get('back','CourseController@back')->name('back');
        Route::get('/home', 'HomeController@index')->name('home');
    });
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
        Route::get('download','IndexController@pdfTimeTable')->name('download');
        Route::get('register/thanks','RegisterController@thanks')->name('register.thanks');
        Route::get('entry','IndexController@entry')->name('entry');
        Route::post('entry','IndexController@confirm');
        Route::post('postEntry','IndexController@postEntry');
        Route::get('entry/{term}/{time}/{id}','IndexController@singleEntry');
        Route::post('entry/{term}/{time}/{id}','IndexController@postSingleEntry');
    });
});

Route::prefix('shingaku')->namespace('Admin')->as('shingaku.')->group(function(){
    Route::middleware('guest:admin')->group(function(){
        Route::get('login','LoginController@showLoginForm')->name('login');
        Route::post('login','LoginController@login');
    });

    //Route::middleware('auth:admin')->group(function(){
        Route::get('logout','LoginController@logout')->name('logout');
        Route::get('','IndexController@index')->name('top');
        Route::get('adminoption','IndexController@adminOption')->name('adminoption');
        Route::post('adminadd','IndexController@adminAdd');

        //「期間」の設定
        Route::get('termoption','IndexController@termOption')->name('termoption');
        Route::post('termoption','IndexController@addTerm');
        Route::get('edit/{id}','IndexController@editTerm');
        Route::post('update','IndexController@updateTerm');
        Route::get('delete/{id}','IndexController@deleteTerm');

        //「時限」の設定 
        Route::get('timeoption','IndexController@timeOption')->name('timeoption');
        Route::post('timeoption','IndexController@addTime');
        Route::get('edittime/{id}','IndexController@editTime');
        Route::post('updatetime','IndexController@updateTime');
        Route::get('deletetime/{id}','IndexController@deleteTime');

        //「学年」の設定 
        Route::get('gradeoption','IndexController@gradeOption')->name('gradeoption');
        Route::post('gradeoption','IndexController@addGrade');
        Route::get('editgrade/{id}','IndexController@editGrade');
        Route::post('updategrade','IndexController@updateGrade');
        Route::get('deletegrade/{id}','IndexController@deleteGrade');

        //「レベル」の設定
        Route::get('leveloption','IndexController@levelOption')->name('leveloption');
        Route::post('leveloption','IndexController@addLevel');
        Route::get('editlevel/{id}','IndexController@editLevel');
        Route::post('updatelevel','IndexController@updateLevel');
        Route::get('deletelevel/{id}','IndexController@deletelevel');

         //「教員」の設定
         Route::get('teacheroption','IndexController@teacherOption')->name('teacheroption');
         Route::post('teacheroption','IndexController@addteacher');
         Route::get('editteacher/{id}','IndexController@editteacher');
         Route::post('updateteacher','IndexController@updateteacher');
         Route::get('deleteteacher/{id}','IndexController@deleteteacher');


         //「生徒アカウント」の設定
         Route::get('accountstudents','OptionaccountController@indexStudents')->name('accountstudents');
         Route::POST('accountstudents/upload', 'OptionaccountController@import')->name('students.import');
         Route::get('accountstudent/delete/{id}','OptionaccountController@deleteStudent');
         Route::get('accountstudent/edit/{id}','OptionaccountController@editStudent');
         Route::post('accountstudent/update','OptionaccountController@updateStudent');

         //「業務管理」
         Route::get('job/cancellist','JobmanagementController@cancelList')->name('cancellist');
         Route::get('job/cancellist/export/pdf','JobmanagementController@cancelListExportPdf')->name('cancellist.export.pdf');
         Route::get('job/cancellist/export/excel','JobmanagementController@cancelListExportExcel')->name('cancellist.export.excel');
         Route::get('job/feellist','JobmanagementController@feeList')->name('feelist');
         Route::get('job/feelist/export/pdf','JobmanagementController@feeListExportPdf')->name('feelist.export.pdf');
         Route::get('job/feelist/export/excel','JobmanagementController@feeListExportExcel')->name('feelist.export.excel');
         Route::get('job/courseslist','JobmanagementController@csvOutput')->name('courseslist');
         Route::get('job/courseslist/export/excel','JobmanagementController@coursesListExportExcel')->name('courseslist.export.excel');
    //});
});

