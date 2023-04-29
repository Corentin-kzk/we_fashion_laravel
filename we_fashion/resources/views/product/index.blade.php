@extends('layouts.app')



@section('content')

<div class="container d-flex flex-column align-items-center justify-content-center">
    <div class="row mb-3">
        <div class="col-6 offset-1 ">
            <img src="{{$product->imageUrl()}}" class="img-fluid" alt="product image">
        </div>
        <div class="col-4 offset-1">
            <h1>{{$product->name}}</h1>
            <h2>{{$product->price}} <i class="bi bi-currency-euro"></i></h2>
            <select class="form-select" aria-label="Taille :">
                <option selected>Aucune taille</option>
                @foreach ($product->sizes as $size)
                <option value=" {{$size->id}}"> {{$size->label}}</option>
                @endforeach
            </select>
            <div class="row mt-4">
                <button type="button" onclick="{{Redirect::to('product.index')}}" class="btn btn-primary">Acheter <i class="bi bi-bag"></i></button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>{{$product->description}}</p>
        </div>
    </div>
</div>




@endsection
