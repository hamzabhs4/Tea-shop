@extends('layouts.app')

@section('title', $product->name . ' - Tea House')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">{{ $product->name }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product') }}">Products</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Product Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="position-relative h-100">
                        <img class="img-fluid w-100 h-100 rounded" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="h-100">
                        <h1 class="mb-4">{{ $product->name }}</h1>
                        <p class="text-muted mb-4">{{ $product->category->name }}</p>

                        <div class="d-flex align-items-center gap-3 mb-4">
                            <h2 class="mb-0">{{ number_format($product->price, 2) }} €</h2>
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="d-flex align-items-center gap-2">
                                @csrf
                                <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 70px;">
                                <button type="submit" class="btn btn-primary btn-sm">Ajouter au panier</button>
                            </form>
                        </div>
                        
                        @if($product->benefits)
                        <div class="mb-4">
                            <h3>Bénéfices</h3>
                            <ul class="list-unstyled">
                                @foreach(explode("\n", $product->benefits) as $benefit)
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>{{ trim($benefit) }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if($product->preparation)
                        <div class="mb-4">
                            <h3>Préparation</h3>
                            <ol class="list-unstyled">
                                @foreach(explode("\n", $product->preparation) as $step)
                                    <li class="mb-2"><i class="fas fa-leaf text-success me-2"></i>{{ trim($step) }}</li>
                                @endforeach
                            </ol>
                        </div>
                        @endif

                        <div class="mb-4">
                            <h5 class="mb-3">Détails du produit:</h5>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="d-flex">
                                        <span class="text-muted me-2">Stock:</span>
                                        <span>{{ $product->stock }} unités</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex">
                                        <span class="text-muted me-2">Origine:</span>
                                        <span>{{ $product->origin ?? 'Non spécifiée' }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex">
                                        <span class="text-muted me-2">Poids:</span>
                                        <span>{{ $product->weight ?? 'Non spécifié' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Detail End -->
@endsection 