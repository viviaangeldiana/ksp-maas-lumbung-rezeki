<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Simpan Pinjam Maas Lumbung Rezeki - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
    /* Mobile-first: default (mobile) */
    .navbar-brand span { font-size: clamp(12px, 4vw, 18px); }
    .navbar-brand img { height: clamp(25px, 6vw, 40px); }
    .navbar-toggler { padding: 2px 6px; font-size: clamp(12px, 4vw, 18px); }
    .bg-success h1 { font-size: 18px !important; }
    .bg-success p { font-size: 13px !important; }
    .bg-success .btn { font-size: 13px !important; padding: 6px 12px !important; }
    .card-title { font-size: clamp(12px, 3vw, 16px) !important; }
    .card-text { font-size: clamp(11px, 2.5vw, 14px) !important; }
    .card .btn { font-size: clamp(11px, 2.5vw, 14px) !important; }
    .bi.fs-1 { font-size: clamp(1.5rem, 5vw, 2rem) !important; }
    h2 { font-size: clamp(14px, 4vw, 20px) !important; }
    footer { font-size: clamp(10px, 2.5vw, 14px) !important; padding: 10px !important; }
    footer p { margin-bottom: 2px !important; }
    .navbar-brand { font-weight: bold; }
    footer { background-color: #000000; color: white; }
    .btn-danger { background-color: #e30613 !important; border-color: #e30613 !important; }
    .bg-danger { background-color: #e30613 !important; }
    .text-danger { color: #e30613 !important; }
    body { display: flex; flex-direction: column; min-height: 100vh; }
    main { flex: 1;}

    /* Desktop overrides (≥768px) */
    @media (min-width: 768px) {
        .navbar-brand span { font-size: 1rem; }
        .navbar-brand img { height: 40px; }
        .navbar-toggler { padding: 0.25rem 0.75rem; font-size: 1rem; }
        .bg-success h1 { font-size: inherit !important; }
        .bg-success p { font-size: inherit !important; }
        .bg-success .btn { font-size: inherit !important; padding: inherit !important; }
        .card-title { font-size: 1.25rem !important; }
        .card-text { font-size: 1rem !important; }
        .card .btn { font-size: 1rem !important; }
        .bi.fs-1 { font-size: 2.5rem !important; }
        h2 { font-size: 2rem !important; }
        footer { font-size: 1rem !important; padding: 1.5rem !important; }
        footer p { margin-bottom: 0.25rem !important; }
    }
    </style>
    <style>
    .navbar { background-color: #000000 !important; }
    .bg-success { background-color: #000000 !important; }
    .text-success { color: #000000 !important; }
    .btn-success { background-color: #000000 !important; border-color: #000000 !important; }
    .btn-outline-success { color: #e30613 !important; border-color: #e30613 !important; }
    .btn-outline-success:hover { background-color: #e30613 !important; color: white !important; border-color: #e30613 !important; }
    .card-header.bg-success { background-color: #e30613 !important; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="/images/logo.png" alt="Logo" height="40" class="me-2">
            <span>KSP Maas Lumbung Rezeki</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/profil">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="/keanggotaan">Keanggotaan</a></li>
                <li class="nav-item"><a class="nav-link" href="/produk">Produk Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="/kontak">Hubungi Kami</a></li>
                <li class="nav-item">
                @auth
                    @if(Auth::user()->role === 'petugas')
                        <li class="nav-item dropdown">
                            <a class="nav-link btn btn-danger text-white px-3 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="/dashboard-petugas">Dashboard</a></li>
                                <li><a class="dropdown-item" href="/petugas/ganti-password">Ganti Password</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="/logout" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link btn btn-danger text-dark px-3 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="/dashboard-anggota">Dashboard</a></li>
                                <li><a class="dropdown-item" href="/anggota/ganti-password">Ganti Password</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link btn text-dark px-3" href="/login">Login</a>
                    </li>
                @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

<div style="height:4px; background-color: #e30613;"></div>

<main>
    @yield('content')
</main>

<footer class="py-4">
    <div class="container text-center">
        <p class="mb-0">Koperasi Simpan Pinjam Maas Lumbung Rezeki. &copy; 2019 All rights reserved.</p>
        <p class="mb-0">Ruko Palm Spring Blok D2 No. 8, Batam Centre</p>
        <p class="mb-0">Telp: 0778 416 3927</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>