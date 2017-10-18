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
})->name('welcome');

Auth::routes();

Route::get('/resiko', 'HomeController@index')->name('resiko');
Route::post('/resiko/add', 'HomeController@addResiko')->name('resiko.add');

Route::get('/findSkorDampak', 'HomeController@findSkorDampak')->name('findskordampak');
Route::get('/findSkorKemungkinan', 'HomeController@findSkorKemungkinan')->name('findskorkemungkinan');

Route::get('/tindaklanjut', 'HomeController@showActionPlan')->name('tindaklanjut');
Route::post('/tindaklanjut/add', 'HomeController@addActionPlan')->name('tindaklanjut.add');

Route::get('/chartdata', 'AdminController@chartdata')->name('chartdata');

Route::get('check/{skey}', 'Auth\LoginController@check');
Route::get('adminlogon/{skey}', 'Auth\AdminLoginController@logon')->name('adminlogon');
Route::get('userlogon/{skey}', 'Auth\UserLoginController@logon')->name('userlogon');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/users', 'AdminController@showUsers')->name('admin.users');
    Route::post('/users/add', 'AdminController@addUser')->name('admin.users.add');
	Route::post('/users/edit', 'AdminController@editUser')->name('admin.users.edit');
	Route::post('/users/delete', 'AdminController@deleteUser')->name('admin.users.delete');

    Route::get('/master/kemungkinan', 'AdminController@showKemungkinan')->name('admin.master.kemungkinan');
    Route::post('/master/kemungkinan', 'AdminController@editKemungkinan')->name('admin.master.kemungkinan.edit');
    Route::post('/master/kemungkinan/add', 'AdminController@addKemungkinan')->name('admin.master.kemungkinan.add');

    Route::get('/master/dampak', 'AdminController@showDampak')->name('admin.master.dampak');
    Route::post('/master/dampak', 'AdminController@editDampak')->name('admin.master.dampak.edit');
    Route::post('/master/dampak/add', 'AdminController@addDampak')->name('admin.master.dampak.add');

    Route::get('/master/aspekterdampak', 'AdminController@showAspekTerdampak')->name('admin.master.aspekterdampak');
    Route::post('/master/aspekterdampak', 'AdminController@editAspekTerdampak')->name('admin.master.aspekterdampak.edit');
    Route::post('/master/aspekterdampak/add', 'AdminController@addAspekTerdampak')->name('admin.master.aspekterdampak.add');

    Route::get('/master/program', 'AdminController@showProgram')->name('admin.master.program');
    Route::post('/master/program', 'AdminController@editProgram')->name('admin.master.program.edit');
    Route::post('/master/program/add', 'AdminController@addProgram')->name('admin.master.program.add');

    Route::get('/master/resiko', 'AdminController@showMasterResiko')->name('admin.master.resiko');
    Route::post('/master/resiko', 'AdminController@editMasterResiko')->name('admin.master.resiko.edit');
    Route::post('/master/resiko/add', 'AdminController@addMasterResiko')->name('admin.master.resiko.add');

    Route::get('/resiko', 'AdminController@showResiko')->name('admin.resiko');

    Route::get('/tindaklanjut', 'AdminController@showActionPlan')->name('admin.tindaklanjut');

    Route::get('/detailprogram', 'AdminController@showDetailProgram')->name('admin.detailprogram');

    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
