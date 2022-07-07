@extends('layouts.app')

@section('title')Edit {{$category->name}}
@endsection

@section('content')
    <div class="row">
        <div class="col">
        <h1 class=" alert alert-dark my-3 text-center">Edit {{$category->name}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form method="POST" action="/category/{{$category->slug}}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label"> Category Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{old('name',$category->name)}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Category Description</label>
                    <textarea name="description" class="form-control">{{old('description',$category->description)}}</textarea>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="priority"> Category Priority</label>
                        <select class="form-control" id="priority" name="priority">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            {{old('priority')}}</select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/category" class="btn btn-danger">Back</a>
            </form>
        </div>
    </div>
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
