@extends('layouts.admin')

@section('title', 'Détails de la commande - Administration')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Détails de la commande #{{ $order->id }}</h6>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-link text-secondary mb-0">
                            <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-3">Informations client</h6>
                            <p class="mb-1"><strong>Nom :</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
                            <p class="mb-1"><strong>Email :</strong> {{ $order->email }}</p>
                            <p class="mb-1"><strong>Téléphone :</strong> {{ $order->phone }}</p>
                            <p class="mb-1"><strong>Adresse :</strong> {{ $order->address }}</p>
                            <p class="mb-1"><strong>Code postal :</strong> {{ $order->postal_code }}</p>
                            <p class="mb-1"><strong>Ville :</strong> {{ $order->city }}</p>
                            <p class="mb-1"><strong>Pays :</strong> {{ $order->country }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-3">Détails de la commande</h6>
                            <p class="mb-1"><strong>Date :</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                            <p class="mb-1"><strong>Statut :</strong> 
                                <span class="badge badge-sm bg-gradient-{{ $order->status === 'pending' ? 'warning' : ($order->status === 'processing' ? 'info' : ($order->status === 'completed' ? 'success' : 'danger')) }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </p>
                            <p class="mb-1"><strong>Sous-total :</strong> {{ number_format($order->subtotal, 2) }} €</p>
                            <p class="mb-1"><strong>TVA :</strong> {{ number_format($order->tax, 2) }} €</p>
                            <p class="mb-1"><strong>Total :</strong> {{ number_format($order->total, 2) }} €</p>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h6 class="mb-3">Articles commandés</h6>
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Produit</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prix unitaire</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantité</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ number_format($item->price, 2) }} €</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $item->quantity }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ number_format($item->price * $item->quantity, 2) }} €</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h6 class="mb-3">Mettre à jour le statut</h6>
                            <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="status" class="form-select">
                                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>En attente</option>
                                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>En cours de traitement</option>
                                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Terminée</option>
                                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Annulée</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Mettre à jour le statut</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 