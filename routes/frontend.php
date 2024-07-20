<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\NewsDetailController;

Route::get('news/{news}',NewsDetailController::class)->name('news.show');
Route::any('/{page}', PageController::class)->where('page', '.*');
