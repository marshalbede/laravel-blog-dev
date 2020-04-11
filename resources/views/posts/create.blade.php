@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <h1>Create New Post</h1>
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', '', ['placeholder' => 'Title', 'class' =>  'form-control']) }}
            </div>



            <div class="form-group">
                {{ Form::label('body', 'Body') }}
                {{ Form::textarea('body', '', [ 'id' => 'editor',
                    'placeholder' => 'Type your post',
                'class' =>  'form-control description',
                'name'  => 'body',
                ]) }}

            </div>

            <div class="form-group">
                {{ Form::file('cover_image') }}
            </div>

            <div class="form-group">
                {{ Form::submit('Post', ['class' => 'btn btn-primary pr-4 pl-4']) }}
            </div>

        {!! Form::close() !!}
        </div>

    </div>

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea.description',
            forced_root_block: false, // Start tinyMCE without any paragraph tag
            plugins: "autoresize"
        });
    </script>
@endsection


