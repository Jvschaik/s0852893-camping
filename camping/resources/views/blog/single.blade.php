@extends('layouts.app')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag" )

@section('content')
    @if($post->visible)
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

                <div id="review-form" class="col-md-8 col-md-offset-2" style=" margin-top: 20px;">
                    <form action="{{ route('reviews.store', $post->id) }}" method="post" novalidate>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="review">review:</label>
                            <textarea type="text" class="form-control" id="review" name="review" cols="50" rows="10" {{ old('review', $post->review) }}></textarea>
                            @if($errors->has('review'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('review') }}
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-block btn-success">Add review</button>

                    </form>
                </div>
        </div>
    </div>

    @elseif(!$post->visible)
        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 style="color: red">Sorry!</h2>
                <br>
                <p>Selected page cannot be found</p>
                <p>Please try another search</p>
            </div>
        </div>
        @endif
    </div>
@endsection



