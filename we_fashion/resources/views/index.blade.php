@extends('base')

@section('content')

<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($products as $product)
        <div class="col">
            <div class="card" style="height: 100%">
                <img src="{{$product->image}}" class="card-img-top" alt="items shop">
                <div class="card-body">
                    <h2 class="card-title font-monospace fs-4">{{$product->name}}</h2>
                    <div class="overflow-auto mb-3" style="height: 100px;">
                        <p class="card-text">{{$product->description}}</p>
                    </div>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="row flex-row-reverse  justify-content-center mt-2">
    <div class="col col-md-4">
        <nav class="d-flex justify-content-center">
            @if($products)
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            @else
            <div>No products</div>
            @endif
        </nav>
    </div>
</div>

@endsection
