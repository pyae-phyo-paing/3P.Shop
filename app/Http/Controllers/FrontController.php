<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function paymentInfo()
    {
        if(Auth::check())
        {
            return view('front.payment-info');
        }else{
            return redirect('/login');
        }
        
    }

    public function paymentSubmit(Request $request)
    {
        // dd($request);
        $request->validate([
            'payment_method' => 'required',
            'card_number' => 'nullable|required_if:payment_method,visa',
            'card_holder_name' => 'nullable|required_if:payment_method,visa',
            'mobile_provider' => 'nullable|required_if:payment_method,mobile banking',
            'payment_slip' => 'nullable|required_if:payment_method,mobile banking|mimes:jpg,png,jpeg|max:2048',
        ]);

        if($request->hasFile('payment_slip')){
            $file_name = time().'.'.$request->payment_slip->extension();
            $upload = $request->payment_slip->move(public_path('images/payment_slips/'),$file_name);
        }


        $dataArray = json_decode($request->orderItems);

        $voucher_no = "Voucher-".uniqid();

        $transation_date = Carbon::now('Asia/Yangon')->format('Y-m-d H:i:s'); // Myanmar Local Time ကို Format ပြောင်းပြီး သိမ်းမယ်

        //$data နဲ့ ယူတာတေွက localStorage ထဲမှာ သိမ်းထားတဲ့ data
        // $request နဲ့ယူတာတွေသည် input data တွေ
        foreach ($dataArray as $data)
        {

            $payment = new Payment();//payment model ကို အသစ် ထည့်ဖို့ new လုပ်လိုက်တာ //အပေါ်မှာ model ကို use လုပ်ပေးရတယ်

            $payment->voucher_no = $voucher_no;
            $payment->payment_method = $request->payment_method;
            $payment->qty = $data->qty;
            $payment->total = $data->qty*($data->price - ($data->price*($data->discount/100)));
            $payment->status = 'Checking';
            $payment->product_size = $data->size;
            $payment->category = $data->category;
            $payment->brand = $data->brand;
            $payment->card_number = $request->card_number;
            $payment->card_holder_name = $request->card_holder_name;
            $payment->mobile_provider = $request->mobile_provider;
            $payment->payment_slip = "/images/payment_slips/".$file_name;
            $payment->address = $request->address;
            $payment->note = $request->note;
            $payment->transation_date = $transation_date;
            $payment->user_id = Auth::id();
            $payment->product_id = $data->id;
            $payment->save();
        }

        return 'Your Orders Successful';
    }

    
}
