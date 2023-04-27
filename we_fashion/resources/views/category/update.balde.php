@extends('layouts.dashboard')

@section('content')
@include('components.forms.category', [ 'category' => $category ])
@endsection
