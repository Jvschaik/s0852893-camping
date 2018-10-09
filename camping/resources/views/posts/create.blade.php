@extends('layouts.app')

@section('title', '| Create New Post')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h1>Create New Post</h1>
                <hr>

                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ old('title') }}" placeholder="title">
                        @if($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="slug">URL:</label>
                        <input type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" value="{{ old('slug') }}" placeholder="URL">
                        @if($errors->has('slug'))
                            <div class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id">
                            <option value=""></option>
                            @foreach($categories as $cat)
                                <option  value="{{$cat->id}}"> {{$cat->name}} </option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('category_id') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags:</label>
                        <select class="form-control select2-multi {{ $errors->has('tag_id') ? ' is-invalid' : '' }}"  multiple="multiple" name="tags[]">
                            <option value=""></option>
                            @foreach($tags as $t)
                                <option  value="{{$t->id}}"> {{$t->name}} </option>
                            @endforeach
                        </select>
                        @if($errors->has('tag_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tag_id') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="featured_image">Upload image:</label>
                        <input type="file" name="featured_image" id="featured_image">
                    </div>



                    <div class="form-group">
                        <label for="body">Post Body:</label>
                        <textarea name="body" id="body" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" cols="50" rows="10" value="{{ old('body') }}"></textarea>
                        @if($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block">Create Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">

        $('.select2-multi').select2();

    </script>
@endsection



