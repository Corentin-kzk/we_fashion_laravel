@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center ">
        <div class="col-md-10  mb-5">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="text-center my-5">
                        <p class="text-success cdr fs-3">
                            {{ __('Bienvenue') }}
                            {{Auth::user()->name}}
                            {{ __('!') }}
                        </p>
                    </div>

                    <div>
                        <div class="row  justify-content-around">
                            <a href="{{route('admin.products')}}" class="col-lg-5 text-secondary">
                                <div class="card text-bg-light p-4">
                                    <div class="border border-light rounded w-100 h-100 border-4 text-center position-relative" style="border-style: dashed!important;">
                                        <div class="fs-5 m-5 fs-4">
                                            <i class="bi bi-archive-fill"></i>
                                            <h2>Produits</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('admin.categories.index')}}" class="col-lg-5 text-secondary">
                                <div class="card text-bg-light p-4">
                                    <div class="border border-light rounded w-100 h-100 border-4 text-center position-relative" style="border-style: dashed!important;">
                                        <div class="fs-5 m-5 fs-4">
                                            <i class="bi bi-filter-square-fill"></i>
                                            <h2>Categories</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
@endsection
