@extends('layouts.app')

@section('title')
    Perfil: {{$user->username}}
@endsection()

@section('content')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex md:flex-row">
                <div class="w-8/12 lg:w-6/12 px-5 ">
                    <img  src="{{asset('profiles/'.auth()->user()->image)}}" alt="">
                </div>

                <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">

                    <div class="flex gap-2 items-center">
                        <p class="text-gray-700 text-2xl">{{$user->username}}</p>

                        @auth
                            @if ($user->id === auth()->user()->id)
                                <a href="{{route('profile.index', $user)}}" class="cursor-pointer text-gray-900 hover:text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                            @else
                                
                            @endif
                        @endauth
                     </div>

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

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl font-black text-center">Posts</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post )
                @if ($post->count())
                <div>
                    <a href="{{route('posts.show', ['post' => $post, 'user' => $user])}}">
                        <img src="{{asset('uploads').'/'.$post->image}}" alt="{{$post->title}}">
                    </a>
                </div>
                    @else
                    <h2>No post yet</h2>
                @endif
            @endforeach

           
        </div>

        <div class="my-10">
            {{$posts->links('pagination::tailwind')}}
        </div>


        
    </section>
@endsection()