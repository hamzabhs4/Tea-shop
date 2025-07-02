@extends('layouts.app')

@section('title', 'Product - Tea House')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Nos produits</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">Produits</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Product Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp mb-5" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Nos produits</p>
                <h1 class="display-6">Découvrez nos produits</h1>
            </div>
            <div class="row g-4">
                @forelse($products as $product)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item h-100 d-flex flex-column">
                        <div class="position-relative bg-light overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="object-fit: cover;">
                            @if($product->created_at->diffInDays(now()) < 7)
                                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                            @endif
                        </div>
                        <div class="text-center p-4 flex-grow-1">
                            <a class="d-block h5 mb-2" href="">{{ $product->name }}</a>
                            <span class="text-primary me-1">{{ number_format($product->price, 2) }} €</span>
                        </div>
                        <div class="d-flex border-top mt-auto">
                            <small class="w-100 text-center py-2">
                                <a href="{{ route('product.show', $product) }}" class="btn btn-custom-green w-100 rounded-0">
                                    <i class="fa fa-shopping-cart me-2"></i>Acheter / Voir infos
                                </a>
                            </small>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>No products found.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Product End -->
@endsection 