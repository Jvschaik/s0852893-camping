@extends('layouts.app')

@section('title', '| Contact')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact me</h1>
                <hr>
                <form action="{{ url('contact') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input id="email" name="email" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input id="subject" name="subject" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" class="form-control">
                    </textarea>
                    </div>

                    <input type="submit" value="Send Messsage" class="btn btn-success">
                </form>
            </div>
        </div>


@endsection

