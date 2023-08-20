@extends('layouts.app')

@section('title')
    Perfil: {{$user->username}}
@endsection()

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex md:flex-row">
                <div class="w-8/12 lg:w-6/12 px-5 ">
                    <img  src="{{asset('img/usuario.svg')}}" alt="">
                </div>

                <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                    <p class="text-gray-700 text-2xl">{{$user->username}}</p>
                    <p class="font-bold">
                        0
                        <span class="font-normal">Followers</span>
                    </p>

                    <p class="font-bold">
                        0
                        <span class="font-normal">Following</span>
                    </p>

                    <p class="font-bold">
                        0
                        <span class="font-normal">Posts</span>
                    </p>
                </div>
        </div>
        
    </div>
@endsection()