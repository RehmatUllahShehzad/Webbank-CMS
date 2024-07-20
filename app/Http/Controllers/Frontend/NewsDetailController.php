<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Topdot\Cms\Models\Page;


class NewsDetailController extends Controller
{
    //
    public function __invoke($slug)
    {
        $page = Page::where('slug', 'newsroom-detail')->firstOrFail();
        $newsdetail = News::where('slug', $slug)->firstOrFail();
        $page->setPlaceholder('[[news-room-detail-Placeholder]]', view('frontend.placeholders.news-room-detail', ['newsdata' => $newsdetail])->render());

        return view('frontend.pages.index',compact('page'));
    }
}
