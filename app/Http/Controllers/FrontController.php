<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function shopHome()
    {
        return view('front.shop-home');
    }

    public function shops()
    {
        return view('front.shop');
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function shopSingle($id)
    {
        return view('front.shop-single');
    }
}
