@extends('layouts.app')

@section('title', 'Confirmation de commande - Tea House')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-4">Confirmation de commande</h2>

            @if(session('error'))
                <div class="alert alert-danger mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('order.store') }}" method="POST">
                @csrf

                <!-- Delivery Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        Informations de livraison
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name" class="form-label">Prénom</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name" class="form-label">Nom</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                             @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                         <div class="mb-3">
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                             @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Adresse</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
                             @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="postal_code" class="form-label">Code postal</label>
                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" required>
                                 @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="city" class="form-label">Ville</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" required>
                                 @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="country" class="form-label">Pays</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country') }}" required>
                                 @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="card mb-4">
                    <div class="card-header">
                        Méthode de paiement
                    </div>
                    <div class="card-body">
                         <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="payment_cod" value="cod" checked>
                                <label class="form-check-label" for="payment_cod">
                                    Payer à la livraison (COD)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="payment_card" value="card">
                                <label class="form-check-label" for="payment_card">
                                    Payer par carte
                                </label>
                            </div>
                         </div>
                         </div>
                    </div>

                <!-- Payment Information (Conditional - can be shown based on payment method) -->
                 <div class="card mb-4" id="card-payment-fields" style="display: none;">
                    <div class="card-header">
                        Informations de carte
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="card_number" class="form-label">Numéro de carte</label>
                            <input type="text" class="form-control" id="card_number" name="card_number" placeholder="XXXX XXXX XXXX XXXX" >
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="expiry_date" class="form-label">Date d'expiration (MM/AA)</label>
                                <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/AA" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cvc" class="form-label">Code de sécurité (CVC)</label>
                                <input type="text" class="form-control" id="cvc" name="cvc" placeholder="XXX" >
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100">Confirmer la commande</button>
            </form>
        </div>

        <div class="col-md-4">
            <div class="card" style="margin-top: 5rem;">
                <div class="card-header">
                    Récapitulatif de la commande
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($cart as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item['name'] }} (x{{ $item['quantity'] }})
                                <span>{{ number_format($item['price'] * $item['quantity'], 2) }} €</span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-3">
                        <p>Sous-total : <span class="float-end">{{ number_format($total, 2) }} €</span></p>
                        <p>Livraison : <span class="float-end">0.00 €</span></p>
                        <h6>Total : <span class="float-end">{{ number_format($total, 2) }} €</span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
    const cardPaymentFields = document.getElementById('card-payment-fields');

    paymentMethodRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'card') {
                cardPaymentFields.style.display = 'block';
                 cardPaymentFields.querySelectorAll('input').forEach(input => input.setAttribute('required', ''));
            } else {
                cardPaymentFields.style.display = 'none';
                 cardPaymentFields.querySelectorAll('input').forEach(input => input.removeAttribute('required'));
            }
        });
    });

     // Initial state on page load
     if (document.getElementById('payment_card').checked) {
         cardPaymentFields.style.display = 'block';
          cardPaymentFields.querySelectorAll('input').forEach(input => input.setAttribute('required', ''));
     } else {
         cardPaymentFields.style.display = 'none';
          cardPaymentFields.querySelectorAll('input').forEach(input => input.removeAttribute('required'));
     }

</script>
@endpush
@endsection 