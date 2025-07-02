@extends('layouts.app')

@section('title', 'Confirmation de commande - Tea House')

@section('content')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                            <h2 class="mt-3">Commande confirmée !</h2>
                            <p class="text-muted">Merci pour votre commande. Voici les détails :</p>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5>Informations client</h5>
                                <p>
                                    {{ $order->first_name }} {{ $order->last_name }}<br>
                                    {{ $order->email }}<br>
                                    {{ $order->phone }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h5>Adresse de livraison</h5>
                                <p>
                                    {{ $order->address }}<br>
                                    {{ $order->postal_code }} {{ $order->city }}<br>
                                    {{ $order->country }}
                                </p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="mb-3">Détails de la commande</h6>
                                <p class="mb-1"><strong>Date :</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                                <p class="mb-1"><strong>Statut :</strong> 
                                    <span class="badge badge-sm bg-success">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </p>
                                <p class="mb-1"><strong>Total :</strong> {{ number_format($order->total, 2) }} €</p>
                            </div>
                        </div>

                        <h5 class="mb-3">Détails de la commande</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Quantité</th>
                                        <th class="text-end">Prix</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td class="text-end">{{ number_format($item->price * $item->quantity, 2) }} €</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('home') }}" class="btn btn-primary">Retour à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 