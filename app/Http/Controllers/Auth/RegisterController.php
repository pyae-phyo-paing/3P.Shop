<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
{
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'phone' => ['required','max:11'],
        'profile' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'address' => ['required']
    ]);
}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $request = request();
        if ($request->hasFile('profile')) {
            $file = $request->file('profile'); 
            $file_name = time() . '.' . $file->extension();
            $file->move(public_path('images/user/'), $file_name);
            $profile = "/images/user/" . $file_name;
        } else {
            $profile = null;
        }

        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'profile' => $profile,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'role' => 'User',
        ]);

    }
}
