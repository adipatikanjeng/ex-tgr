<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Testimony;
use App\Models\Event;
use App\Models\Activity\Csr;
use \Webarq\Site\Models\Setting;
use App\Models\Page;

class HomeController extends Controller
{
    public function getIndex()
    {
        $slider = new Slider();
        $slider = $slider->where('is_display', 'Y')->take(4)->get();

        $popularSeries = new Product();
        $popularSeries = $popularSeries->where('is_sale', 'Y')->where('is_popular', 'Y')->where('is_active', 'Y')->take(3)->get();

        $testimonies = new Testimony();
        $testimonies = $testimonies->where('is_active', 'Y')->orderBy('order')->take(4)->get();

        $events = new Event();
        $events = $events->where('start_date', '<=', date('Y-m-d'))->where('finish_date', '>=', date('Y-m-d'))->orderBy('publish_date', 'desc')->get();

        $csrActivities = new Csr;
        $csrActivities = $csrActivities->orderBy('order', 'ASC')->get();

        $content['youtube'] = Setting::ofCodeType('youtube', 'content_home')->value;
        $page = Page::whereCode('our-management')->first();
        $content['our-management']['content'] = \Site::lang($page, 'content');
        $content['our-management']['title'] = \Site::lang($page, 'title');

        return view('home', compact('slider', 'popularSeries', 'testimonies', 'events', 'csrActivities', 'content'));
    }
}
