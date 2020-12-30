<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('dashboard.auth.login');
    }

    public function authenticate(Request $request){
        $login_data= ['email'=>$request->email, 'password'=>$request->password];

        if(Auth::attempt($login_data)){
            return view('dashboard.home');
        }
        else{
            return redirect()->back()->with("login_fail", "Login failed");
        }
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route('frontside.home');
    }

    public function register(){
        return view('dashboard.auth.register');
    }

    public function do_register(Request $request){
        $request->validate([
            "name"=> "required|string",
            "email"=> "required|email:rfc",
            "password"=> "required | confirmed",
        ]);

        User::create([
           'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'name'=> $request->name
        ]);

        return redirect()->route('login')->with("success_register","User created successfuly");
}
}
