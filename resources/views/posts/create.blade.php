@extends('layouts.app')

@section('title')
    Create a new post
@endsection()

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"
@endpush

@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form method="POST" enctype="multipart/form-data" action="{{route('imagenes.store')}}" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('posts.store')}}" novalidate method="POST">
                @csrf
                <div>
                    <label class="mb-2 block uppercase text-gray-500 font-bold " for="">Title:</label>
                    <input class="border p-3 w-full rounded-lg @error('title') border-red-600 @enderror" placeholder="Title..." name="title" type="text" autocomplete="off" value="{{old('title')}}">
                    @error('title')
                        <p class="p-1 text-white bg-red-600 rounded-lg text-center">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 block uppercase text-gray-500 font-bold " for="">Description of the post:</label>
                    <textarea class="border md:w-full @error('description') border-red-600 @enderror" name="description" @error('description') border-red-600 @enderror" id="description" cols="50" rows="5">{{old('descriptiom')}}</textarea>
                    @error('description')
                        <p class="p-1 text-white bg-red-600 rounded-lg text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div>
                    <input type="hidden" name="image" id="image" value="{{old('image')}}">
                    @error('image')
                        <p class="mt-5 p-1 text-white bg-red-600 rounded-lg text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                

                <div>
                    <input class="mt-5 border rounded-lg bg-sky-600 text-white w-full p-3 uppercase cursor-pointer" type="submit" value="Post">
                    
                </div>

               
                
            </form>
        </div>
    </div>
@endsection()