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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/actionplan', 'AdminController@showActionPlan');
    Route::post('/actionplan', 'AdminController@editActionPlan')->name('admin.ap.edit');

    Route::get('/users', 'AdminController@showUsers')->name('admin.users');
    Route::post('/users', 'AdminController@deleteUser')->name('admin.users.delete');

    Route::get('/master/kemungkinan', 'AdminController@showKemungkinan')->name('admin.master.kemungkinan');
    Route::post('/master/kemungkinan', 'AdminController@editKemungkinan')->name('admin.master.kemungkinan.edit');

    Route::get('/master/dampak', 'AdminController@showDampak')->name('admin.master.dampak');
    Route::post('/master/dampak', 'AdminController@editDampak')->name('admin.master.dampak.edit');

    Route::get('/master/aspekterdampak', 'AdminController@showAspekTerdampak')->name('admin.master.aspekterdampak');
    Route::post('/master/aspekterdampak', 'AdminController@editAspekTerdampak')->name('admin.master.aspekterdampak.edit');

    Route::get('/master/actionplan', 'AdminController@showActionPlan')->name('admin.master.actionplan');
    Route::get('/master/program', 'AdminController@showProgram')->name('admin.master.program');
    Route::get('/master/resiko', 'AdminController@showMasterResiko')->name('admin.master.resiko');
    Route::get('/resiko', 'AdminController@showResiko')->name('admin.resiko');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
