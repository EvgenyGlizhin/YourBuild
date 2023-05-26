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

Route::get('/article/{article}', [App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');

Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');

Route::get('/calculator/materials', [App\Http\Controllers\CalculatorMaterialsController::class,'index'])->name('calculator.materials.index');

Route::post('/calculator/materials', [App\Http\Controllers\CalculatorMaterialsController::class,'calculate'])->name('calculator.materials.calculate');

Route::post('/comment/store', [App\Http\Controllers\CommentController::class,'store'])->name('comment.store');

Route::get('/calculator/estimate', [App\Http\Controllers\CalculatorEstimateController::class,'index'])->name('calculator.estimate.index');

Route::post('/calculator/estimate', [App\Http\Controllers\CalculatorEstimateController::class,'calculate'])->name('calculator.estimate.calculate');

