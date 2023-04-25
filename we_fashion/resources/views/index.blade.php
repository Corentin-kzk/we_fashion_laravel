@extends('base')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-4">
            <p class="text-end">Number of article : {{$counter}}</p>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($products as $product)
        <div class="col">
            <div class="card" style="height: 100%">
                <img src="{{$product->image}}" class="card-img-top" alt="items shop">
                <div class="card-body">
                    <div class="h-25">
                        <h2 class="card-title font-monospace fs-4">{{$product->name}}</h2>
                    </div>
                    <div class="overflow-auto mt-3 h-50">
                        <p class=" card-text">{{$product->description}}</p>
                    </div>
                    <div class="row justify-content-end align-items-end h-25">
                        <div class="col-5">
                            <p class="text-start">
                                {{ implode(', ', array_column($product->categories->toArray(), 'label')) }}
                            </p>
                        </div>
                        <div class="col-5 offset-2">
                            <p class="text-end">
                                Size :
                                {{ implode(', ', array_column($product->sizes->toArray(), 'label')) }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/product/{{$product->id}}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@if($counter > 6 && $products)
<div class="row flex-row-reverse  justify-content-center mt-4">
    <div class="col">
        <nav class="d-flex flex-column-reverse justify-content-center">
            {{$products->links()}}
        </nav>
    </div>
</div>
@endif

@endsection
