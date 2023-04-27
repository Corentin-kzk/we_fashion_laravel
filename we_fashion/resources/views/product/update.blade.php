@extends('layouts.dashboard')

@section('content')
@include('components.forms.product', ['product' => $product, 'sizes' =>$sizes, 'categories' => $categories ])
@endsection
