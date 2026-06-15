@extends('layout')

@section('title', 'Dashboard Anggota')

@section('content')
<style>
/* Mobile-first: default (mobile) */
h4 { font-size: clamp(12px, 4vw, 18px) !important; }
h5, h6 { font-size: clamp(10px, 3vw, 14px) !important; }
p { font-size: clamp(10px, 3vw, 13px) !important; }
.card-body { padding: 8px !important; }
.card-body .bi { font-size: 1rem !important; }
.btn { font-size: clamp(10px, 3vw, 14px) !important; padding: 4px 8px !important; }

table thead { display: none; }
table tbody tr {
    display: block;
    margin-bottom: 12px;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    overflow: hidden;
}
table tbody td {
    display: flex !important;
    justify-content: space-between;
    align-items: flex-start;
    padding: 8px 12px !important;
    border-bottom: 1px solid #f0f0f0;
    font-size: clamp(10px, 3vw, 13px) !important;
    white-space: normal !important;
    text-align: right;
}
table tbody td:last-child { border-bottom: none; }
table tbody td::before {
    content: attr(data-label);
    font-weight: 600;
    color: #555;
    margin-right: 10px;
    flex-shrink: 0;
    text-align: left;
}

/* Desktop overrides (≥768px) */
@media (min-width: 768px) {
    h4 { font-size: 1.5rem !important; }
    h5 { font-size: 1.25rem !important; }
    h6 { font-size: 1rem !important; }
    p { font-size: 1rem !important; }
    .card-body { padding: 1rem !important; }
    .card-body .bi { font-size: 2.5rem !important; }
    .btn { font-size: 1rem !important; padding: 0.375rem 0.75rem !important; }

    table thead { display: table-header-group; }
    table tbody tr {
        display: table-row;
        margin-bottom: 0;
        border: none;
        border-radius: 0;
        overflow: visible;
    }
    table tbody td {
        display: table-cell !important;
        padding: 0.5rem !important;
        border-bottom: none;
        font-size: 1rem !important;
        text-align: left;
    }
    table tbody td::before { display: none; }
}
</style>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-bold">Selamat Datang, {{ Auth::user()->name }}!</h4>
            <p class="text-muted">Dashboard Anggota KSP Maas Lumbung Rezeki</p>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-3 mb-5">
        <div class="col-6 col-md-3">
            <div class="card text-center shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-file-text fs-1 text-danger"></i>
                    <h6 class="mt-2">Total Pengajuan</h6>
                    <h4 class="fw-bold text-success">{{ $pengajuan->count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-hourglass-split fs-1 text-danger"></i>
                    <h6 class="mt-2">Menunggu</h6>
                    <h4 class="fw-bold text-success">{{ $pengajuan->where('status', 'menunggu')->count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-check-circle fs-1 text-danger"></i>
                    <h6 class="mt-2">Disetujui</h6>
                    <h4 class="fw-bold text-success">{{ $pengajuan->where('status', 'disetujui')->count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-x-circle fs-1 text-danger"></i>
                    <h6 class="mt-2">Ditolak</h6>
                    <h4 class="fw-bold text-success">{{ $pengajuan->where('status', 'ditolak')->count() }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <a href="/ajukan-pinjaman" class="btn btn-danger">
            <i class="bi bi-plus-circle"></i> Ajukan Pinjaman Baru
        </a>
    </div>

    <h5 class="fw-bold mb-3">Riwayat Pengajuan Pinjaman</h5>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-danger">
                <tr>
                    <th>No</th>
                    <th>Jenis Pinjaman</th>
                    <th>Jumlah</th>
                    <th>Tenor</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengajuan as $index => $p)
                <tr>
                    <td data-label="No">{{ $index + 1 }}</td>
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
                    <td data-label="Catatan">{{ $p->catatan_petugas ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada pengajuan pinjaman</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <form method="POST" action="/logout" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-outline-danger">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</div>

@endsection