<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
class AuthManager extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function loginPost(Request $request) 
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)) {
            return redirect(route("home"));
        }
        
        return redirect(route("login"))->with("error", 'Invalid Email or Password');
    }

    public function register(Request $request) 
    {
        return view("auth.register");
    }

    public function registerPost(Request $request) 
    {
       $request ->validate([ 
        'name' => 'required', 
        'email'=> 'required|email|unique:users',
        'password'=> 'required|min:8',
       ]);

       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = $request->password;
       if($user->save()) {
            return redirect('login')->with("success", "Registration Successfull!");
       } 
            return redirect(route("register"))->with("error", "Registration Failed");
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        Session::flush();
        return redirect("login");
    }
    
}
