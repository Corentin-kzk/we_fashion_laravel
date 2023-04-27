@extends('layouts.dashboard')

@section('content')


//chck if exist
@include('components.forms.product', ['product' => $product, 'sizes' =>$sizes, 'categories' => $categories ])

@endsection
