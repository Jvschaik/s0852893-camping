@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create a new post</h1>
            <hr>
            {{ Form::open(['route' => 'posts.store', 'data-parsley-validate']) }}
            {{ Form::label('title', "Title:") }}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

            {{ Form::label('slug', 'URL:') }}
            {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '4', 'maxlength' => '255')) }}


            {{ Form::label('body', "Post Body:") }}
            {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

            {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection