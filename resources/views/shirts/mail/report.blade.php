@extends('layouts.base')

@section('content')
    <div class="row mt-4">
        <div class="col">
            <div class="card mb-3 shadow">
                <div class="row g-0">
                    <div class="col-md-4">
                        @isset($shirt->shirt_image)
                            <img src="{{asset('storage/' . $shirt->shirt_image)}}" class="img-fluid rounded-start" alt="{{$shirt->shirt_image}}">
                        @else
                            <img src="https://gqspcolombia.org/wp-content/themes/consultix/images/no-image-found-360x260.png" class="img-fluid rounded-start" alt="{{$shirt->shirt_image}}">
                        @endisset
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <p class="card-title">{{$shirt->shirt_name}}</p>
                                <p class="card-text">{{$shirt->shirt_color}}</p>
                                <p class="card-text">{{$shirt->shirt_value}}</p>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
