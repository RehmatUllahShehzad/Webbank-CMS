<?php

use Topdot\Cms\Facades\CmsRoutes;
use Topdot\Core\Facades\CoreRoutes;
use Topdot\Menu\Facades\MenuRoutes;
use Topdot\Slider\Facades\SliderRoutes;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CarrierController;
use App\Http\Controllers\Admin\FormController;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
Route::resource('forms',FormController::class)->middleware('auth');

Route::middleware(['permission.check'])->group(function(){

    CmsRoutes::register();
    CoreRoutes::register();
    MenuRoutes::register();
    SliderRoutes::register();

    Route::resource('news',NewsController::class);
    // Route::resource('carrier',CarrierController::class);

});


