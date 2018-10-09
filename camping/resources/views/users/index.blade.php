@extends('layouts.app')

@section('title', '| Edit Users')

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
                        <th>Email</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach( $users as $user)

                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ date('j F, Y',strtotime($user->created_at)) }}</td>

                            <td>
                                <a href="" class="btn btn-danger btn-block btn-large" onclick="event.preventDefault(); document.getElementById('user-destroy-{{ $user->id }}').submit();">Delete</a>

                                <form id="user-destroy-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="post" style="display: none;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>

                            </td>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
