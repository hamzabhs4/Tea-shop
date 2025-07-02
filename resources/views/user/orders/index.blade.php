@extends('layouts.app')

@section('title', 'Mes commandes - Tea House')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Mes commandes</h2>

    @if($orders->isEmpty())
        <p>Vous n'avez pas encore passé de commande.</p>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Commande</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Statut</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ number_format($order->total, 2) }} €</td>
                            <td>
                                <span class="badge badge-sm bg-{{ $order->status === 'pending' ? 'warning' : ($order->status === 'processing' ? 'info' : ($order->status === 'completed' ? 'success' : 'danger')) }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>
                                {{-- Link to view order details (if you create a show method) --}}
                                {{-- <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary">Voir détails</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $orders->links() }}
        </div>
    @endif
</div>
@endsection 