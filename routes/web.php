<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;

Route::redirect('/', '/blogs');

Route::get('/blogs', [BlogsController::class,'index'])->name('blogList');

Route::post('/blogs/create',[BlogsController::class,'create'])->name('blogCreate');
Route::get('/blogs/delete/{id}',[BlogsController::class,'delete'])->name('blogDelete');
