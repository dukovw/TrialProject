@extends ('public._post')

@section('title', 'all posts')

@section('content')

    <table class="table table-bordered">
        <tread>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>description</th>
                <th>create date</th>
            </tr>
        </tread>
        <tbody>

        @foreach($post as $p)
            <tr>
                <th scope="row">{{$p->id}}</th>
                <td>{{$p->title}}</td>
                <td>{!!$p->description !!}</td>
                <td>{{$p->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$post->links()}}
    <a href="{{URL::to('/')}}" class="btn btn-success">back to main page</a>
@endsection