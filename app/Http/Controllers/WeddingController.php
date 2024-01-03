<?php

namespace App\Http\Controllers;
use App\Models\Home;
use Illuminate\Http\Request;

class WeddingController extends Controller
{
    public function weddingCakesCategory()
    {
        return view('FrontEnd.weddingCakesCategory'); 
    }
    public function weddingCakes()
    {
        return view('FrontEnd.weddingCakes'); 
    }
    public function birthdayParty()
    {
        $datalist = Home::getCategoryData();   // Fetch data from the "category" table for cart-body
        return view('FrontEnd.birthdayParty', compact('datalist')); 
    }
    public function voucherRedemption()
    {
        return view('FrontEnd.voucherRedemption'); 
    }
    public function aboutUs()
    {
        return view('FrontEnd.aboutUs'); 
    }
    public function contactUs()
    {
        return view('FrontEnd.contactUs'); 
    }
    public function myWishlist()
    {
        return view('FrontEnd.myWishlist'); 
    }
}
