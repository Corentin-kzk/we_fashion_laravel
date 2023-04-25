@extends('base')

@section('content')

<div class="container d-flex flex-column align-items-center justify-content-center">
    <div class="row mb-3">
        <div class="col-6 offset-1 ">
            <img src="{{$product->image}}" class="img-fluid" alt="product image">
        </div>
        <div class="col-4 offset-1">
            <h1>{{$product->name}}</h1>
            <select class="form-select" aria-label="Size :">
                <option selected>No size</option>
                @foreach ($product->sizes as $size)
                <option value=" {{$size->id}}"> {{$size->label}}</option>
                @endforeach
            </select>
            <div class="row mt-4">
                <button type="button" class="btn btn-primary">Buy <i class="bi bi-bag"></i></button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>{{$product->description}}</p>
        </div>
    </div>
</div>


<div class="row flex-row-reverse  justify-content-center mt-2">
    <div class="col">
        <nav class="d-flex flex-column-reverse justify-content-center">

        </nav>
    </div>
</div>


@endsection