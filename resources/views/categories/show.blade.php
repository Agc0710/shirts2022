@extends ('layouts.app')

@section('title')AGC | {{$category->name}}
@endsection


@section('content')
    <div class="row mt-4 ">
        <div class="col">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to Category !</h1>
                <h3 class="card-title">{{$category->name}}
                </h3>
                <p class="card-text">{{$category->description}}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h2 class="alert alert-dark my-2 text-center">Shirts</h2>
        </div>
    </div>

    <div class="row my-1 mb-4">
        @if(sizeof($category->shirts)==0)
            <div class="col">
                <h4>No shirts found for {{$category->name}}</h4>
            </div>
        @else
            @foreach($category->shirts as $shirt)

                <div class="card text-white bg-dark m-4" style="max-width: 20rem;">
                    <div class="card-body ">
                        @isset($shirt->shirt_image)
                            <img src="{{asset('storage/'.$shirt->shirt_image)}}" class="card-img-top" alt="{{$shirt->shirt_image}}">
                        @else
                            <img src="https://www.segelectrica.com.co/wp-content/themes/consultix/images/no-image-found-360x250.png" class="card-img-top" alt="{{$shirt->shirt_image}}">
                        @endisset

                        <div class="card-body">
                            <h5 class="card-title">{{$shirt->shirt_name}}
                            </h5>
                        </div>
                    </div>
                    <a href="/shirt/{{$shirt->slug}}" class="btn btn-outline-primary">Shirt Detail</a>
                    <a href="/shirt/{{$shirt->slug}}/edit" class="btn btn-outline-warning">Shirt Edit</a>

                    <form method="POST" action="/shirt/{{$shirt->slug}}">
                        @csrf
                        @method('DELETE')
                        <input
                            type="submit"
                            class="btn btn-outline-danger btn-block"
                            value="Delete"
                            onclick="return confirm('Delete {{$shirt->shirt_name}}?')"
                        >
                    </form>
                </div>
            @endforeach
        @endif
    </div>
    <div class="row mb-4">
        <div class="offset-6 col-4">
            <div class="row">
                <a href="/category" class="btn btn-danger mb-2 ">Back</a>
            </div>
        </div>
        <div class="col-4 offset-6">
            <div class="row">
                <a href="/category/{{$category->slug}}/shirts/create" class="btn btn-primary mb-2">Create Shirt</a>
            </div>
        </div>

    </div>
@endsection


