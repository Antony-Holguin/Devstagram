@extends('layouts.app')

@section('title')
    Aplicacion devstagram
@endsection()

@section('content')
    
    <x-list-posts :posts="$posts" />

@endsection()