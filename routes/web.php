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

Route::group(['prefix' => 'posts/', 'as' => 'post.'], function() {
    Route::get('create', 'PostController@index')->name('get.create');
    Route::post('create', 'PostController@store')->name('store');
    Route::get('{postId}', 'PostController@show')->name('get.update');
    Route::put('update', 'PostController@update')->name('update');
});

Route::group(['prefix' => 'api/', 'as' => 'api.'], function() {
    Route::get('posts', 'PostController@indexApi')->name('get.posts');
    Route::get('posts/{categoryId}', 'PostController@indexApi')->name('get.posts');
});

Route::group(['prefix' => 'categories/', 'as' => 'category.'], function() {
    Route::get('create', 'CategoryController@index')->name('get.create');
    Route::post('create', 'CategoryController@store')->name('store');
});