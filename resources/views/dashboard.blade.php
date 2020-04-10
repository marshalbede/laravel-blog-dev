@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Post</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                                        <td>
                                            <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit Post</a> 
                                        </td>
                                        <td>
                                                {!! Form::open(['action'=> ['PostsController@destroy', $post->id], 
                                                'method'=> 'post','onsubmit' => 'return confirm("Are you sure you want to delete?")'])!!}
                                                    {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                {!! Form::close()!!}
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <div>
                        <a href="/posts/create" class="btn btn-primary pl-4 pr-4 mt-4">Create New Post</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
