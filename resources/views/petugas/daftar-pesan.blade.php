@extends('layout')

@section('title', 'Daftar Pesan')

@section('content')
<style>
/* ── Mobile-first: default (mobile) ── */
h4, h5 { font-size: clamp(12px, 4vw, 18px) !important; }
p, label { font-size: clamp(10px, 3vw, 13px) !important; }
.card-body { padding: 8px !important; }
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

/* ── Desktop overrides (≥768px) ── */
@media (min-width: 768px) {
    h4, h5 { font-size: 1.5rem !important; }
    p, label { font-size: 1rem !important; }
    .card-body { padding: 1rem !important; }
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
    <h4 class="fw-bold mb-4">Daftar Pesan Masuk</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Pesan</th>
                            <th>Status</th>
                            <th>Dibalas</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesan as $index => $p)
                        <tr>
                            <td data-label="No">{{ $index + 1 }}</td>
                            <td data-label="Nama">{{ $p->nama }}</td>
                            <td data-label="Email">{{ $p->email }}</td>
                            <td data-label="No HP">{{ $p->hp }}</td>
                            <td data-label="Pesan">{{ Str::limit($p->pesan, 50) }}</td>
                            <td data-label="Status">
                                @if($p->status == 'belum_dibaca')
                                    <span class="badge bg-danger">Belum Dibaca</span>
                                @else
                                    <span class="badge bg-success">Sudah Dibaca</span>
                                @endif
                            </td>
                            <td data-label="Dibalas">
                                @if($p->dibalas)
                                    <span class="badge bg-success">Sudah</span>
                                @else
                                    <span class="badge bg-warning text-dark">Belum</span>
                                @endif
                            </td>
                            <td data-label="Tanggal">{{ $p->created_at->format('d/m/Y') }}</td>
                            <td data-label="Aksi">
                                <a href="/petugas/pesan/{{ $p->id }}" class="btn btn-sm btn-danger">Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Belum ada pesan masuk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection