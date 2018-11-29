@extends('posts._post')
@section('title', 'add post')

@section('content')

    {!! Form::model($post, array('route' => array('post.update', $post->id), 'method' => 'PUT')) !!}
    <div class="form-group">
        <div class="col-md-3">
            {{Form::label('title', 'title:')}}
        </div>
        <div class="col-md-9">
            {{Form::text('title', null, ['class' => 'form-control'])}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">
            {{Form::label('description', 'description:')}}
        </div>
        <div class="col-md-9">
            {{Form::textarea('description', null, ['class' => 'form-control'])}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{Form::submit('submit', ['class' => 'btn btn-success'])}}
        </div>
    </div>
    {!! Form::close() !!}