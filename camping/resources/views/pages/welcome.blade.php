@extends('layouts.app') <!-- extends from layouts app.blade.php -->

@section('title', '| Homepage')

@section('content') <!-- get content from main.blade.php -->

<div class="row">
    <div class="col-md-12">
        <div class="jumbotron jumbotron-billboard">
            <div class="img"></div>
            <div class="container container-header">
                {{--<img class="logo" src="img/camping.jpg" alt="">--}}
            </div>
        </div>
    </div>
</div>
{{--end row--}}
<div class="container">

    <div class="row">
        <div class="col-md-8">

            @foreach($posts as $post)

                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ substr($post->body, 0, 300)}}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
                    <a href="{{ url('post/'.$post->slug) }}" class="btn btn-outline-primary">Read more</a>
                </div>

                <hr>
            @endforeach
        </div>
    </div>
</div>

@endsection
