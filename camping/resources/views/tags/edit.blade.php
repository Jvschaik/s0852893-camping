@extends('layouts.app')

@section('title', '| Edit Tags')

@section('content')

    <div class="container">

        <form action="{{ route('tags.update', $tag->id) }}" method="post" novalidate>
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ $tag->name}}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
    </div>



@endsection
