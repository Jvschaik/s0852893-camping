@extends('layouts.app')

@section('title', '| Edit Blog Post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {{ Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) }}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}


                {{ Form::label('body', 'Body:', ["class" => 'form-spacing-top']) }}
                {{ Form::textarea('body', null, ["class" => 'form-control']) }}
            </div>

            <div class="col-md-4">
                <div class="card bg-faded">
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
                            {{ Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) }}
                        </div>
                        <div class="col-md-6">
                            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')

@endsection

