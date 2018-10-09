@extends('layouts.app') <!-- extends from layouts app.blade.php -->

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag" )

@section('content')
    <div class="container">
        <div class="row">
            <div class="col md-8 col-md-offset-2">
                <h3>{{ $post->title }}</h3>
                <img src="{{ asset('img/'. $post->image) }}" height="200" width="300" alt="image_upload">
                <p>{{ $post->body }}</p>
                <hr>
                <p>Posted In: {{ $post->category->name }}</p>
                <p>Tags: @foreach ($post->tags as $tag)
                        <span class="btn btn-primary btn-sm"><a href="{{ route('tags.show', $tag->id ) }}"> {{ $tag->name }}</a></span>
                    @endforeach
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="reviews-title"><i class="fa fa-fw fa-lg fa-review" aria-hidden="true"></i> {{ $post->reviews()->count() }} Reviews</h3>
                @foreach($post->reviews as $review)
                    <div class="review">
                        <div class="author-info">
                            <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($review->email))) . "?s=50&d=mm" }}" class="author-image">
                            <div class="author-name">
                                <h3>{{ $review->name }}</h3>
                                <p class="author-time">{{ date('n F  Y - g:iA' ,strtotime($review->created_at)) }}</p>
                            </div>
                        </div>

                        <div class="review-content">
                            {{ $review->review }}
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div id="review-form" class="col-md-8 col-md-offset-2" style="margin-top: 20px;">
                {{ Form::open(['route' => ['reviews.store', $post->id], 'method' => 'POST']) }}

                <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('name', "Name:") }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="col-md-6">
                        {{ Form::label('email', 'Email:') }}
                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="col-md-12">
                        {{ Form::label('review', "review:") }}
                        {{ Form::textarea('review', null, ['class' => 'form-control', 'rows' => '5']) }}

                        {{ Form::submit('Add review', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
