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

Route::get('/','HomeController@index')->name('welcome');

Auth::routes();



Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'],function(){

    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('book','BooksController');
    Route::resource('location','LocationController');
    Route::resource('faculty','FacultyController');
    Route::resource('user','UserController');
    Route::resource('student','StudentController');
    Route::resource('borrow','BorrowController');
    Route::resource('slider','SlidersController');
    Route::post('/student/update', 'StudentController@Update')->name('admin.student.update');
    Route::post('/update1/{id}', 'BooksController@update1')->name('book.update1');
});
