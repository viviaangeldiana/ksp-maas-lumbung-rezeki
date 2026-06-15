@extends('layout')

@section('title', 'Dashboard Petugas')

@section('content')
<style>
/* Mobile-first: default (mobile) */
h2, h3        { font-size: clamp(14px, 5vw, 20px) !important; }
h4            { font-size: clamp(12px, 4vw, 18px) !important; }
h5, h6        { font-size: clamp(10px, 3vw, 14px) !important; }
p             { font-size: clamp(10px, 3vw, 14px) !important; }
.card-menu p  { font-size: clamp(9px, 2.5vw, 12px) !important; }

.card-body    { padding: 6px !important; }
.card-body .bi { font-size: 1rem !important; }
.btn          { font-size: clamp(10px, 3vw, 14px) !important; padding: 4px 8px !important; }

table thead             { display: none; }
table tbody tr          { display: block; margin-bottom: 12px;
                          border: 1px solid #dee2e6; border-radius: 8px; overflow: hidden; }
table tbody td          { display: flex !important; justify-content: space-between;
                          align-items: flex-start; padding: 8px 12px !important;
                          border-bottom: 1px solid #f0f0f0;
                          font-size: clamp(10px, 3vw, 13px) !important;
                          white-space: normal !important; text-align: right; }
table tbody td:last-child { border-bottom: none; }
table tbody td::before  { content: attr(data-label); font-weight: 600;
                          color: #555; margin-right: 10px; flex-shrink: 0; text-align: left; }

/* Desktop overrides (≥768px) */
@media (min-width: 768px) {
    /* Tipografi — ukuran diperbesar untuk desktop */
    h2, h3        { font-size: 1.75rem !important; }
    h4            { font-size: 1.5rem !important; }
    h5            { font-size: 1.25rem !important; }
    h6            { font-size: 1rem !important; }
    p             { font-size: 1rem !important; }
    .card-menu p  { font-size: 1rem !important; }

    .card-body    { padding: 1rem !important; }
    .card-body .bi { font-size: 2.5rem !important; }
    .btn          { font-size: 1rem !important; padding: 0.375rem 0.75rem !important; }

    table thead       { display: table-header-group; }
    table tbody tr    { display: table-row; margin-bottom: 0;
                        border: none; border-radius: 0; overflow: visible; }
    table tbody td    { display: table-cell !important; padding: 0.5rem !important;
                        border-bottom: none; font-size: 1rem !important; text-align: left; }
    table tbody td::before { display: none; }
}
</style>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-bold">Dashboard Petugas</h4>
            <p class="text-muted">Selamat datang, {{ Auth::user()->name }}</p>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Statistik --}}
    <div class="row g-3 mb-5">
        <div class="col-4 col-md-4">
            <div class="card text-center shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-people fs-1 text-danger"></i>
                    <h6 class="mt-2">Total Anggota</h6>
                    <h4 class="fw-bold">{{ $totalAnggota }}</h4>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-4">
            <div class="card text-center shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-file-text fs-1 text-danger"></i>
                    <h6 class="mt-2">Total Pengajuan</h6>
                    <h4 class="fw-bold">{{ $totalPengajuan }}</h4>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-4">
            <div class="card text-center shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-hourglass-split fs-1 text-danger"></i>
                    <h6 class="mt-2">Menunggu</h6>
                    <h4 class="fw-bold">{{ $menunggu }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Menu --}}
    <div class="row g-3 mb-5">
        <div class="col-4 col-md-4">
            <a href="/petugas/kelola-akun" class="text-decoration-none">
                <div class="card card-menu text-center p-3 shadow-sm h-100">
                    <i class="bi bi-person-plus fs-1 text-danger"></i>
                    <p class="mt-2 fw-bold">Kelola Akun Petugas</p>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-4">
            <a href="/petugas/kelola-anggota" class="text-decoration-none">
                <div class="card card-menu text-center p-3 shadow-sm h-100">
                    <i class="bi bi-people fs-1 text-danger"></i>
                    <p class="mt-2 fw-bold">Kelola Anggota</p>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-4">
            <a href="/petugas/daftar-pesan" class="text-decoration-none">
                <div class="card card-menu text-center p-3 shadow-sm h-100">
                    <i class="bi bi-envelope fs-1 text-danger"></i>
                    <p class="mt-2 fw-bold">Daftar Pesan Masuk</p>
                </div>
            </a>
        </div>
    </div>

    {{-- Tabel Pengajuan --}}
    <h5 class="fw-bold mb-3">Daftar Pengajuan Pinjaman</h5>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-danger">
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Jenis Pinjaman</th>
                    <th>Jumlah</th>
                    <th>Tenor</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengajuan as $index => $p)
                <tr>
                    <td data-label="No">{{ $index + 1 }}</td>
                    <td data-label="Nama Anggota">{{ $p->user->name }}</td>
                    <td data-label="Jenis Pinjaman">{{ $p->jenis_pinjaman }}</td>
                    <td data-label="Jumlah">Rp {{ number_format($p->jumlah_pinjaman, 0, ',', '.') }}</td>
                    <td data-label="Tenor">{{ $p->tenor_bulan }} bulan</td>
                    <td data-label="Status">
                        @if($p->status == 'menunggu')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @elseif($p->status == 'disetujui')
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                    <td data-label="Tanggal">{{ $p->created_at->format('d/m/Y') }}</td>
                    <td data-label="Aksi">
                        <a href="/pengajuan/{{ $p->id }}" class="btn btn-sm btn-primary">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">Belum ada pengajuan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Logout --}}
    <form method="POST" action="/logout" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-outline-danger">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</div>

@endsection