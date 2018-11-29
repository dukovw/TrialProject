@extends('posts._post')

@section('title', 'view post')

@section('content')

    <h1>{{$post->title}}</h1>
    <p>{!! $post->description !!}</p>
    <p>{{\Carbon\Carbon::parse($post->created_at)->format('d.m.y')}}</p>
<div class="containe">
    <div class="row">
        <div class="col-1">
            <a href="{{URL::to('post/' . $post->id). '/edit'}}" class="btn btn-dark">edit post</a>
        </div>
        <div class="col-1">
            {!! Form::open(['method'=>'DELETE', 'route' => ['post.destroy', $post->id]]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
    <br>
    <a href="{{URL::to('post')}}" class="btn btn-success">back to all posts</a>



@endsection