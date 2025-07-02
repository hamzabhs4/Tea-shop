@extends('layouts.admin')

@section('title', 'Tableau de bord administrateur - Tea House')

@section('content')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-primary mb-4">
                    <i class="fas fa-tachometer-alt me-2"></i>Tableau de bord administrateur
                </h1>
                <p class="text-muted mb-4">Vue d'ensemble de votre magasin de thé</p>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="row g-4 mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-body text-center p-4">
                        <div class="text-primary mb-3">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <h3 class="text-primary">{{ $totalUsers }}</h3>
                        <p class="mb-0">Utilisateurs</p>
                        <small class="text-muted">Total inscrit</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-body text-center p-4">
                        <div class="text-primary mb-3">
                            <i class="fas fa-box fa-2x"></i>
                        </div>
                        <h3 class="text-primary">{{ $totalProducts }}</h3>
                        <p class="mb-0">Produits</p>
                        <small class="text-muted">En catalogue</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-body text-center p-4">
                        <div class="text-primary mb-3">
                            <i class="fas fa-shopping-cart fa-2x"></i>
                        </div>
                        <h3 class="text-primary">{{ $totalOrders }}</h3>
                        <p class="mb-0">Commandes</p>
                        <small class="text-muted">Total reçues</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Commandes récentes -->
            <div class="col-lg-12 mb-4">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="text-primary mb-0">
                                <i class="fas fa-shopping-cart me-2"></i>Commandes récentes
                            </h4>
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-primary btn-sm">
                                Voir tout
                            </a>
                        </div>
                        @if($recentOrders->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Client</th>
                                            <th>Statut</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentOrders as $order)
                                            <tr>
                                                <td><strong>#{{ $order->id }}</strong></td>
                                                <td>
                                                    {{ $order->first_name }} {{ $order->last_name }}<br>
                                                    <small class="text-muted">{{ $order->email }}</small>
                                                </td>
                                                <td>
                                                    @php
                                                        $statusClass = match($order->status) {
                                                            'pending' => 'warning',
                                                            'processing' => 'info',
                                                            'completed' => 'success',
                                                            'cancelled' => 'danger',
                                                            default => 'secondary'
                                                        };
                                                        $statusText = match($order->status) {
                                                            'pending' => 'En attente',
                                                            'processing' => 'En cours',
                                                            'completed' => 'Terminée',
                                                            'cancelled' => 'Annulée',
                                                            default => 'Inconnu'
                                                        };
                                                    @endphp
                                                    <span class="badge rounded-pill bg-{{ $statusClass }}">
                                                        {{ $statusText }}
                                                    </span>
                                                </td>
                                                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                                <td>{{ number_format($order->total, 2) }} €</td>
                                                <td>
                                                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Aucune commande récente.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 