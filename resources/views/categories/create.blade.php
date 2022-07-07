@extends('layouts.app')

@section('title')  Create new Shirts Category  @endsection

@section('content')
    <div class="row">
        <div class="col">
        <h1 class="alert alert-dark my-2 text-center"> Create new Shirts Category </h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form method="POST" action="/category" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name Category</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description Category</label>
                    <textarea name="description" class="form-control">{{old('description')}}</textarea>
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
        @if($errors->any())
            <div class="row mt-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endsection
