<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\HomeAboutSection;
class PagesController extends Controller
{
    public function index(){
        $logo = Logo::where('status',1)->first();
        $sliders = Slider::where('status', 1)->orderBy('priority', 'asc')->get();
        $about = HomeAboutSection::where('status',1)->get();
    	return view('frontEnd.pages.home', compact('logo', 'sliders','about'));
    }
    public function about(){
        $logo = Logo::where('status',1)->first();
    	return view('frontEnd.pages.about', compact('logo'));

    }
    public function services(){
        $logo = Logo::where('status',1)->first();
    	return view('frontEnd.pages.services');
    }
    public function blog(){
        $logo = Logo::where('status',1)->first();
    	return view('frontEnd.pages.blog', compact('logo'));
    }
    public function contact(){
        $logo = Logo::where('status',1)->first();
    	return view('frontEnd.pages.contact', compact('logo'));
    }
}
