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

Route::get('/article/{article}', [App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');

Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');

Route::get('/calculator/materials', [App\Http\Controllers\CalculatorMaterialsController::class,'index'])->name('calculator.materials.index');

Route::post('/calculator/materials', [App\Http\Controllers\CalculatorMaterialsController::class,'calculate'])->name('calculator.materials.calculate');

Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

Route::get('/calculator/estimate', [App\Http\Controllers\CalculatorEstimateController::class,'index'])->name('calculator.estimate.index');

Route::post('/calculator/estimate', [App\Http\Controllers\CalculatorEstimateController::class,'calculate'])->name('calculator.estimate.calculate');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');

    Route::get('/articles', [App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('admin.articles.index');
    Route::get('/article/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'show'])->name('admin.article.show');
    Route::get('/articles/create', [App\Http\Controllers\Admin\ArticleController::class, 'create'])->name('admin.article.create');
    Route::post('/articles/store', [App\Http\Controllers\Admin\ArticleController::class, 'store'])->name('admin.article.store');
    Route::get('/articles/{article}/edit', [App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('admin.article.edit');
    Route::patch('/articles/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'update'])->name('admin.article.update');
    Route::delete('/articles/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'delete'])->name('admin.article.delete');

    Route::get('/tag', [App\Http\Controllers\Admin\TagController::class, 'index'])->name('admin.tag.index');
    Route::get('/tag/create', [App\Http\Controllers\Admin\TagController::class, 'create'])->name('admin.tag.create');
    Route::post('/tag/store', [App\Http\Controllers\Admin\TagController::class, 'store'])->name('admin.tag.store');
    Route::get('/tag/{tag}/edit', [App\Http\Controllers\Admin\TagController::class, 'edit'])->name('admin.tag.edit');
    Route::patch('/tag/{tag}', [App\Http\Controllers\Admin\TagController::class, 'update'])->name('admin.tag.update');
    Route::delete('/tag/{tag}', [App\Http\Controllers\Admin\TagController::class, 'delete'])->name('admin.tag.delete');

    Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create');
    Route::post('/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
    Route::delete('/user/{user}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user.delete');
});
