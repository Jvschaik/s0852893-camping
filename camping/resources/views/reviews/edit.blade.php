@extends('layouts.app')

@section('title', '| Edit Review')

@section('content')
    <div class="container">
        <h3>Edit review</h3>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <form action="{{ route('reviews.update', $review->id) }}" method="post" novalidate>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ $review->name}}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ $review->email}}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="review">review:</label>
                        <textarea type="text" class="form-control" id="review" name="review" cols="50" rows="10" {{ old('review', $review->review) }}>{{ $review->review }}</textarea>
                        @if($errors->has('review'))
                            <div class="invalid-feedback">
                                {{ $errors->first('review') }}
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-block btn-success">Update review</button>
                </form>
            </div>

        </div>
    </div>


@endsection
