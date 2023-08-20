@extends('layouts.app')

@section('title')
    Login
@endsection()

@section('content')
    <div class="md:flex md:justify-center md:gap-6  md:items-center"> <!--En tamano mediano se aplicara flexbox-->
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/login.jpg')}}" alt="login">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{route('login.store')}}" novalidate method="POST">
                @csrf

                <div>
                    <label class="mb-2 block uppercase text-gray-500 font-bold " for="">Email:</label>
                    <input class="border p-3 w-full rounded-lg" value="{{old('email')}}" placeholder="Your email here" name="email" type="email" autocomplete="off">
                    @error('email')
                        <p class="p-1 text-white bg-red-600 rounded-lg text-center">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 block uppercase text-gray-500 font-bold " for="">Password:</label>
                    <input class="border p-3 w-full rounded-lg"  name="password" type="password" autocomplete="off">
                    @error('password')
                    <p class="p-1 text-white bg-red-600 rounded-lg text-center">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    @if (session('message'))
                        <p class="mt-2 p-2 bg-red-600 rounded-lg text-white text-center">{{session('message')}}</p>
                    @endif
                </div>

               

                <div>
                    <input class="mt-5 border rounded-lg"  name="remember" type="checkbox" autocomplete="off">
                    <label class="mt-5  text-gray-500 font-bold " for="">Remember</label>
                    
                </div>

                <div>
                    <input class="mt-5 border rounded-lg bg-sky-600 text-white w-full p-3 uppercase cursor-pointer" type="submit" value="Log in">
                    
                </div>

               
                
            </form>
        </div>
    </div>
@endsection()