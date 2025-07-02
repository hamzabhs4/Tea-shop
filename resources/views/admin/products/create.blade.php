@extends('layouts.app')

@section('title', 'Ajouter un produit - Tea House')

@section('content')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="text-primary">Ajouter un produit</h2>
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

                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nom du produit</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="benefits" class="form-label">Bénéfices</label>
                                <textarea class="form-control" id="benefits" name="benefits" rows="4">{{ old('benefits') }}</textarea>
                                <div class="form-text">Listez les bénéfices du produit, un par ligne.</div>
                            </div>

                            <div class="mb-3">
                                <label for="preparation" class="form-label">Préparation</label>
                                <textarea class="form-control" id="preparation" name="preparation" rows="4">{{ old('preparation') }}</textarea>
                                <div class="form-text">Instructions de préparation, une étape par ligne.</div>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Prix</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" value="{{ old('price') }}" required>
                                    <span class="input-group-text">€</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Catégorie</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" min="0" value="{{ old('stock') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="weight" class="form-label">Poids</label>
                                <input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight') }}" placeholder="ex: 100g">
                            </div>

                            <div class="mb-3">
                                <label for="origin" class="form-label">Origine</label>
                                <input type="text" class="form-control" id="origin" name="origin" value="{{ old('origin') }}" placeholder="ex: Chine, Province du Yunnan">
                            </div>

                            <div class="mb-3">
                                <label for="order" class="form-label">Ordre d'affichage</label>
                                <input type="number" class="form-control" id="order" name="order" min="0" value="{{ old('order', 0) }}">
                                <div class="form-text">Les produits seront triés par cette valeur (plus la valeur est basse, plus le produit apparaît tôt).</div>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                <div class="form-text">Format accepté : JPG, JPEG, PNG, GIF. Taille maximale : 2MB</div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary py-2 px-4">Ajouter le produit</button>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary py-2 px-4">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 