@extends('layouts.app') <!-- extends from layouts app.blade.php -->

@section('title', "| $post->title" )

@section('content')
    <div class="container">
        <div class="row">
            <div class="col md-8 col-md-offset-2">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->body }}</p>
                <hr>
                <p>Posted In: {{ $post->category->name }}</p>
                <p>Tags: @foreach ($post->tags as $tag)
                        <span class="btn btn-primary btn-sm"><a href="{{ route('tags.show', $tag->id ) }}"> {{ $tag->name }}</a></span>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
@endsection
