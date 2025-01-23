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

    

    public function showProductByBrand($brandName)
    {
        $brands = Brand::all();

        // Brand name နဲ့ Brand ကို ရှာပါ products က Brand Model မှာ ထည့်ထားတဲ့ function ထည့်ထားတာ
        $brand = Brand::where('name', $brandName)->with('products')->first();

        if ($brand) {
        // Brand နဲ့ ချိတ်ထားတဲ့ Product တွေကို ရှာပါ
            $products = Product::where('brand_id', $brand->id)->get();
        } else {
         $products = collect(); // Brand မရှိရင် empty collection ပြန်ပေးပါ
        }

        return view('front.brand-product',compact('brands','products','brandName'));
    }
    


    
}
