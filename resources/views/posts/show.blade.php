@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection()

@section('content')


    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <div>
                <img src="{{asset('uploads').'/'.$post->image}}" alt="{{$post->title}}">
            </div>


            @auth

            <livewire:like-post :post="$post" />

            @endauth



            @guest
            <div class="p-3 flex items-center gap-4">

                    <div class="my-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                    </div>

                <p class="p-3">{{$post->like->count()}} Likes</p>

            </div>
            @endguest



           <div>
                <p class="p-2">
                    <span class="font-bold">Author:</span>
                    {{$post->user->username}}
                </p>
           </div>

            <div>
                <p class="p-2">
                    {{$post->description}}
                </p>
            </div>

           <div>
                <p class="p-2">
                    {{$post->created_at->diffForHumans()}}
                </p>
           </div>

           @auth

                @if ($post->user_id == auth()->user()->id)
                    <div>
                        <form action="{{route('posts.destroy', $post)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input class="bg-red-600 hover:bg-red-800 mt-4 rounded-lg text-center text-white p-3 cursor-pointer" type="submit" value="Delete post">
                        </form>
                    </div>
                @endif

            @endauth

        </div>


        <div class="md:w-1/2 p-5">
            <div class=" bg-white shadow p-5 mb-5">
                @auth
                <h1 class="text-xl font-bold text-center mb-4">Add a comment</h1>
                @if (session('message'))
                    <p class="p-3 text-white text-center bg-green-600 rounded-lg">Post commented successfully</p>
                @endif

                <form action="{{route('comments.store', ['user' => $user, 'post'=>$post])}}" method="POST" novalidate>
                    @csrf
                    <div>
                        <label class="mb-2 block uppercase text-gray-500 font-bold " for="">Comment</label>
                        <textarea class="border md:w-full @error('comment') border-red-600 @enderror" name="comment" id="comment" cols="50" rows="5"></textarea>

                        @error('comment')
                            <p class="p-1 text-white bg-red-600 rounded-lg text-center">{{$message}}</p>
                        @enderror

                    </div>

                    <div>
                        <input class="mt-5 border rounded-lg bg-sky-600 text-white w-full p-3 uppercase cursor-pointer" type="submit" value="Comment">
                    </div>
                </form>
                @endauth




                <div class="p-5 bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comment->count())
                        @foreach ($post->comment as $comment)
                            <div class="p-5 border-gray-300 border-b">

                                <a class="font-bold" href="{{route('posts.index',$comment->user)}}">{{$comment->user->name}}</a>


                                <p>{{$comment->comment}}</p>
                                <p class="text-sm text-gray-500">{{$comment->created_at->diffForHumans()}}</p>
                            </div>
                        @endforeach
                    @else
                        <p>No comments yet</p>
                    @endif

               </div>



            </div>

        </div>

    </div>
@endsection()

