<?php

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

Route::get('/', function () {
    return view('main');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tag/create', [App\Http\Controllers\TagController::class, 'create'])->name('tag.create');

Route::post('/tag/store', [App\Http\Controllers\TagController::class, 'store'])->name('tag.store');

Route::get('/article/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('article.create');

Route::post('/article/store', [App\Http\Controllers\ArticleController::class, 'store'])->name('article.store');

Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
