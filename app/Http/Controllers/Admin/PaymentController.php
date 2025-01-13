<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\PaymentUpdateRequest;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::orderBy('id')->get();
        return view('admin.payment.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        $payment = Payment::create($request->all());
        $file_name = time().'.'.$request->logo->extension();
        $upload = $request->logo->move(public_path('images/payment/'),$file_name);
        if($upload){
            $payment->logo = "/images/payment/".$file_name;
        }

        $payment->save();
        return redirect()->route('backend.payment.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::find($id);
        return view('admin.payment.edit',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentUpdateRequest $request, string $id)
    {
        $payment = Payment::find($id);
        $payment->update($request->all());
        
        if($request->hasFile('logo')){
            $file_name = time().'.'.$request->logo->extension();
            $upload = $request->logo->move(public_path('images/payment/'),$file_name);
            if($upload){
                $payment->logo = "/images/payment/".$file_name;
            }
        }else{
            $payment->logo = $request->old_logo;
        }

        $payment->save();
        return redirect()->route('backend.payment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->route('backend.payment.index');
    }
}
