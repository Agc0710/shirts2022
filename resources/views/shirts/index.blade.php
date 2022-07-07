@extends('layouts.app')

@section('title')Shirts @endsection

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="alert alert-dark my-2 text-center"> Shirts </h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-dark">
                <thead>
                <th>Id</th>
                <th>Shirt Name</th>
                <th>Shirt Value</th>
                <th>Shirt Color</th>
                <th>Status</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach($shirts as $shirt)
                    <tr>
                        <td>{{$shirt->id}}</td>
                        <td>{{$shirt->shirt_name}}</td>
                        <td>{{$shirt->shirt_value}}</td>
                        <td>{{$shirt->shirt_color}}</td>
                        <td >
                            {{$shirt->status ? 'Active' : 'Inactive'}}
                        </td>
                        <td><a
                                href="/shirt/{{$shirt->slug}}"
                                class="btn btn-outline-primary"
                            >
                                Show
                            </a>
                        </td>
                        <td><a
                                href="/shirt/{{$shirt->slug}}/edit"
                                class="btn btn-outline-success"
                            >
                                Edit
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="/shirt/{{$shirt->slug}}">
                                @csrf
                                @method('DELETE')
                                <input
                                    type="submit"
                                    class="btn btn-outline-danger"
                                    value="Delete"
                                    onclick="return confirm('Delete {{$shirt->name}}?')"
                                >
                            </form>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
