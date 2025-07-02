@php
use App\Helpers\Cart;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Administration - Tea House')</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="admin-body">
    <!-- Admin Sidebar -->
    <div class="admin-sidebar">
        <div class="sidebar-header">
            <h5 class="text-white mb-0">
                <i class="fas fa-user-shield me-2"></i>Administration
            </h5>
            <small class="text-light">{{ Auth::user()->name }}</small>
        </div>
        
        <div class="sidebar-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
                       href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Tableau de bord
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" 
                       href="{{ route('admin.products.index') }}">
                        <i class="fas fa-box me-2"></i>
                        Produits
                        <span class="badge bg-light text-dark ms-auto">{{ \App\Models\Product::count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" 
                       href="{{ route('admin.categories.index') }}">
                        <i class="fas fa-tags me-2"></i>
                        Catégories
                        <span class="badge bg-light text-dark ms-auto">{{ \App\Models\Category::count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" 
                       href="{{ route('admin.users.index') }}">
                        <i class="fas fa-users me-2"></i>
                        Utilisateurs
                        <span class="badge bg-light text-dark ms-auto">{{ \App\Models\User::count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" 
                       href="{{ route('admin.orders.index') }}">
                        <i class="fas fa-shopping-cart me-2"></i>
                        Commandes
                        @php
                            $orderCount = \App\Models\Order::count();
                        @endphp
                        @if($orderCount > 0)
                            <span class="badge bg-light text-dark ms-auto">{{ $orderCount }}</span>
                        @endif
                    </a>
                </li>
            </ul>
            
            <hr class="my-3 border-light">
            
            <!-- Quick Actions -->
            <div class="sidebar-actions">
                <h6 class="text-light mb-2">Actions rapides</h6>
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus me-1"></i>Nouveau produit
                    </a>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-info">
                        <i class="fas fa-plus me-1"></i>Nouvelle catégorie
                    </a>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-user-plus me-1"></i>Nouvel utilisateur
                    </a>
                </div>
            </div>
            
            <hr class="my-3 border-light">
            
            <!-- Return to site -->
            <div class="sidebar-footer">
                <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm w-100">
                    <i class="fas fa-home me-1"></i>Retour au site
                </a>
                <form action="{{ route('logout') }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                        <i class="fas fa-sign-out-alt me-1"></i>Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Mobile Toggle Button -->
    <button class="btn btn-primary sidebar-toggle d-lg-none" type="button">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- Main Content -->
    <div class="admin-content">
        @yield('content')
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
    .admin-body {
        background-color: #F5F8F2;
    }

    .admin-sidebar {
        width: 280px;
        height: 100vh;
        background: linear-gradient(135deg, #88B44E 0%, #252C30 100%);
        box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        overflow-y: auto;
        transition: transform 0.3s ease;
    }

    .sidebar-header {
        padding: 1.5rem 1rem;
        border-bottom: 1px solid rgba(245, 248, 242, 0.2);
        text-align: center;
        background: rgba(251, 159, 56, 0.1);
    }

    .sidebar-header h5 {
        color: #F5F8F2;
        text-shadow: 1px 1px 2px rgba(37, 44, 48, 0.5);
    }

    .sidebar-header small {
        color: rgba(245, 248, 242, 0.8);
    }

    .sidebar-menu {
        padding: 1rem;
    }

    .sidebar-menu .nav-link {
        color: rgba(245, 248, 242, 0.9);
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        margin-bottom: 0.25rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        text-decoration: none;
        border: 1px solid transparent;
    }

    .sidebar-menu .nav-link:hover {
        color: #252C30;
        background-color: #F5F8F2;
        transform: translateX(5px);
        text-decoration: none;
        border-color: #88B44E;
        box-shadow: 0 2px 8px rgba(136, 180, 78, 0.3);
    }

    .sidebar-menu .nav-link.active {
        color: #252C30;
        background-color: #FB9F38;
        box-shadow: 0 4px 12px rgba(251, 159, 56, 0.4);
        border-color: #F5F8F2;
    }

    .sidebar-menu .nav-link .badge {
        font-size: 0.7rem;
        background-color: #F5F8F2 !important;
        color: #252C30 !important;
    }

    .sidebar-menu .nav-link.active .badge {
        background-color: #252C30 !important;
        color: #F5F8F2 !important;
    }

    .sidebar-actions .btn {
        margin-bottom: 0.5rem;
        border: none;
        font-weight: 600;
    }

    .sidebar-actions .btn-success {
        background-color: #88B44E;
        color: #F5F8F2;
    }

    .sidebar-actions .btn-success:hover {
        background-color: #7A9E45;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(136, 180, 78, 0.3);
    }

    .sidebar-actions .btn-info {
        background-color: #FB9F38;
        color: #252C30;
    }

    .sidebar-actions .btn-info:hover {
        background-color: #E8902F;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(251, 159, 56, 0.3);
    }

    .sidebar-actions .btn-warning {
        background-color: #F5F8F2;
        color: #252C30;
        border: 1px solid #88B44E;
    }

    .sidebar-actions .btn-warning:hover {
        background-color: #88B44E;
        color: #F5F8F2;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(136, 180, 78, 0.3);
    }

    .sidebar-actions h6 {
        color: #F5F8F2;
        font-weight: 600;
        text-shadow: 1px 1px 2px rgba(37, 44, 48, 0.5);
    }

    .sidebar-footer .btn-outline-light {
        border-color: #F5F8F2;
        color: #F5F8F2;
        background: transparent;
    }

    .sidebar-footer .btn-outline-light:hover {
        background-color: #F5F8F2;
        color: #252C30;
        border-color: #F5F8F2;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(245, 248, 242, 0.3);
    }

    .sidebar-footer .btn-outline-danger {
        border-color: #FB9F38;
        color: #FB9F38;
        background: transparent;
    }

    .sidebar-footer .btn-outline-danger:hover {
        background-color: #FB9F38;
        color: #252C30;
        border-color: #FB9F38;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(251, 159, 56, 0.3);
    }

    .sidebar-toggle {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 1050;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: none;
        background-color: #88B44E;
        border-color: #88B44E;
        color: #F5F8F2;
    }

    .sidebar-toggle:hover {
        background-color: #7A9E45;
        border-color: #7A9E45;
        transform: scale(1.05);
    }

    .admin-content {
        margin-left: 280px;
        min-height: 100vh;
        padding: 0;
    }

    .admin-content .container-fluid:first-child {
        padding-top: 2rem !important;
    }

    hr.border-light {
        border-color: rgba(245, 248, 242, 0.3) !important;
    }

    /* Mobile responsiveness */
    @media (max-width: 991px) {
        .admin-sidebar {
            transform: translateX(-100%);
        }
        
        .admin-sidebar.show {
            transform: translateX(0);
        }
        
        .admin-content {
            margin-left: 0;
        }
        
        .sidebar-toggle {
            display: block !important;
        }
        
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(37, 44, 48, 0.7);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }
    }

    /* Custom scrollbar for sidebar */
    .admin-sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .admin-sidebar::-webkit-scrollbar-track {
        background: rgba(245, 248, 242, 0.1);
    }

    .admin-sidebar::-webkit-scrollbar-thumb {
        background: rgba(245, 248, 242, 0.3);
        border-radius: 3px;
    }

    .admin-sidebar::-webkit-scrollbar-thumb:hover {
        background: rgba(245, 248, 242, 0.5);
    }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.admin-sidebar');
        const toggleBtn = document.querySelector('.sidebar-toggle');
        
        // Create overlay for mobile
        const overlay = document.createElement('div');
        overlay.className = 'sidebar-overlay';
        document.body.appendChild(overlay);
        
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            });
        }
        
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
    });
    </script>
</body>
</html> 