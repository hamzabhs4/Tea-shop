@extends('layouts.app')

@section('title', 'Tea House - Tea Shop Website Template')

@section('content')
<!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('img/carousel-1.jpg') }}" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <p class="fs-4 text-white animated zoomIn">Bienvenue chez <strong class="text-dark">TEA House</strong></p>
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Production de thés de qualité et biologique</h1>
                                    <a href="{{ route('product') }}" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Découvrir nos produits</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('img/carousel-2.jpg') }}" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <p class="fs-4 text-white animated zoomIn">Bienvenue chez <strong class="text-dark">TEA House</strong></p>
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Production de thés de qualité et biologique</h1>
                                    <a href="{{ route('product') }}" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Découvrir nos produits</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
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
                        <h1 class="display-6">L'histoire à succès de TEA House en 25 ans</h1>
            </div>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="{{ asset('img/about-5.jpg') }}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <h5> Notre thé est l'une des boissons les plus populaires au monde</h5>
                            <p class="mb-0">Le thé est aujourd'hui l'une des boissons les plus consommées au monde. Chez TEA House, nous croyons que chaque tasse raconte une histoire, et nous sommes fiers de partager cette richesse culturelle avec nos clients.</p>
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

    <!-- Products Start -->
    <div class="container-fluid product py-5 my-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Nos produits</p>
                <h1 class="display-6">Le thé a un effet positif complexe sur le corps</h1>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                <a href="" class="d-block product-item rounded">
                    <img src="{{ asset('img/product-1.jpg') }}" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Thé vert</h4>
                        <span class="text-body">Le thé vert est riche en antioxydants et réputé pour ses vertus détoxifiantes. Sa saveur fraîche et végétale en fait une boisson idéale pour démarrer la journée en douceur.</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="{{ asset('img/product-2.jpg') }}" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Thé noir</h4>
                        <span class="text-body">Thé intense et corsé, le thé noir est parfait pour un moment de concentration ou un petit-déjeuner énergisant. Il est souvent dégusté nature ou accompagné de lait.</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="{{ asset('img/product-3.jpg') }}" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Thé aromatisé</h4>
                        <span class="text-body">Le thé épicé mélange les arômes du thé avec des épices chaleureuses comme la cannelle, le gingembre ou la cardamome. C'est une boisson réconfortante, idéale pour les journées fraîches.</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Avis clients</p>
                <h1 class="display-6">Ce que nos clients disent de notre thé</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.5s">
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">"Le thé vert de TEA House est tout simplement incroyable. Il a transformé ma routine matinale. Je me sens plus énergique et détendue à la fois."</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="img/testimonial-1.jpg" alt="">
                        <div class="text-start ms-3">
                            <h5>Yasmine Bowli</h5>
                            <span class="text-primary">Professeure</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">"J'ai commandé plusieurs variétés pour tester, et je suis conquise ! Le service est rapide et le packaging très soigné."</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="img/testimonial-2.jpg" alt="">
                        <div class="text-start ms-3">
                            <h5>Samir Zaki</h5>
                            <span class="text-primary">Docteur</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">"Une vraie découverte ! Chaque thé a une personnalité différente. On sent que les ingrédients sont choisis avec soin."</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="img/testimonial-3.jpg" alt="">
                        <div class="text-start ms-3">
                            <h5>Sara Una</h5>
                            <span class="text-primary">Directrice</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection 