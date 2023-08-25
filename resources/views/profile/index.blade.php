@extends('layouts.app')

@section('title')
    Profile: {{auth()->user()->username}}
@endsection()

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{route('profile.store')}}" enctype="multipart/form-data" method="POST" class="mt-10 md:mt-0">
                    @csrf
    
                    <div>
                        <label class="mb-2 block uppercase text-gray-500 font-bold " for="">Username:</label>
                        <input class="border p-3 w-full rounded-lg @error('username') border-red-600 @enderror"" placeholder="Your username here" name="username" type="text" autocomplete="off" value="{{auth()->user()->username}}">
                        @error('username')
                            <p class="p-1 text-white bg-red-600 rounded-lg text-center">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block uppercase text-gray-500 font-bold " for="">Email:</label>
                        <input class="border p-3 w-full rounded-lg @error('email') border-red-600 @enderror"" placeholder="Your username here" name="email" type="email" autocomplete="off" value="{{auth()->user()->email}}">
                        @error('email')
                            <p class="p-1 text-white bg-red-600 rounded-lg text-center">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <input class="border p-3 w-full rounded-lg" accept=".jpg, .jpeg, .png, .gif" 
                         id="image" value="" name="image" type="file">
                        
                    </div>
    
                    <div>
                        <input class="mt-5 border rounded-lg bg-sky-600 text-white w-full p-3 uppercase cursor-pointer" 
                        type="submit" value="Update">
                        
                    </div>
            </form>
        </div>

        <div class="bg-blue-500 md:w-1/2 max-w-lg max-h-sm">
            <img class="h-full w-full" src="{{asset('profiles/'.auth()->user()->image)}}" alt="{{auth()->user()->image}}">
        </div>
    </div>
@endsection()