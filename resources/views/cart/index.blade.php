@extends('layouts.app')

@section('title', 'Panier - Tea House')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Votre Panier</h2>

    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

     @if(session('error'))
        <div class="alert alert-danger mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if(empty($cart))
        <p>Votre panier est vide.</p>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Sous-total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                     @if(isset($item['image']))
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px; height: 50px; object-fit: cover;" class="me-3">
                                    @endif
                                    {{ $item['name'] }}
                                </div>
                            </td>
                            <td>{{ number_format($item['price'], 2) }} €</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm me-2" style="width: 60px;">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Mettre à jour</button>
                                </form>
                            </td>
                            <td>{{ number_format($item['price'] * $item['quantity'], 2) }} €</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Récapitulatif du panier</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sous-total:
                                <span>{{ number_format($total, 2) }} €</span>
                            </li>
                             {{-- TVA removed --}}
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Frais de livraison:
                                <span>Gratuit</span> {{-- Assuming free delivery for now --}}
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Total:</strong>
                                <strong>{{ number_format($total, 2) }} €</strong>
                            </li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="btn btn-primary w-100 mt-3">
                            Passer à la caisse
                        </a>
                        <form action="{{ route('cart.clear') }}" method="POST" class="mt-2">
                             @csrf
                             @method('DELETE')
                            <button type="submit" class="btn btn-secondary w-100">
                                <i class="fas fa-trash"></i> Vider le panier
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection