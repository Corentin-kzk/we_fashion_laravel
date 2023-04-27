@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
    <div class="row">
        <h1>Produits</h1>
    </div>
    <div class="row justify-content-end align-items-center my-3">
        <div class="col-2 clearfix">
            <button type="button" class="btn btn-outline-dark float-end" data-bs-toggle="modal" data-bs-target="#addProductModal">Nouveau produit <i class="bi bi-plus"></i></button>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-striped table-hover">
                <caption>Liste des produits</caption>
                <thead>
                    <tr>
                        <th scope="col">#Réferences</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Categorie(s)</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Etat</th>
                        <th scope="col" class="text-center">Editer</th>
                        <th scope="col" class="text-center">Supprimer</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider ">
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->reference}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{ implode(', ', array_column($product->categories->toArray(), 'label')) }}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->status}}</td>
                        <td>
                            <div><a href="{{route('admin.product.edit', $product)}}" class="d-block mx-auto btn btn-outline-secondary rounded-circle"><i class="bi bi-pencil-square"></i></a></div>
                        </td>
                        <td>
                            <div class="d-block mx-auto"><button type="button"  data-bs-toggle="modal" data-bs-target="#deleteModal-{{$product->id}}"  class="d-block mx-auto btn btn-outline-danger rounded-circle"><i class="bi bi-trash3-fill"></i></button> </div>
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
    @include('product.modal.create')
</div>

@endsection
