@extends('layout')

@section('title', 'Produk Kami')

@section('content')
<style>
/* Mobile-first: default (mobile) */
h2 { font-size: clamp(14px, 7vw, 20px) !important; }
h4 { font-size: clamp(12px, 4vw, 18px) !important; }
p { font-size: clamp(11px, 3vw, 14px) !important; }

/* Desktop overrides (≥768px) */
@media (min-width: 768px) {
    h2 { font-size: 2rem !important; }
    h4 { font-size: 1.5rem !important; }
    p { font-size: 1rem !important; }
}
</style>

<div class="container py-5">
    <h2 class="text-center fw-bold mb-5">Produk Kami</h2>

    {{-- Simpanan --}}
    <h4 class="text-success fw-bold mb-4"><i class="bi bi-piggy-bank"></i> Simpanan Anggota</h4>
    <div class="row g-4 mb-5">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-danger">
                <div class="card-body text-center">
                    <i class="bi bi-piggy-bank fs-1 text-danger"></i>
                    <h6 class="fw-bold mt-3">Simpanan Pokok</h6>
                    <p class="small text-muted">Simpanan yang dibayarkan satu kali saat pertama kali menjadi anggota koperasi.</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-danger">
                <div class="card-body text-center">
                    <i class="bi bi-calendar-check fs-1 text-danger"></i>
                    <h6 class="fw-bold mt-3">Simpanan Wajib</h6>
                    <p class="small text-muted">Simpanan yang wajib dibayarkan setiap bulan oleh seluruh anggota koperasi.</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-danger">
                <div class="card-body text-center">
                    <i class="bi bi-wallet2 fs-1 text-danger"></i>
                    <h6 class="fw-bold mt-3">Simpanan Sukarela</h6>
                    <p class="small text-muted">Simpanan yang besarannya tidak ditentukan, tergantung dengan kemampuan Anggota. Simpanan dapat disetorkan dan diambil setiap saat.</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-danger">
                <div class="card-body text-center">
                    <i class="bi bi-clock-history fs-1 text-danger"></i>
                    <h6 class="fw-bold mt-3">Simpanan Berjangka</h6>
                    <p class="small text-muted">Simpanan Anggota selama jangka waktu tertentu, disesuaikan dengan bunga yang berjalan dipasaran.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Pinjaman --}}
    <h4 class="text-success fw-bold mb-4"><i class="bi bi-cash-coin"></i> Pinjaman Anggota</h4>
    <div class="row g-4">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-danger">
                <div class="card-body text-center">
                    <i class="bi bi-car-front fs-1 text-danger"></i>
                    <h6 class="fw-bold mt-3">Pinjaman Mobil</h6>
                    <p class="small text-muted">Pembiayaan pembelian kendaraan roda empat dengan cicilan ringan dan bunga kompetitif.</p>
                    <a href="/login" class="btn btn-sm btn-danger">Ajukan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-danger">
                <div class="card-body text-center">
                    <i class="bi bi-house fs-1 text-danger"></i>
                    <h6 class="fw-bold mt-3">Pinjaman Rumah</h6>
                    <p class="small text-muted">Pembiayaan pembelian atau renovasi rumah dengan tenor panjang dan proses mudah.</p>
                    <a href="/login" class="btn btn-sm btn-danger">Ajukan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-danger">
                <div class="card-body text-center">
                    <i class="bi bi-bicycle fs-1 text-danger"></i>
                    <h6 class="fw-bold mt-3">Pinjaman Motor</h6>
                    <p class="small text-muted">Pembiayaan pembelian kendaraan roda dua dengan proses cepat dan mudah.</p>
                    <a href="/login" class="btn btn-sm btn-danger">Ajukan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-danger">
                <div class="card-body text-center">
                    <i class="bi bi-bag fs-1 text-danger"></i>
                    <h6 class="fw-bold mt-3">Pinjaman Serba Guna</h6>
                    <p class="small text-muted">Pinjaman untuk berbagai kebutuhan seperti pendidikan, kesehatan, dan usaha.</p>
                    <a href="/login" class="btn btn-sm btn-danger">Ajukan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-danger">
                <div class="card-body text-center">
                    <i class="bi bi-hand-thumbs-up fs-1 text-danger"></i>
                    <h6 class="fw-bold mt-3">Pinjaman Tanpa Agunan</h6>
                    <p class="small text-muted">Pinjaman tanpa jaminan untuk anggota dengan rekam jejak simpanan yang baik.</p>
                    <a href="/login" class="btn btn-sm btn-danger">Ajukan Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection