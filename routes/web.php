<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);

Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);

Route::get('articles/add', [ArticleController::class, 'add']);
Route::post('articles/add', [ArticleController::class, 'create']);

Route::get('/comments/delete/{id}',[CommentController::class, 'delete']);
Route::post('/comments/add',[CommentController::class, 'create']);


Route::get('/',[ArticleController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
