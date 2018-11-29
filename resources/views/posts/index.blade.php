@extends ('posts._post')

@section('title', 'all posts')

@section('content')

    <table class="table table-bordered">
        <tread>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>description</th>
                <th>create date</th>
                <th>actions</th>
            </tr>
        </tread>
        <tbody>

        @foreach($post as $p)
            <tr>
                <th scope="row">{{$p->id}}</th>
                <td>{{$p->title}}</td>
                <td>{!!$p->description !!}</td>
                <td>{{$p->created_at}}</td>
                <td>
                    <div class="container">
                        <div class="row">
                        <div class="col">
                            <a href="{{URL::to('post/' . $p->id). '/edit'}}" class="btn btn-dark">edit current post</a>
                        </div>
                            <div class="col">
                                <a href="{{URL::to('post/' . $p->id)}}" class="btn btn-info">view current post</a>
                            </div>
                        <div class="col">
                            {!! Form::open(['method'=>'DELETE', 'route' => ['post.destroy', $p->id]]) !!}
                            {!! Form::submit('Delete current post', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        {{$post->links()}}
        <a href="{{URL::to('post/create')}}" class="btn btn-success">create new</a>


@endsection