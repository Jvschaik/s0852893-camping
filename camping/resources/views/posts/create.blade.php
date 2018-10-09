@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Create a new post</h1>
                <hr>
                {{ Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) }}
                {{ Form::label('title', "Title:") }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

                {{ Form::label('slug', 'URL:', ["class" => 'form-spacing-top']) }}
                {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '4', 'maxlength' => '255')) }}

                {{ Form::label('category', 'Category:', ["class" => 'form-spacing-top']) }}
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}﻿

                {{ Form::label('tags', 'Tags:', ["class" => 'form-spacing-top']) }}
                {{ Form::select('tag_id', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => "multiple", 'name' => 'tags[]']) }}﻿

                {{ Form::label('featured_image', 'Upload Image:', array('style' => 'margin-top: 20px')) }}
                {{ Form::file('featured_image') }}
                <br>

                {{ Form::label('body', "Post Body:", ["class" => 'form-spacing-top']) }}
                {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

                {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script type="text/javascript">

        $('.select2-multi').select2();

    </script>
@endsection