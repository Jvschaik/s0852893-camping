@extends('layouts.app')

@section('title', '| Edit review')

@section('content')
    <div class="container">
        <h3>Edit review</h3>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{ Form::model($review,['route' => ['reviews.update', $review->id], 'method' => 'PUT']) }}

                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}

                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}

                {{ Form::label('review', 'review:') }}
                {{ Form::textarea('review', null, ['class' => 'form-control']) }}

                {{ Form::submit('Update review', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px']) }}

                {{ Form::close() }}
            </div>

        </div>
    </div>


@endsection