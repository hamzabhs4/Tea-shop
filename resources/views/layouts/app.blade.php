@php
use App\Helpers\Cart;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Tea House - Tea Shop Website Template')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Custom CSS for cart badge positioning only -->
    <style>
        /* Fix cart icon badge positioning only */
        .cart-icon-wrapper {
            position: relative;
            display: inline-block;
        }
        
        .cart-badge {
            position: absolute;
            top: 0;
            right: 0;
            transform: translate(50%, -50%);
            font-size: 0.7em;
            padding: .35em .65em;
            border-radius: .25rem;
            display: flex;
            justify-content: center;
            align-items: center;
            min-width: 1.5em;
            height: 1.5em;
        }
        
        /* Move titles and content down */
        .page-header {
            margin-top: 40px;
        }
        
        /* Add spacing for main content areas */
        .container-fluid.py-5:first-of-type {
            padding-top: 4rem !important;
        }
        
        /* Additional spacing for page titles */
        .container .row h1,
        .container .row h2,
        .container h1,
        .container h2 {
            margin-top: 20px;
        }
        
        /* Improve cart icon visibility */
        .nav-link.cart-link {
            font-size: 1.1rem;
            padding: 0.5rem 0.75rem;
        }

        .btn-custom-green {
            background-color: #88B44E; /* Couleur vert demandée */
            border-color: #88B44E;
            color: #fff; /* Texte blanc */
        }

        .btn-custom-green:hover {
            background-color: #7B9F45; /* Un vert légèrement plus foncé pour le survol */
            border-color: #7B9F45;
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="Logo">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">A propos</a>
                        <a href="{{ route('product') }}" class="nav-item nav-link {{ request()->routeIs('product') ? 'active' : '' }}">Produits</a>
                        <a href="{{ route('store') }}" class="nav-item nav-link {{ request()->routeIs('store') ? 'active' : '' }}">Recettes</a>
                        <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                        <a href="{{ route('cart.index') }}" class="nav-item nav-link cart-link">
                            <div class="cart-icon-wrapper">
                                <i class="bi bi-cart3"></i>
                                <span class="badge bg-success cart-badge">
                                    {{ Cart::count() }}
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="border-start ps-4 d-none d-lg-block">
@auth
    <div class="dropdown">
        <button class="btn btn-link nav-link dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
            @if(Auth::user()->is_admin && !request()->routeIs('admin.*'))
                <span class="badge bg-primary ms-1" title="Administrateur">
                    <i class="fas fa-crown"></i>
                </span>
            @endif
        </button>
        <ul class="dropdown-menu" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profil</a></li>
            @unless(Auth::user()->is_admin)
                <li><a class="dropdown-item" href="{{ route('orders.index') }}">Mes commandes</a></li>
            @endunless
            @if(Auth::user()->is_admin)
                @if(!request()->routeIs('admin.*'))
                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt me-2"></i>Panel d'administration
                    </a></li>
                @endif
            @endif
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Déconnexion</button>
                </form>
            </li>
        </ul>
    </div>
@else
    <a href="{{ route('login') }}" class="btn btn-primary">Connexion</a>
@endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Admin Navigation -->
    @include('partials.admin-nav')
    
    <!-- Content -->
    <div class="@if(Auth::check() && Auth::user()->is_admin && request()->routeIs('admin.*')) admin-content @endif">
        @yield('content')
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Notre bureau</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Rue Atlas, Oujda, Maroc</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>teahouse@gmail.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Liens rapides</h5>
                    <a class="btn btn-link" href="{{ route('about') }}">A propos </a>
                    <a class="btn btn-link" href="{{ route('contact') }}">Contact</a>
                    <a class="btn btn-link" href="{{ route('store') }}">Nos Recettes</a>
                    <a class="btn btn-link" href="{{ route('product') }}">Nos Produits</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Horaires d'ouverture</h5>
                    <p class="mb-1">Lundi - Vendredi</p>
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Samedi</p>
                    <h6 class="text-light">09:00 am - 12:00 pm</h6>
                    <p class="mb-1">Dimanche</p>
                    <h6 class="text-light">Fermé</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Newsletter</h5>
                    <p>Inscrivez-vous à notre newsletter pour recevoir les dernières nouvelles et offres exclusives.</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Votre email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">S'abonner</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Tea House</a> Tous droits réservés.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Développé par <a class="border-bottom" href="https://htmlcodex.com">Hamza/Abdo</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    @stack('scripts')
</body>
</html> 