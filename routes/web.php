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
Auth::routes();
Route::get('/', 'WelcomeController@index'); //Представление главная страница
Route::get('/checkListCreate', 'CheckListController@index')->name('create'); //Представление создания чек-листа
Route::post('/checkListStore', 'CheckListController@store'); //Сохранить в базу
Route::delete('/checkList/{checkList}', 'CheckListController@destroy');

//
Route::get('/detail/{id}', 'DetailCheckListController@index')->name('detail');
Route::post('/detailFetch', 'DetailCheckListController@check');

