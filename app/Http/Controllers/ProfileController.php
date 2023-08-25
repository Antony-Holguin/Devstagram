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
            'email' => ['required', 'email']
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
            $user->save();
        }else{
            dd("nooo");
        }
        

         return redirect()->route('posts.index', $user->username);
        
    
    }

}
