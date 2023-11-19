<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct(){

    }


    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){

        //Interceptar request
        $request->request->add(['username'=> Str::slug($request->username)]);

        $this->validate($request,
        [
            'name' => 'required|max:30',
            'lastname' => 'required|max:30',
            'username' => 'required|unique:users|max:30|min:3',
            'email' => 'required|unique:users|max:60|email',
            'password' => 'required|confirmed|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        

        return redirect()->route('login')->with('registerOk', 'Account created successfully');
    }
}
