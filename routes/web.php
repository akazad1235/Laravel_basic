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
    return view('pages/index');
});

Route::get('/about', 'HelloController@About')->name('about');
Route::get('/contact', 'HelloController@Contact')->name('contact');

Route::get('write/post', 'boloController@writePost')->name('write.post');

//category crud are here
Route::get('all/category', 'boloController@AllCategory')->name('all.category');//all category rotue
Route::get('add/category', 'boloController@AddCategory')->name('add.category'); //add page category route
Route::post('store/category', 'boloController@StoreCategory')->name('store.category'); //store category route



