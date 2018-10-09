@extends('layouts.app')
@section('title', '| All Categories')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Categories</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-3 col-md-offset-2">
                <div class="well">
                    <h2>New Category</h2>

                    <form action="{{ route('categories.store') }}" method="post" novalidate>
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-success">Create New Category</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
