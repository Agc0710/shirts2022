@extends('layouts.app')

@section('title')Users @endsection

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="alert alert-dark my-2 text-center"> Users</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-dark">
                <thead>
                <th>Id</th>
                <th>Username</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        </td>

                        <td><a
                                href="/user/{{$user->id}}/edit"
                                class="btn btn-outline-success"
                            >
                                Edit
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="/user/{{$user->id}}">
                                @csrf
                                @method('DELETE')
                                <input
                                    type="submit"
                                    class="btn btn-outline-danger"
                                    value="Delete"
                                    onclick="return confirm('Delete {{$user->name}}?')"
                                >
                            </form>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-4 ">
            <a class="btn btn-primary mb-3  btn-lg btn-block" href="/user/create">Create new usuario</a>
        </div>
    </div>
@endsection
