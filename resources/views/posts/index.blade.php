@extends('layouts.app')

@section('content')


<div class="container mt-3">
    
    <div class="row">
        
        <div class="col-md-7">
            @foreach ($posts as $post)
            <div class="card mt-2">
                <div class="row">
                    <div class="col-md-4">
                    <img src="/storage/cover_images/{{$post->cover_image}}" alt="" width="150" height="120">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <a href="/posts/{{$post->id}}"><h1 class="card-title">{{$post->title}}</h1></a>
                        <small>written on {{$post->created_at}} by {{$post->user->name}}</small>
                        </div>
                    </div>
                </div>   
                
            </div>
            @endforeach
        </div>
    
        <div class="col-md-4 ml-auto">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title"> Forums </h2>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">Where to get resources on python data science</a></li>
                        <li class="list-group-item"><a href="#">Where to get resources on python data science</a></li>
                        <li class="list-group-item"><a href="#">Where to get resources on python data science</a></li>
                        <li class="list-group-item"><a href="#">Where to get resources on python data science</a></li>
                        <li class="list-group-item"><a href="#">Where to get resources on python data science</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection