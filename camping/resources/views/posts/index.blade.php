@extends('layouts.app')

@section('title', '| All Posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>All Posts</h1>
            </div>

            <div class="col-md-2">
                <a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary btn-h1-spacing">Create New Post</a>
            </div>

            <div class="col-md-12">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created At</th>
                        <th>Visible</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($posts as $post)

                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ substr($post->body, 0, 50) }} {{ strlen($post->body) > 50 ? "..." : "" }}</td>
                            <td>{{ date('j M, Y',strtotime( $post->created_at)) }}</td>

                            <td><a style="color: black" href="{{route('post.toggleActivePost', ['id' => $post->id])}}">
                                    @if($post->visible)
                                        Disable
                                    @elseif(!$post->visible)
                                        Enable
                                    @endif
                                </a></td>

                            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary btn-sm">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                            </td>

                        </tr>

                    @endforeach

                    </tbody>
                </table>

                <div class="text-center pagination">
                    {{ $posts->render("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection
