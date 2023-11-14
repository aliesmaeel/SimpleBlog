<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;



Route::get('/',[PostController::class,'index'])->name('home');
Route::get('/categories/{category:slug}',[PostController::class,'postByCategory'])->name('post-by-category');
Route::get('/about-us',[SiteController::class,'index'])->name('about.index');
Route::get('/{post:slug}',[PostController::class,'show'])->name('post.view');

