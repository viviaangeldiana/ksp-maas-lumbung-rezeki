@extends('layout')

@section('title', 'Home')

@section('content')
<style>
/* ========================================
   Mobile-first: default styles (< 768px)
   ======================================== */
#bannerImg              { height: auto; }
.promoDiv               { height: 180px; }

.bg-success h1          { font-size: 18px !important; }
.bg-success p           { font-size: 13px !important; }

.bg-white h1            { font-size: 22px !important; }
.bg-white p             { font-size: 15px !important; }
.bg-white .btn          { font-size: 12px !important; padding: 6px 14px !important; }

.bg-light h2            { font-size: 18px !important; }
.container h2           { font-size: 18px !important; }
h2                      { font-size: clamp(14px, 4vw, 20px) !important; }

.card-title             { font-size: clamp(12px, 3vw, 16px) !important; }
.card-text              { font-size: clamp(11px, 2.5vw, 14px) !important; }

.card                   { transition: transform 0.3s ease, box-shadow 0.3s ease; }
.card:hover             { transform: translateY(-8px); box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important; }

.btn-warning            { background-color: #ffd60a !important; border-color: #ffd60a !important; }
.btn-outline-success:hover { background-color: #e63946 !important; border-color: #e63946 !important; }

/* ========================================
   Desktop overrides (>= 768px)
   ======================================== */
@media (min-width: 768px) {
    #bannerImg              { height: 330px; }
    .promoDiv               { height: 280px; }

    .bg-success h1          { font-size: inherit !important; }
    .bg-success p           { font-size: inherit !important; }

    .bg-white h1            { font-size: 2.5rem !important; }
    .bg-white p             { font-size: 1.25rem !important; }
    .bg-white .btn          { font-size: 1rem !important; padding: inherit !important; }

    .bg-light h2            { font-size: inherit !important; }
    .container h2           { font-size: inherit !important; }
    h2                      { font-size: 28px !important; }

    .card-title             { font-size: 1.25rem !important; }
    .card-text              { font-size: 1rem !important; }
}
</style>

{{-- Foto Section --}}
<div>
    <img src="/images/banner.png" class="w-100" style="object-fit:contain;">
</div>

{{-- Hero Section --}}
<div class="bg-white py-4">
    <div class="container text-center">
        <h1 class="fw-bold text-dark">Selamat Datang di <br> KSP Maas Lumbung Rezeki</h1>
        <p class="lead text-dark">Solusi Keuangan Anda</p>
        <a href="/keanggotaan" class="btn btn-danger btn-lg mt-3">Daftar Sebagai Anggota</a>
    </div>
</div>

{{-- Foto Section --}}
<div class="row g-0">
    <div class="col-6 col-md-3 promoDiv" style="overflow:hidden;">
        <img src="/images/promo1.png" class="w-100 h-300" style="object-fit:cover; object-position:top;">
    </div>
    <div class="col-6 col-md-3 promoDiv" style="overflow:hidden;">
        <img src="/images/promo2.jpg" class="w-100 h-300" style="object-fit:cover; object-position:top;">
    </div>
    <div class="col-6 col-md-3 promoDiv" style="overflow:hidden;">
        <img src="/images/promo5.png" class="w-100 h-300" style="object-fit:cover; object-position:top;">
    </div>
    <div class="col-6 col-md-3 promoDiv" style="overflow:hidden;">
        <img src="/images/promo6.png" class="w-100 h-300" style="object-fit:cover; object-position:top;">
    </div>
</div>

{{-- Layanan Section --}}
<div class="container py-5">
    <h2 class="text-center mb-4">Layanan Kami</h2>
    <div class="row g-4">
        <div class="col-12 col-md-4">
            <div class="card h-100 text-center shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-piggy-bank fs-1 text-danger"></i>
                    <h5 class="card-title mt-3">Simpanan</h5>
                    <p class="card-text">Simpanan Pokok, Wajib, Sukarela, dan Berjangka untuk masa depan lebih baik.</p>
                    <a href="/produk" class="btn btn-outline-success">Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card h-100 text-center shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-cash-coin fs-1 text-danger"></i>
                    <h5 class="card-title mt-3">Pinjaman</h5>
                    <p class="card-text">Pinjaman Mobil, Rumah, Motor, Serba Guna, dan Tanpa Agunan dengan proses mudah.</p>
                    <a href="/produk" class="btn btn-outline-success">Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card h-100 text-center shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-people fs-1 text-danger"></i>
                    <h5 class="card-title mt-3">Keanggotaan</h5>
                    <p class="card-text">Bergabung dan nikmati berbagai keuntungan menjadi anggota Koperasi kami.</p>
                    <a href="/keanggotaan" class="btn btn-outline-success">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Mengapa Kami Section --}}
<div class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4" style="font-size: 28px;">Mengapa Memilih Kami?</h2>
        <div class="row g-3 text-center">
            <div class="col-6 col-md-3">
                <i class="bi bi-shield-check fs-1 text-danger"></i>
                <p class="mt-2 fw-bold">Aman</p>
            </div>
            <div class="col-6 col-md-3">
                <i class="bi bi-lightning fs-1 text-danger"></i>
                <p class="mt-2 fw-bold">Proses Cepat</p>
            </div>
            <div class="col-6 col-md-3">
                <i class="bi bi-percent fs-1 text-danger"></i>
                <p class="mt-2 fw-bold">Bunga Rendah</p>
            </div>
            <div class="col-6 col-md-3">
                <i class="bi bi-headset fs-1 text-danger"></i>
                <p class="mt-2 fw-bold">Pelayanan Terbaik</p>
            </div>
        </div>
    </div>
</div>

@endsection