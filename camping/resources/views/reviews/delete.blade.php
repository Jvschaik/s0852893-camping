@extends('layouts.app')

@section('title', '| DELETE REVIEW?')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>DELETE THIS REVIEW?</h3>

                <p>
                    <strong>Name:</strong> {{ $review->name }}<br>
                    <strong>Email:</strong> {{ $review->email }}<br>
                    <strong>review:</strong>{{ $review->review }}<br>
                </p>

                <a href="" class="btn btn-danger btn-block btn-large" onclick="event.preventDefault(); document.getElementById('review-destroy-{{ $review->id }}').submit();">Delete this review</a>

                <form id="review-destroy-{{ $review->id }}" action="{{ route('reviews.destroy', $review->id) }}" method="post" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>

            </div>
        </div>
    </div>


@endsection