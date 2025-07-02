@extends('layouts.admin')

@section('title', 'Commandes - Administration')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Liste des commandes</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-success text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-success text-xxs font-weight-bolder opacity-7 ps-2">Client</th>
                                    <th class="text-center text-uppercase text-success text-xxs font-weight-bolder opacity-7">Date</th>
                                    <th class="text-center text-uppercase text-success text-xxs font-weight-bolder opacity-7">Total</th>
                                    <th class="text-center text-uppercase text-success text-xxs font-weight-bolder opacity-7">Statut</th>
                                    <th class="text-center text-uppercase text-success text-xxs font-weight-bolder opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td class="ps-4">
                                            <span class="text-dark text-xs font-weight-bold">#{{ $order->id }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-dark text-sm">{{ $order->first_name }} {{ $order->last_name }}</h6>
                                                    <p class="text-dark text-xs mb-0">{{ $order->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-dark text-xs font-weight-bold">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-dark text-xs font-weight-bold">{{ number_format($order->total, 2) }} €</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-{{ $order->status === 'pending' ? 'warning' : ($order->status === 'processing' ? 'info' : ($order->status === 'completed' ? 'success' : 'danger')) }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-link text-success mb-0">
                                                <i class="fas fa-eye text-xs"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <p class="text-muted mb-0">Aucune commande trouvée.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 