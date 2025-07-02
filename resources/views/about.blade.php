@extends('layouts.app')

@section('title', 'About Us - Tea House')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">A propos de nous</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">A propos</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s" src="{{ asset('img/about-1.jpg') }}" alt="">
                            <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s" src="{{ asset('img/about-3.jpg') }}" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s" src="{{ asset('img/about-4.jpg') }}" alt="">
                            <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s" src="{{ asset('img/about-2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">A propos de nous</p>
                        <h1 class="display-6">L’histoire à succès de TEA House en 25 ans</h1>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="{{ asset('img/about-5.jpg') }}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <h5>Notre thé est l’une des boissons les plus populaires au monde</h5>
                            <p class="mb-0">Le thé est aujourd’hui l’une des boissons les plus consommées au monde. Chez TEA House, nous croyons que chaque tasse raconte une histoire, et nous sommes fiers de partager cette richesse culturelle avec nos clients.</p>
                        </div>
                    </div>
                    <div class="border-top mb-4"></div>
                    <div class="row g-3">
                        <div class="col-sm-8">
                            <h5>Boire une tasse de thé chaque jour est bon pour la santé</h5>
                            <p class="mb-0">Boire une tasse de thé chaque jour apporte de nombreux bienfaits pour la santé : antioxydants, hydratation, relaxation. Nos thés sont soigneusement sélectionnés pour accompagner votre bien-être au quotidien.</p>
                        </div>
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="{{ asset('img/about-6.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Social Media Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary"> Réseaux sociaux</p>
                <h1 class="display-6">Suivez-nous sur nos réseaux sociaux</h1>
            </div>
            <div class="d-flex justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.3s">
                <a class="btn btn-lg btn-light btn-lg-square rounded-circle mx-2" href=""><i class="fab fa-twitter text-primary"></i></a>
                <a class="btn btn-lg btn-light btn-lg-square rounded-circle mx-2" href=""><i class="fab fa-facebook-f text-primary"></i></a>
                <a class="btn btn-lg btn-light btn-lg-square rounded-circle mx-2" href=""><i class="fab fa-youtube text-primary"></i></a>
                <a class="btn btn-lg btn-light btn-lg-square rounded-circle mx-2" href=""><i class="fab fa-linkedin-in text-primary"></i></a>
                <a class="btn btn-lg btn-light btn-lg-square rounded-circle mx-2" href=""><i class="fab fa-instagram text-primary"></i></a>
            </div>
        </div>
    </div>
    <!-- Social Media End -->
@endsection 