<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(User $user){
        return view('profile.index', $user);
    }

    public function store(Request $request){

        $request->request->add(['username'=> Str::slug($request->username)]);
        $this->validate($request, [
            'username' => ['required', Rule::unique('users','username')->ignore(auth()->user()), 'max:30', 'min:3','not_in:puta,zorra,perra,edit-profile'],
            'email' => ['required', 'email','max:60', Rule::unique('users', 'email')->ignore(auth()->user())],
        ]);

        

        if($request->image){
            $image = $request->file('image');
            $imageName = Str::uuid().".".$image->extension();

            //Server image
            $serverImage = Image::make($image);
            $serverImage->fit(1000,1000);

            $imagePath = public_path('profiles').'/'.$imageName;
            $serverImage->save($imagePath);


            $user = User::find(auth()->user()->id);
            $user->username = $request->username;
            $user->image = $imageName ?? auth()->user()->image ?? '';
            $user->email = $request->email;
            $user->save();
        }else{
            $user = User::find(auth()->user()->id);
            $user->username = $request->username;
            $user->email = $request->email;
            $user->save();
        }
        

         return redirect()->route('posts.index', $user->username);
        
    
    }

}
