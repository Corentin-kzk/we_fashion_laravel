@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
    <div class="row">
        <h1>Categories</h1>
    </div>
    <div class="row justify-content-end align-items-center my-3">
        <div class="col-2 clearfix">
            <a href="{{route('admin.categories.create')}}" class="btn btn-outline-dark float-end">Nouveau produit <i class="bi bi-plus"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-6 table-responsive">
            <table class="table table-sm align-middle table-borderless">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Editer / Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->label}}</td>
                        <td>{{$category->slug}}</td>

                        <td>
                            <div class="btn-group btn-group-lg" role="group" aria-label="Large button group">
                                <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-outline-secondary">Editer <i class="bi bi-pencil-square"></i></a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$category->id}}" class="btn btn-outline-danger">Supprimer <i class="bi bi-trash3-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    @include('category.modal.delete', ["category"=> $category])
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>



@endsection
