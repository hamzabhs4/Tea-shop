@extends('layouts.admin')

@section('title', 'Modifier un utilisateur - Tea House')

@section('content')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="text-primary">Modifier l'utilisateur</h2>
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

                        <form action="{{ route('admin.users.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="form-text">Laissez vide pour conserver le mot de passe actuel</div>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Rôle de l'utilisateur</label>
                                <select class="form-select" id="role" name="is_admin" required>
                                    <option value="0" {{ old('is_admin', $user->is_admin) == 0 ? 'selected' : '' }}>
                                        <i class="fas fa-user me-2"></i>Utilisateur Standard
                                    </option>
                                    <option value="1" {{ old('is_admin', $user->is_admin) == 1 ? 'selected' : '' }}>
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
                                    <i class="fas fa-save me-2"></i>Mettre à jour l'utilisateur
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