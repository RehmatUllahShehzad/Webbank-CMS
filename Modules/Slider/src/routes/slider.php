<?php

use Illuminate\Support\Facades\Route;
use Topdot\Slider\Http\Controllers\SliderController;

Route::resource('slider', SliderController::class);
