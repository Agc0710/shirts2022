@extends('layouts.app')

@section('title')Categories @endsection

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="alert alert-dark my-2 text-center"> Shirts Categories</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-dark">
                <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>priority</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>{{$category->priority}}</td>
                        </td>
                        <td><a
                                href="/category/{{$category->slug}}"
                                class="btn btn-outline-primary"
                            >
                                Show
                            </a>
                        </td>
                        <td><a
                                href="/category/{{$category->slug}}/edit"
                                class="btn btn-outline-success"
                            >
                                Edit
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="/category/{{$category->slug}}">
                                @csrf
                                @method('DELETE')
                                <input
                                    type="submit"
                                    class="btn btn-outline-danger"
                                    value="Delete"
                                    onclick="return confirm('Delete {{$category->name}}?')"
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
            <a class="btn btn-primary mb-3  btn-lg btn-block" href="/category/create">Create new Shirts Category</a>
        </div>
    </div>
@endsection
