@extends('layouts.app') <!-- extends from layouts app.blade.php -->

@section('title', '| Homepage')

@section('content') <!-- get content from main.blade.php -->

<div class="row">
    <div class="col-md-12">
        <div class="jumbotron jumbotron-billboard">
            <div class="img"></div>
            <div class="container container-header">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach($posts as $post)
            @if($post->visible)
                <div class="col-lg-6">
                    <div class="card post mb-4">
                        {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ substr($post->body, 0, 300)}}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
                            <a href="{{ url('post/'.$post->slug) }}" class="btn btn-outline-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

@endsection
