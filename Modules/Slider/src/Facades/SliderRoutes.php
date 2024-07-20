<?php

namespace Topdot\Slider\Facades;

use Illuminate\Support\Facades\Facade;

class SliderRoutes extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sliderRoutes';
    }

    public static function register($options = [])
    {
        app()->make('router')->sliderRoutes($options);
    }
}
