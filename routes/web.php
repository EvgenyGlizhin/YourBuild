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

Route::get('/tags', [App\Http\Controllers\TagController::class, 'create'])->name('tag.create');

Route::post('/tags', [App\Http\Controllers\TagController::class, 'store'])->name('tag.store');

Route::get('/article', [App\Http\Controllers\ArticleController::class, 'create'])->name('article.create');

Route::post('/article', [App\Http\Controllers\ArticleController::class, 'store'])->name('article.store');
