<?php

use App\Http\Resources\PostResource;
use App\Models\Post;
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

Route::group(['prefix' => 'posts/'], function() {
    Route::get('create', 'PostController@index')->name('get.post.create');
    Route::post('create', 'PostController@store')->name('store.post');
    Route::get('{postId}', 'PostController@show')->name('get.post.update');
    Route::put('update', 'PostController@update')->name('update.post');
});

Route::get('api/posts', 'PostController@indexApi')->name('get.api.posts');
Route::get('api/posts/{categoryId}', 'PostController@indexApi')->name('get.api.posts');

Route::get('categories/create', 'CategoryController@index')->name('get.category.create');
Route::post('categories/create', 'CategoryController@store')->name('store.category');
