<?php

use App\Category;
use App\Http\Controllers\Blog\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/','WelcomeController@index')->name('welcome');
Route::get('blog/posts/{post}',[PostsController::class,'show'])->name('showPost');
Route::get('blog/categories/{category}',[PostsController::class,'category'])->name('showCategory');
Route::get('blog/tags/{tag}',[PostsController::class,'tags'])->name('showTag');

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoriesController');
    Route::resource('posts', 'PostController');
    Route::resource('tags', 'TagsController');
    Route::get('trached-post','PostController@trach')->name('trached-post.index');
    Route::put('restore/{post}','PostController@restore')->name('restore');
});
 
  Route::middleware(['auth','admin'])->group(function(){
    Route::get('users/profile','UserController@EditProfile')->name('Users.ProfilEdit');
    Route::Put('users/profile','UserController@UpdateProfil')->name('Users.ProfilUpdate');

    Route::get('users','UserController@index')->name('users.index');
    Route::Post('users/{user}/makeAdmin','UserController@makeAdmin')->name('user.make-admin');
  });



