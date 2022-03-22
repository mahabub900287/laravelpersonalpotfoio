<?php

namespace App\Http\Controllers\Forntend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Downloadarea;
use App\Models\Service;
use App\Models\Skill;

class FrontendBannerController extends Controller
{
    public function index(){
        $banner=Banner::first();
        $download=Downloadarea::first();
        $skills=Skill::all();
        $services=Service::all();
       return view('fortend.index',compact('banner','download','skills','services'));
    }
}
