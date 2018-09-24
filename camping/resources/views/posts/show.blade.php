@extends('layouts.app')

@section('title', '| View Post')

@section('content')

    <h2>{{ $post->title }}</h2>

    <p class="lead">{{ $post->body }}</p>

@endsection