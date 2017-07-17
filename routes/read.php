<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::any('searchHint', 'ReadSearchController@hint');

//api接口路由
Route::any('searchSubmit', 'ReadSearchController@submit');
Route::any('resultList', 'SearchListController@resultList');
Route::any('bookSubscribe', 'BookController@subscribe');
Route::any('bookDetail', 'BookController@detail');
Route::any('userInfo', 'UserController@userInfo');

//页面路由
Route::any('search', 'ReadSearchController@search');
Route::any('searchList', 'ReadSearchController@searchList');
Route::any('userIndex', 'UserController@index');
Route::any('book', 'BookController@book');
