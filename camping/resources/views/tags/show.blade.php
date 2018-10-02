@extends('layouts.app')

@section('title', "| $tag->name Tag")

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $tag->name }} Tag
                    <small> {{ $tag->posts()->count() }} Posts</small>
                </h1>
            </div>
            <div class="col-md-2">
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block" style="float: right;">Edit</a>
            </div>
            <div class="col-md-2">

                <a href="" class="btn btn-danger btn-block" onclick="event.preventDefault(); document.getElementById('tag-destroy-{{ $tag->id }}').submit();">Delete</a>

                <form id="tag-destroy-{{ $tag->id }}" action="{{ route('tags.destroy', $tag->id) }}" method="post" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($tag->posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>@foreach ($post->tags as $tag)
                                    <span class="btn btn-primary btn-sm"> {{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary btn-sm">View</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
