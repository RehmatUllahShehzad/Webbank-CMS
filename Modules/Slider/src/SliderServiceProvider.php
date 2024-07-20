<?php

namespace Topdot\Slider;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Topdot\Slider\Http\Livewire\TableComponent;

class SliderServiceProvider extends ServiceProvider
{
    public $routeFilePath = '/routes';
    public $publishedViewPath = '/views/admin/slider';
    public $configPath = '/config/slider.php';

    public function boot()
    {
        $this->setUpRoutes();
        $this->setUpConfig();
        $this->setUpViews();
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        if ( $this->app->runningInConsole() ){
            $this->publishAssets();
        }

        Livewire::component('slider::table-component', TableComponent::class);

    }

    private function setUpRoutes()
    {
        Route::mixin(new SliderRoutes);

        $this->app->bind('sliderRoutes',function(){
            return new SliderRoutes;
        });
    }

    private function setUpViews()
    {
        $this->loadViewsFrom([
            resource_path($this->publishedViewPath),
            __DIR__.('/resources/views')
        ],'slider');
    }

    private function setUpConfig()
    {
        $this->mergeConfigFrom( __DIR__.$this->configPath, 'slider');
    }

    private function publishAssets()
    {
        $this->publishes([
            __DIR__.'/resources/views' => resource_path($this->publishedViewPath),
        ],'views');

        $this->publishes([
            __DIR__.'/routes' => base_path($this->routeFilePath),
        ],'routes');

        $this->publishes([
            __DIR__.$this->configPath => base_path( $this->configPath ),
        ],'config');

        $this->publishes([
            __DIR__.'/database/migrations' => database_path( 'migrations' ),
        ],'migrations');
    }
}
