<?php

use Illuminate\Support\Facades\Route;

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
/*
* Admin Routes
*/
Route::get('/admin', 'Admin\AdminController@index');


// articles

Route::get('/admin/articles','Admin\ArticleController@index')->name('article');

// add article
Route::get('/admin/articles/add', 'Admin\ArticleController@addArticle')->name('add_article');
Route::post('/admin/articles/add', 'Admin\ArticleController@addArticle')->name('add_article');


// edit article data
Route::get('/admin/article/edit/{id}', 'Admin\ArticleController@editArticle')->name('edit_article');
Route::post('/admin/article/edit/{id}', 'Admin\ArticleController@editArticle')->name('edit_article');

// delete article data
Route::post('/delete/delete_article','Admin\ArticleController@deleteArticle')->name('delete_article');
