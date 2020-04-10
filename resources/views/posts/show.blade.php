@extends('layouts.app')

@section('content')


<div class="container mt-3">
    
    <div class="row">
        
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <a href="/posts/{{$post->id}}"><h1 class="card-title p-2">{{$post->title}}</h1></a>
                        <img src="/storage/cover_images/{{$post->cover_image}}" alt="" class="container" height="300">
                        <div class="card-body">
                            <p>{!! $post->body!!}</p>
                            <small>written on {{$post->created_at}} by {{$post->user->name}}</small>
                        </div>
                    </div>
                </div>   
                
            </div>
        </div>

    </div>

    <div class="row">
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
            <div class="col-md-4 mt-4">
                <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
            </div>

            <div class="col-md-4 mt-4 ml-auto">
                {!! Form::open(['action'=> ['PostsController@destroy', $post->id], 
                        'method'=> 'post','onsubmit' => 'return confirm("Are you sure you want to delete?")'])!!}
                            {{Form::submit('Delete', ['class'=> 'btn btn-danger float-right pr-4 pl-4'])}}
                            {{Form::hidden('_method', 'DELETE')}}
                {!! Form::close()!!}
            </div>
            @endif
        @endif
    </div>
</div>
@endsection