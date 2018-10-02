@extends('layouts.app')

@section('title', '| All Tags')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Tags</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach( $tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td><a href="{{ route('tags.show', $tag->id ) }}" style="color:black">{{ $tag->name }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-3 col-md-offset-2">
                <div class="well">
                    <h2>New Tag</h2>
                    <form action="{{ route('tags.store') }}" method="post" novalidate>
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-success">Create New Tag</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
