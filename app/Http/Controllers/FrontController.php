<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function brandlist($brandId)
    {
        $brands = Brand::all();
        $brand = Brand::findOrFail($brandId);
        $brandName = $brand->name;
        $products = $brand->products;
        return view('front.brand-product',compact('brands','brand','brandName','products'));
    }

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

    

    public function getProductsByCategoryAndBrand($categoryName, $brandname) {

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

        // Category နဲ့ Brand အလိုက် Product တွေကို ထုတ်
        $category = Category::where('name', $categoryName)->firstOrFail();
        $brand = Brand::where('name', $brandname)->firstOrFail();
    
        $products = Product::where('category_id', $category->id)
                           ->where('brand_id', $brand->id)
                           ->paginate(9);

        return view('front.shop-by-categoryandbrand',compact('category','brand','products','menbrands','womenbrands','kidbrands','brandname'));
    }

    public function getProductsByCategory($categoryName){
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

        // အဲ့ဒီ Category နဲ့ သက်ဆိုင်တဲ့ Products တွေကို ရှာ
        $products = Product::whereHas('category', function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })->paginate(9); // 10 items per page

        return view('front.shop-by-category',compact('products','menbrands','womenbrands','kidbrands'));

    }

    public function buyingcart()
    {
        

       return view('front.cart');
    }

    
}
