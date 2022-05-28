<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:8|min:8|unique:users',
            'email' => 'required|string|email|max:255',
            'image' => 'required|file|max:1024',
            'password' => 'required|string|confirmed',
            'level' => 'required|string'
        ]);
         $image_ext = $image->getClientOriginalExtension();
        //changing the name of the file
        $new_image_name = rand(123456,999999).".".$image_ext;
        $destination_path = public_path('/images');
        $image->move($destination_path,$new_image_name);

        //saving file in database
        $user->image_name = $new_image_name;
        $user->image_size = $image_size;
        $user->save();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'nik' => $data['nik'],
            'email' => $data['email'],
            'image' => $data['image'],
            'password' => Hash::make($data['password']),
            'level' => $data['level']
        ]);
    }
}

