<?php

use App\Models\Faq;
use App\Models\User;
use App\Models\News;

use App\Models\State;
use App\Models\Testimonial;
use App\Models\Video;

use App\Models\Manufacturer;
use Topdot\Menu\Models\Menu;
use Topdot\Menu\Models\Menuitem;
use Topdot\Slider\Models\Slider;

function cleanString($string)
{
    $res = preg_replace("/[^a-zA-Z0-9]/", "", $string);
    return $res;
}

function states($columns = ['id','code'])
{
     return State::select($columns)->get();
}

function users($columns = ['id','name','last_name'], $except=[1])
{
    return User::query()->select($columns)->whereNotIn('id',$except)->get();
}

function isActiveUrl($url,$activeClass ='active' )
{
    if ( request()->path() == $url ){
        return 'active';
    }

    return null;
}

function getMenu($name)
{
    if ( !class_exists(Menu::class) ){
        return collect();
    }

    return Menu::getMenuByName($name);
}

function getHomepageTestimonials()
{
    return Testimonial::query()->limit(5)->orderBy('id','desc')->get();
}

function getHomepageVideos()
{
    return Video::query()->limit(6)->orderBy('id','desc')->get();
}

function getNews()
{
    return News::query()->where('is_featured',1)->where('is_active',1)->get();
}

function getAllNews()
{
    return News::query()->where('is_active',1)->limit(8)->orderBy('id','desc')->get();
}

function getTopNews()
{
    return News::query()->where('is_active',1)->limit(3)->orderBy('id','desc')->get();
}

function getSubMenu($id)
{
    return Menuitem::where('parent_id',$id)->where('is_active',1)->get();
}

function getSlider()
{
    return Slider::where('is_active',1)->get();
}