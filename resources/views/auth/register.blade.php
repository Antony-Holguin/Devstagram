@extends('layouts.app')

@section('title')
    Register in DevStagram
@endsection()

@section('content')
    <div class="md:flex md:justify-center md:gap-6  md:items-center"> <!--En tamano mediano se aplicara flexbox-->
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/login2.png')}}" alt="Register">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{route('register.store')}}" novalidate method="POST">
                @csrf
                <div>
                    <label class="mb-2 block uppercase text-gray-500 font-bold " for="">Name:</label>
                    <input class="border p-3 w-full rounded-lg @error('name') border-red-600 @enderror" placeholder="Your name here" name="name" type="text" autocomplete="off" value="{{old('name')}}">
                    @error('name')
                        <p class="p-1 text-white bg-red-600 rounded-lg text-center">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 block uppercase text-gray-500 font-bold " for="">Lastname:</label>
                    <input class="border p-3 w-full rounded-lg" placeholder="Your lastname here" name="lastname" type="text" autocomplete="off" value="{{old('lastname')}}">
                    @error('lastname')
                        <p class="p-1 text-white bg-red-600 rounded-lg text-center">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 block uppercase text-gray-500 font-bold " for="">Username:</label>
                    <input class="border p-3 w-full rounded-lg" placeholder="Your username here" name="username" type="text" autocomplete="off" value="{{old('username')}}">
                    @error('username')
                        <p class="p-1 text-white bg-red-600 rounded-lg text-center">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 block uppercase text-gray-500 font-bold " for="">Email:</label>
                    <input class="border p-3 w-full rounded-lg" placeholder="Your email here" name="email" type="email" autocomplete="off" value="{{old('email')}}">
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
                    <label class="mb-2 block uppercase text-gray-500 font-bold " for="">Password confirmation:</label>
                    <input class="border p-3 w-full rounded-lg"  name="password_confirmation" type="password" autocomplete="off">
                    @error('password_confirmation')
                    <p class="p-1 text-white bg-red-600 rounded-lg text-center">{{$message}}</p>
                    @enderror
                </div>

                {{-- <div>
                    <input class="mt-5 border rounded-lg"  name="remember" type="checkbox" autocomplete="off">
                    <label class="mt-5  text-gray-500 font-bold " for="">Remember</label>

                </div> --}}

                <div>
                    <input class="mt-5 border rounded-lg bg-sky-600 text-white w-full p-3 uppercase cursor-pointer" type="submit" value="Create account">

                </div>



            </form>
        </div>
    </div>
@endsection()
