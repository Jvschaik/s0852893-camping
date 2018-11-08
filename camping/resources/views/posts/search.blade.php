@extends('layouts.app')
@section('title', '| Search')
@section('content')
    @if (count($articles) === 0)
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1 style="color:red">Sorry! Searched item can not be found</h1>
                    <p>Please try again</p>
                </div>

            </div>
            @elseif (count($articles) >= 1)
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <h1>{{ $articles->count()}} articles found</h1>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            @foreach($articles as $article)
                                @if($article->visible)
                                    <div class="col-lg-6">
                                        <div class="card post mb-4">
                                            {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $article->title }}</h5>
                                                <p class="card-text">{{ substr($article->body, 0, 300)}}{{ strlen($article->body) > 300 ? "..." : "" }}</p>
                                                <a href="{{ url('post/'.$article->slug) }}" class="btn btn-outline-primary">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center pagination">
                                {{ $articles->render("pagination::bootstrap-4") }}
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @endif
@endsection
