@extends('layouts.app')

@section('title')
    DebugTalk
@endsection()

@section('content')

    <x-list-posts :posts="$posts" />

@endsection()
