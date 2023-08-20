<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' =>'required', 
        ]);

        //Autenticar usuario
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('message', 'Incorrect credentials');
        }

        return redirect()->route('posts.index', auth()->user()->username); //Poner el auth sino va a dar error
        
    }
}