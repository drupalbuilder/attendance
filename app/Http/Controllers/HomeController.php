<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $bannerlist = Home::getBannersData(); // Fetch data from the "banners" table for slider-body
        $datalist = Home::getCategoryData();   // Fetch data from the "category" table for cart-body

        return view('FrontEnd.home', compact('bannerlist', 'datalist'));
    }
}
