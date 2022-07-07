@extends('layouts.app')

@section('title')Edit {{$shirt->name}}
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <h1 class=" alert alert-dark my-3 text-center"> Shirt Edit {{$shirt->name}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form method="POST" action="{{route('shirt.update', $shirt)}}"enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="shirt_name" class="form-label"> Shirt Name</label>
                    <input type="text" class="form-control" name="shirt_name" id="shirt_name" value="{{old('shirt_name',$shirt->shirt_name)}}">
                </div>
                <div class="mb-3">
                    <label for="shirt_value" class="form-label"> Shirt Value</label>
                    <input type="number" class="form-control" name="shirt_value" id="shirt_value" value="{{old('shirt_value',$shirt->shirt_value)}}">
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="shirt_color"> Shirt Color</label>
                        <select class="form-control" id="shirt_color" name="shirt_color">
                            <option>Azul</option>
                            <option>Blanca</option>
                            <option>Verde</option>
                            {{old('shirt_color',$shirt->shirt_color)}}</select>
                    </div>
                    <div class="mb3 col-6">
                        <label for="shirt_image" class="form-label"> Shirt Image</label>
                        <input type="file" class="form-control" id="shirt_image" name="shirt_image">
                    </div>
                </div>
                <div class="row">
                    <div class=" col-6">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input"
                                   id="active" name="status"
                                {{old('status',$shirt->shirt_status? 'checked': '')}}
                            >
                            <label class="form-check-label" for="status">¿Active?</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/category" class="btn btn-danger">Back</a>
            </form>
        </div>
    </div>
    @isset($shirt->shirt_image)
        <img src="{{asset('storage/'.$shirt->shirt_image)}}" class="card-img-top" alt="{{$shirt->shirt_image}}">
    @else
        <img src="https://www.segelectrica.com.co/wp-content/themes/consultix/images/no-image-found-360x250.png" class="card-img-top" alt="{{$shirt->shirt_image}}">
    @endisset
    <!--verificar si hay errores con este if (hara la validacion con el validate del controlador)-->
    <div class="row">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    </div>
@endsection
