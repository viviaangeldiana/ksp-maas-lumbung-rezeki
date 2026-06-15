@extends('layout')

@section('title', 'Detail Pesan')

@section('content')
<style>
/* ── Mobile-first: default (mobile) ── */
h4, h5 { font-size: clamp(12px, 4vw, 18px) !important; }
p, label { font-size: clamp(10px, 3vw, 13px) !important; }
.card-body { padding: 8px !important; }
.btn { font-size: clamp(10px, 3vw, 14px) !important; padding: 4px 8px !important; }
.table th, .table td { font-size: clamp(10px, 3vw, 13px) !important; padding: 6px 8px !important; }

/* ── Desktop overrides (≥768px) ── */
@media (min-width: 768px) {
    h4, h5 { font-size: 1.25rem !important; }
    p, label { font-size: 1rem !important; }
    .card-body { padding: 1rem !important; }
    .btn { font-size: 1rem !important; padding: 0.375rem 0.75rem !important; }
    .table th, .table td { font-size: 1rem !important; padding: 0.5rem !important; }
}
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Detail Pesan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150">Nama</th>
                            <td>: {{ $pesan->nama }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: {{ $pesan->email }}</td>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <td>: {{ $pesan->hp }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>: {{ $pesan->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:
                                @if($pesan->status == 'belum_dibaca')
                                    <span class="badge bg-danger">Belum Dibaca</span>
                                @else
                                    <span class="badge bg-success">Sudah Dibaca</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pesan</th>
                            <td>: {{ $pesan->pesan }}</td>
                        </tr>
                    </table>
                    <a href="/petugas/daftar-pesan" class="btn btn-secondary mt-3">Kembali</a>
                    @if(!$pesan->dibalas)
                        <form action="/petugas/pesan/{{ $pesan->id }}/dibalas" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success mt-3">✓ Tandai Sudah Dibalas</button>
                        </form>
                    @else
                    <button class="btn btn-success mt-3" disabled>✓ Sudah Dibalas</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection