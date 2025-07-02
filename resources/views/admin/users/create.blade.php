@extends('layouts.admin')

@section('title', 'Ajouter un utilisateur - Tea House')

@section('content')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="text-primary">Ajouter un utilisateur</h2>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Rôle de l'utilisateur</label>
                                <select class="form-select" id="role" name="is_admin" required>
                                    <option value="0" {{ old('is_admin', 0) == 0 ? 'selected' : '' }}>
                                        <i class="fas fa-user me-2"></i>Utilisateur Standard
                                    </option>
                                    <option value="1" {{ old('is_admin') == 1 ? 'selected' : '' }}>
                                        <i class="fas fa-user-shield me-2"></i>Administrateur
                                    </option>
                                </select>
                                <div class="form-text">
                                    <small>
                                        <strong>Utilisateur Standard:</strong> Peut naviguer, acheter des produits et gérer son profil<br>
                                        <strong>Administrateur:</strong> Accès complet à la gestion du site (produits, utilisateurs, commandes)
                                    </small>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary py-2 px-4">
                                    <i class="fas fa-user-plus me-2"></i>Ajouter l'utilisateur
                                </button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary py-2 px-4">
                                    <i class="fas fa-times me-2"></i>Annuler
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 