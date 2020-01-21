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

//
Route::get('/', 'WelcomeController@index'); //Представление главная страница
Route::get('/checkListCreate', 'CheckListController@indexCreate')->name('create'); //Представление создания чек-листа
Route::post('/checkListStore', 'CheckListController@store'); //Сохранить в базу чек-лист

//
Route::get('/detail/{id}', 'DetailCheckListController@index')->name('detail'); //Представление формы детали чек-листа
Route::get('/detailCreate/{id}', 'DetailCheckListController@createForm')->name('detailCreate'); //Представление формы создания детального листа
Route::get('/showSecondary', 'DetailCheckListController@showSecondaryCheckboxes'); //показать main and secondary чекбоксы

//
Route::post('/detailSecondaryFetch', 'DetailCheckListController@checkSecondary'); //Отправить чекбоксы дополнительные
Route::post('/detailMainFetch', 'DetailCheckListController@checkMain'); //Отправить чекбоксы основные
Route::post('/detailCreate', 'DetailCheckListController@store'); //Сохранить в базу детальный лист 
