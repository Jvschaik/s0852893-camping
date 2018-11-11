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
        <div class="col-6">
        <h2 class="title-welcome">All Campings</h2>
        </div>

        <div class="dropdown col-2">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Filter
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($tags as $tag)
                <a class="dropdown-item" href="{{ route('tags.show', $tag->id ) }}"> {{ $tag->name }}</a>
                    @endforeach
            </div>
        </div>

        <div class="col-4 search">
            {{ Form::open(['route' => ['posts.search'], 'method' => 'GET', 'class'=>'form navbar-form navbar-right searchform']) }}
            {{ method_field('get') }}
            {{ Form::text('search', null,
                                   array('required',
                                        'class'=>'form-control')) }}
            {{ Form::submit('Search',
                                       array('class'=>'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        @foreach($posts as $post)
            @if($post->visible)
                <div class="col-lg-6">
                    <div class="card post mb-4">
                        <img class="card-img-top" src="{{ asset('img/'. $post->image) }}" alt="Card image cap">
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

    <div class="row">
        <div class="col-md-12">
            <div class="text-center pagination">
                {{ $posts->render("pagination::bootstrap-4") }}
            </div>
        </div>
    </div>

</div>

@endsection
