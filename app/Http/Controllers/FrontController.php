<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
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
        $menbrands = Product::whereHas('category', function ($query) {
            $query->where('name', 'Men'); 
        })
        ->with('brand') 
        ->get()
        ->pluck('brand.name')
        ->unique();

        $womenbrands = Product::whereHas('category', function ($query){
            $query->where('name', 'Women');
        })
        ->with('brand')
        ->get()
        ->pluck('brand.name')
        ->unique();

        $kidbrands = Product::whereHas('category', function ($query){
            $query->where('name', 'Kids');
        })
        ->with('brand')
        ->get()
        ->pluck('brand.name')
        ->unique();

        return view('front.shop',compact('products','menbrands','womenbrands','kidbrands'));
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
        $product= Product::find($id);

        return view('front.shop-single',compact('product'));
    }
}
