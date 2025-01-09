<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function shopHome()
    {
        return view('front.shop-home');
    }

    public function shops()
    {
        $products = Product::orderBy('id')->paginate(6);
        return view('front.shop',compact('products'));
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
