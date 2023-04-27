@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
    <div class="row">
        <h1>Produits</h1>
    </div>
    <div class="row justify-content-end align-items-center my-3">
        <div class="col-2 clearfix">
            <a href="{{route('admin.product.create')}}" class="btn btn-outline-dark float-end">Nouveau produit <i class="bi bi-plus"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-striped table-hover">
                <caption>Liste des produits</caption>
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">#Réferences</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Categorie(s)</th>
                        <th scope="col">Prix (<i class="bi bi-currency-euro"></i>)</th>
                        <th scope="col">Tailles</th>
                        <th scope="col">Soldé</th>
                        <th scope="col">Visible</th>
                        <th scope="col" class="text-center">Editer</th>
                        <th scope="col" class="text-center">Supprimer</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider ">
                    @foreach($products as $product)
                    <tr>
                        <td style="width: 10%"><img src="{{$product->imageUrl()}}" class="img-fluid img-thumbnail" alt="pictures"></td>
                        <th scope="row">{{$product->reference}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{ implode(', ', array_column($product->categories->toArray(), 'label')) }}</td>
                        <td>{{$product->price}}<i class="bi bi-currency-euro"></i></td>
                        <td>{{ implode(', ', array_column($product->sizes->toArray(), 'label')) }}</td>
                        <td class="text-center">@if($product->status) <i class="bi bi-check2-all text-success"></i> @else <i class="bi bi-x-lg text-danger"></i>@endif</td>
                        <td class="text-center">@if($product->published) <i class="bi bi-check2-all text-success"></i> @else <i class="bi bi-x-lg text-danger"></i> @endif</td>
                        <td class="text-center">
                            <a href="{{route('admin.product.edit', $product)}}" class="btn btn-outline-secondary rounded-circle"><i class="bi bi-pencil-square"></i></a>
                        </td>
                        <td>
                            <div class="d-block mx-auto"><button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$product->id}}" class="d-block mx-auto btn btn-outline-danger rounded-circle"><i class="bi bi-trash3-fill"></i></button> </div>
                            @include('product.modal.delete', ["product"=> $product])
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        {{$products->links()}}
    </div>
</div>

@endsection
