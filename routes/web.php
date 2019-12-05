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

Route::get('/','PagesController@index')->name('index');
Route::get('/user/','homeController@home')->name('home');
Route::get('/user/profile','PagesController@profile')->name('profile');
Route::get('/profile','UserProfileController@getProfile')->name('userprofile');
Route::get('/user/addcase','PagesController@addcase')->name('addcase');
Route::get('/user/allcase','CaseController@getAllCase')->name('allcase');
Route::get('/user/archive','PagesController@archive')->name('archive');
Route::get('/user/nextAtd','PagesController@nextAtd')->name('nextAtd');
Route::get('/user/noc','PagesController@noc')->name('noc');
Route::get('/user/other','PagesController@other')->name('other');
Route::get('/user/penitation','PagesController@penitation')->name('penitation');
Route::get('/user/case-details','PagesController@userCaseDetails')->name('userCaseDetails');
Route::get('/logout','SessionController@deleteSession')->name('logout');
Route::get('/update-associate','UserProfileController@updateAssociate');
Route::get('/delete-associate','UserProfileController@getDeleteAssociates');
Route::get('/delete-case','CaseController@getDeleteCase')->name('getDeleteCase');
Route::get('/associate-details','AjaxController@getAssociates')->name('associateDetails');
Route::get('/all-plaintiff','AjaxController@getAllPlaintiff')->name('getAllPlaintiff');
Route::get('/all-defender','AjaxController@getAllDefender')->name('getAllDefender');
Route::get('/all-witness','AjaxController@getAllWitness')->name('getAllWitness');
Route::get('/all-oponent','AjaxController@getAllOponent')->name('getAllOponent');
Route::get('/all-date','AjaxController@getAllDate')->name('getAllDate');
Route::get('/delete-plaintiff','AjaxController@deletePlaintiff');
Route::get('/delete-defender','AjaxController@deleteDefender');
Route::get('/delete-witness','AjaxController@deleteWitness');
Route::get('/delete-oponent','AjaxController@deleteOponent');
Route::get('/delete-case-file','CaseController@getDeleteCaseFile')->name('getDeleteCaseFile');
Route::get('/delete-date','AjaxController@deleteDate');
Route::get('/update-case','CaseController@updateCase')->name('update-case');
Route::post('/registration','RegistrationController@index')->name('registration');
Route::post('/login','LoginController@index')->name('login');
Route::post('/update-profile','UserProfileController@getUpdate')->name('updateProfile');
Route::post('/add-associates','UserProfileController@addAssociates')->name('addAssociates');
Route::post('/getUpdateAssociate','UserProfileController@getUpdateAssociate')->name('getUpdateAssociate');
Route::post('/create-case','CaseController@createCase')->name('create-case');
Route::post('/add-plaintiff','AjaxController@addPlaintiff')->name('addPlaintiff');
Route::post('/add-defender','AjaxController@addDefender')->name('addDefender');
Route::post('/add-witness','AjaxController@addWitness')->name('addWitness');
Route::post('/add-opponent','AjaxController@addOpponent')->name('addOpponent');
Route::post('/add-date','AjaxController@addDate')->name('addDate');
Route::post('/get-update-case','AjaxController@getUpdateCase')->name('getUpdateCase');
Route::post('/upload-file','CaseController@getUploadCaseFile')->name('getUploadCaseFile');


