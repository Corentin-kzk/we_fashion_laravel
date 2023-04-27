@extends('layouts.dashboard')

@section('content')
@include('components.forms.product', [ 'sizes' =>$sizes, 'categories' => $categories ])
@endsection
