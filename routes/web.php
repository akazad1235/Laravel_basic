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


//category crud are here
Route::get('all/category', 'boloController@AllCategory')->name('all.category');//all category rotue
Route::get('add/category', 'boloController@AddCategory')->name('add.category'); //add page category route
Route::post('store/category', 'boloController@StoreCategory')->name('store.category'); //store category route
Route::get('view/category/{id}', 'boloController@ViewCategory');//View Category by id
Route::get('delete/category/{id}', 'boloController@DeleteCategory');//Delete Category by id
Route::get('edit/category/{id}', 'boloController@EditCategory');//Edit Category by id
Route::post('update/category/{id}', 'boloController@UpdateCategory');//Update Category by id

/*
|--------------------------------------------------------------------------------
|post crud are here
|--------------------------------------------------------------------------------
|
|
*/
Route::get('write/post', 'postController@writePost')->name('write.post');   
Route::post('store/post', 'postController@StorePost')->name('store.post'); //insert post
Route::get('all/post', 'postController@AllPost')->name('all.post'); //select all post
Route::get('view/post/{id}', 'postController@ViewPost'); //view single post by id
Route::get('delete/post/{id}', 'postController@DeltePost'); //delete post by id
Route::get('edit/post/{id}', 'postController@EditPost'); //Edit post by id
Route::post('update/post/{id}', 'postController@UpdatePost'); //Edit post by id



