@extends ('layouts.app')

@section('title')Cards
@endsection


@section('content')
    <div class="row">
        <div class="col">
            <h2 class="alert alert-dark my-2 text-center">Shirts</h2>
        </div>
    </div>

    <div class="row my-1 mb-4">
            @foreach($shirts as $shirt)
                <div class="card text-white bg-dark m-4" style="max-width: 20rem;">
                    <div class="card-body ">
                        @isset($shirt->shirt_image)
                            <img src="{{asset('storage/'.$shirt->shirt_image)}}" class="card-img-top" alt="{{$shirt->shirt_image}}">
                        @else
                            <img src="https://www.segelectrica.com.co/wp-content/themes/consultix/images/no-image-found-360x250.png" class="card-img-top" alt="{{$shirt->shirt_image}}">
                        @endisset

                            <div class="card-body">
                                <p class="card-title">{{$shirt->shirt_name}}</p>
                                <p class="card-text">{{$shirt->shirt_color}}</p>
                                <p class="card-text">{{$shirt->shirt_value}}</p>
                                <p class="card-text">
                                    {{$shirt->status ? 'Active' : 'Inactive'}}
                                </p>

                            </div>
                    </div>
                </div>
            @endforeach
    </div>

@endsection







