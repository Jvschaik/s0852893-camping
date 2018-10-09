@extends('layouts.app')

@section('title', '| View Post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $post->title }}</h2>

                <img src="{{ asset('img/'. $post->image) }}" height="200" width="300" alt="image_upload">

                <p class="lead">{{ $post->body }}</p>

                <hr>

                <div class="tags">
                    @foreach($post->tags as $tag)
                        <span class="btn btn-default btn-secondary">{{ $tag->name }}</span>
                    @endforeach
                </div>

                <div id="backend-reviews" style="margin-top: 50px">
                    <h3>Reviews
                        <small>{{ $post->reviews()->count() }} total</small>
                    </h3>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>review</th>
                            <th width="100px"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($post->reviews as $review)

                            <tr>
                                <td>{{ $review->name }}</td>
                                <td>{{ $review->email }}</td>
                                <td>{{ $review->review }}</td>
                                <td width="100px">

                                    <a href="{{ route('reviews.edit', $review->id) }}" class=" btn btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="{{ route('reviews.delete', $review->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>

                                </td>
                            </tr>

                        </tbody>
                        @endforeach

                    </table>

                </div>
                
            </div>

            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Url:</dt>
                        <dd><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }} </a></dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Category:</dt>
                        <dd> {{ $post->category->name  }}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Created At:</dt>
                        <dd>{{ date('j M, Y H:i', strtotime($post->created_at)) }}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Last Updated:</dt>
                        <dd>{{ date('j M, Y H:i', strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            {{ Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) }}
                        </div>
                        <div class="col-md-6">
                            {{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) }}

                            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}

                            {{ Form::close() }}
                        </div>

                        <div class="col-md-12 see_posts">
                            {{ Html::linkRoute('posts.index', '<< See All Posts', array(), array('class' => 'btn btn-default btn-block btn btn-outline-secondary ')) }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection