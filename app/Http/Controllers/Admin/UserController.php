<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(10);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        $file_name = time().'.'.$request->profile->extension();
        $upload = $request->profile->move(public_path('images/user/'),$file_name);
        if($upload){
            $user->profile = "/images/user/".$file_name;
        }

        $user->save();
        return redirect()->route('backend.user.index');
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
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        if($request->hasFile('profile')){
            $file_name = time().'.'.$request->profile->extension();
            $upload = $request->profile->move(public_path('images/user/'),$file_name);
            if($upload){
                $user->profile = "/images/user/".$file_name;
            }
        }else{
            $user->profile = $request->old_profile;
        }

        $user->save();
        return redirect()->route('backend.user.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
