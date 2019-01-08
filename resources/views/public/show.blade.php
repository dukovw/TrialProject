@extends('public._post')

@section('title', 'view post')

@section('content')

    <h1>{{$post->title}}</h1>
    <p>{!! $post->description !!}</p>
    <p>{{\Carbon\Carbon::parse($post->created_at)->format('d.m.y')}}</p>

    <br>
    <a href="{{URL::to('posts')}}" class="btn btn-success">back to all posts</a>



@endsection