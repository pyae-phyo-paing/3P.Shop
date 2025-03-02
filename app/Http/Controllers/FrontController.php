<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function brandlist($brandId)
    {
        // Brand ကို ပထမစစ်မယ်
        $brand = Brand::with('products')->find($brandId);

        if (!$brand) {
            return redirect()->back()->with('error', 'Brand not found.');
        }

        $brands = Brand::all();
        $brandName = $brand->name;
        
        // Products ကို paginate လုပ်မယ်
        $products = $brand->products()->paginate(12); // 6 products per page

        return view('front.brand-product', compact('brands', 'brand', 'brandName', 'products'));
    }

    public function shopHome()
    {
        $products = Product::where('discount','>=','10')->get();
         // Discount ကြီးစဥ် (Descending) နဲ့ ငယ်စဥ် (Ascending) ကို ပြုလုပ်ခြင်း
        $sortedProducts = $products->sortByDesc('discount')->values()->merge($products->sortBy('discount')->values());
        return view('front.shop-home',compact('sortedProducts'));
    }


    public function shops()
    {
        $products = Product::orderBy('id')->paginate(15);
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
        $related_products = Product::where('category_id',$product->category_id)
                        ->where('id','!=', $product->id)
                        ->orderBy('created_at','desc')
                        ->take(8)
                        ->get();
        
        if($related_products->isEmpty()){
            $related_products = null;
        }
        return view('front.shop-single',compact('product','related_products'));
    }

    

    public function showProductByBrand($brandName)
    {
        $brands = Brand::all();

        // Brand name နဲ့ Brand ကို ရှာပါ products က Brand Model မှာ ထည့်ထားတဲ့ function ထည့်ထားတာ
        $brand = Brand::where('name', $brandName)->with('products')->first();

        if ($brand) {
        // Brand နဲ့ ချိတ်ထားတဲ့ Product တွေကို ရှာပါ
            $products = Product::where('brand_id', $brand->id)->paginate(12);
        } else {
         $products = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 12); // Brand မရှိရင် empty collection ပြန်ပေးပါ
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

    public function checkStock(Request $request)
    {
        $cartItems = $request->cart; // Frontend မှာ Ajax နဲ့ ပို့လာတဲ့ Cart Data

        foreach ($cartItems as $item) {
            $product = Product::find($item['id']);

            if (!$product) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'One of the products in your cart is no longer available.'
                ]);
            }

            if ($item['qty'] > $product->instock) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'The quantity of ' . $product->name . ' exceeds available stock!',
                    'product_name' => $product->name //Product Name ကို response ထည့်မယ် 
                ]);
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Stock is available'
        ]);
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
        }else{
            $file_name = null;
        }

        $items = json_decode($request->orderItems, true);

        foreach($items as $item){
            $product = Product::find($item['id']);
            if($product){
                $product->instock -= $item['qty']; //product ထဲမှာ instock ကို လျော့ 
                $product->save();
            }
        }

        $dataArray = json_decode($request->orderItems);

        $voucher_no = uniqid();

        $transation_date = Carbon::now('Asia/Yangon')->format('Y-m-d H:i:s'); // Myanmar Local Time ကို Format ပြောင်းပြီး သိမ်းမယ်

        $orderItems = []; // Order အားလုံးကို သိမ်းဖို့ array
        //$data နဲ့ ယူတာတေွက localStorage ထဲမှာ သိမ်းထားတဲ့ data
        // $request နဲ့ယူတာတွေသည် input data တွေ
        foreach ($dataArray as $data)
        {

            $payment = new Payment();//payment model ကို အသစ် ထည့်ဖို့ new လုပ်လိုက်တာ //အပေါ်မှာ model ကို use လုပ်ပေးရတယ်

            $payment->voucher_no = $voucher_no;
            $payment->payment_method = $request->payment_method;
            $payment->qty = $data->qty;
            $payment->discount = $data->discount;
            $payment->price = $data->price;
            $payment->total = (int) ceil($data->qty*($data->price - ($data->price*($data->discount/100))));
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

            $orderItems[] = $payment;

        }

        // **Email ပို့မယ်**
        Mail::to(Auth::user()->email)->send(new OrderConfirmationMail($orderItems));

        return 'Your Orders Successful';
    }

    
}
