<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Pengelola;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function redirectTo(){
        if(Auth::user()->role == 'admin'){
            $this->redirectTo = route('dashboard.admin');
            return $this->redirectTo;
        }

        if(Auth::user()->role == 'Pengelola Lapangan'){
            $this->redirectTo = route('dashboard.pengelola');
            return $this->redirectTo;
        }

        if(Auth::user()->role == 'Customer'){
            $this->redirectTo = route('dashboard.customer');
            return $this->redirectTo;
        }

    }

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
            'username' => ['required', 'string', 'max:255'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'no_telpon' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' =>  ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    $user =    User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        if($user->role == 'Pengelola Lapangan'){
            Pengelola::create([
                'user_id' => $user->id,
                'nama_lengkap' => $data['nama_lengkap'],
                'no_telpon' => $data['no_telpon']
            ]);

        }

        if($user->role == 'Customer'){
              Customer::create([
                'user_id' => $user->id,
                'nama_lengkap' => $data['nama_lengkap'],
                'no_telpon' => $data['no_telpon']
            ]);

        }

        return $user;
    }
}
