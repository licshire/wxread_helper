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

Route::any('bookDetail', 'BookController@detail');
Route::any('bookSubscribe', 'BookController@subscribe');
Route::any('searchSubmit', 'ReadSearchController@submit');
Route::any('searchHint', 'ReadSearchController@hint');
Route::any('searchList', 'SearchListController@searchList');
Route::any('userInfo', 'UserController@index');
//后期有个用户profile页面, 可以登出..

