<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!


Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user '. $name. 'with an id of' . $id;
});


|
*/

Route::get('/', 'PageController@index' );
Route::get('/cadastro', 'PageController@cadastro' );
Route::get('/login', 'PageController@login' );
Route::get('/create','PostsController@create');
Route::get('/dashboard','DashboardController@index');





Route::resource('/posts','PostsController');
Auth::routes();