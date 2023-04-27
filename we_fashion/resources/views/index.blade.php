@extends('layouts.app')



@section('content')
<style>
    .card>img {
        max-height: 400px;
        width: 100%;
        object-fit: cover;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-4">
            <p class="text-end">Nombre d'article : {{$products->total()}}</p>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($products as $product)
        <div class="col">
            <a class="link-secondary link-offset-2 link-underline-opacity-100 link-underline-opacity-100-hover" href="{{route('product.show', $product)}}">
            <div class="card position-relative" style="height: 100%">
                @if($product->status)
                <span class="badge bg-info text-dark position-absolute top-0 end-0 p-2">En Solde</span>
                @endif
                <img src="{{$product->imageUrl()}}" class="card-img-top" alt="items shop">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="h-25">
                        <h2 class="card-title font-monospace fs-4">{{$product->name}}</h2>
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
            </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@if($products->total() > 6 && $products)
<div class="row flex-row-reverse  justify-content-center mt-4">
    <div class="col">
        <nav class="d-flex flex-column-reverse justify-content-center">
            {{$products->links()}}
        </nav>
    </div>
</div>
@endif

@endsection
