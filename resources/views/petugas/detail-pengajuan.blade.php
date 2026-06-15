@extends('layout')

@section('title', 'Detail Pengajuan')

@section('content')
<style>
/* ── Mobile-first: default (mobile) ── */
h4 { font-size: clamp(12px, 4vw, 18px) !important; }
h6 { font-size: clamp(10px, 3vw, 14px) !important; }
.card-body { padding: 12px !important; }
.table th, .table td { font-size: clamp(10px, 3vw, 13px) !important; padding: 6px 8px !important; }
.form-label { font-size: clamp(10px, 3vw, 13px) !important; }
.form-control, .form-select { font-size: clamp(10px, 3vw, 13px) !important; }
.btn { font-size: clamp(10px, 3vw, 14px) !important; padding: 4px 10px !important; }

/* ── Desktop overrides (≥768px) ── */
@media (min-width: 768px) {
    h4 { font-size: 1.5rem !important; }
    h6 { font-size: 1rem !important; }
    .card-body { padding: 1.5rem !important; }
    .table th, .table td { font-size: 1rem !important; padding: 0.5rem !important; }
    .form-label { font-size: 1rem !important; }
    .form-control, .form-select { font-size: 1rem !important; }
    .btn { font-size: 1rem !important; padding: 0.375rem 0.75rem !important; }
}
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h4 class="fw-bold text-success mb-4">Detail Pengajuan Pinjaman</h4>

                    {{-- Info Anggota --}}
                    <h6 class="fw-bold text-muted mb-3">Informasi Anggota</h6>
                    <table class="table table-bordered mb-4">
                        <tr>
                            <th width="40%">Nama</th>
                            <td>{{ $pengajuan->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $pengajuan->user->email }}</td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>{{ $pengajuan->user->no_telepon ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $pengajuan->user->alamat ?? '-' }}</td>
                        </tr>
                    </table>

                    {{-- Info Pinjaman --}}
                    <h6 class="fw-bold text-muted mb-3">Informasi Pinjaman</h6>
                    <table class="table table-bordered mb-4">
                        <tr>
                            <th width="40%">Jenis Pinjaman</th>
                            <td>{{ $pengajuan->jenis_pinjaman }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Pinjaman</th>
                            <td>Rp {{ number_format($pengajuan->jumlah_pinjaman, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Tenor</th>
                            <td>{{ $pengajuan->tenor_bulan }} bulan</td>
                        </tr>
                        <tr>
                            <th>Tujuan Pinjaman</th>
                            <td>{{ $pengajuan->tujuan_pinjaman }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <td>{{ $pengajuan->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th>Penghasilan Bulanan</th>
                            <td>Rp {{ number_format($pengajuan->penghasilan_bulanan, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Agunan</th>
                            <td>{{ $pengajuan->agunan ?? 'Tidak ada' }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($pengajuan->status == 'menunggu')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($pengajuan->status == 'disetujui')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengajuan</th>
                            <td>{{ $pengajuan->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>

                    {{-- Form Proses --}}
                    @if($pengajuan->status == 'menunggu')
                    <h6 class="fw-bold text-muted mb-3">Proses Pengajuan</h6>
                    <form method="POST" action="/pengajuan/{{ $pengajuan->id }}/proses">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Keputusan</label>
                            <select name="status" class="form-select" required>
                                <option value="">-- Pilih Keputusan --</option>
                                <option value="disetujui">Setujui</option>
                                <option value="ditolak">Tolak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Catatan untuk Anggota</label>
                            <textarea name="catatan_petugas" class="form-control" rows="3"
                                placeholder="Tulis catatan jika diperlukan..."></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Proses Pengajuan</button>
                            <a href="/dashboard-petugas" class="btn btn-outline-secondary">Kembali</a>
                        </div>
                    </form>
                    @else
                    <a href="/dashboard-petugas" class="btn btn-outline-secondary">Kembali</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection