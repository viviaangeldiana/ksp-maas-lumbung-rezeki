@extends('layout')

@section('title', 'Ajukan Pinjaman')

@section('content')
<style>
/* Mobile-first: default (mobile) */
h4 { font-size: clamp(12px, 4vw, 18px) !important; }
p, label { font-size: clamp(10px, 3vw, 13px) !important; }
.card-body { padding: 8px !important; }
.btn { font-size: clamp(10px, 3vw, 14px) !important; padding: 4px 8px !important; }
.form-control, .form-select { font-size: clamp(10px, 3vw, 14px) !important; }

/* Desktop overrides (≥768px) */
@media (min-width: 768px) {
    h4 { font-size: 1.5rem !important; }
    p, label { font-size: 1rem !important; }
    .card-body { padding: 1rem !important; }
    .btn { font-size: 1rem !important; padding: 0.375rem 0.75rem !important; }
    .form-control, .form-select { font-size: 1rem !important; }
}
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h4 class="fw-bold text-success mb-4">Form Pengajuan Pinjaman</h4>

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="/ajukan-pinjaman">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Jenis Pinjaman</label>
                            <select name="jenis_pinjaman" class="form-select" required>
                                <option value="">-- Pilih Jenis Pinjaman --</option>
                                <option value="Pinjaman Mobil">Pinjaman Mobil</option>
                                <option value="Pinjaman Rumah">Pinjaman Rumah</option>
                                <option value="Pinjaman Motor">Pinjaman Motor</option>
                                <option value="Pinjaman Serba Guna">Pinjaman Serba Guna</option>
                                <option value="Pinjaman Tanpa Agunan">Pinjaman Tanpa Agunan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Pinjaman (Rp)</label>
                            <input type="number" name="jumlah_pinjaman" class="form-control"
                                placeholder="Contoh: 10000000" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tenor (Bulan)</label>
                            <select name="tenor_bulan" class="form-select" required>
                                <option value="">-- Pilih Tenor --</option>
                                <option value="6">6 Bulan</option>
                                <option value="12">12 Bulan</option>
                                <option value="24">24 Bulan</option>
                                <option value="36">36 Bulan</option>
                                <option value="48">48 Bulan</option>
                                <option value="60">60 Bulan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tujuan Pinjaman</label>
                            <textarea name="tujuan_pinjaman" class="form-control" rows="2"
                                placeholder="Jelaskan tujuan pinjaman" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control"
                                placeholder="Masukkan pekerjaan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penghasilan Bulanan (Rp)</label>
                            <input type="number" name="penghasilan_bulanan" class="form-control"
                                placeholder="Contoh: 5000000" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agunan (Jaminan)</label>
                            <input type="text" name="agunan" class="form-control"
                                placeholder="Kosongkan jika tidak ada agunan">
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Kirim Pengajuan</button>
                            <a href="/dashboard-anggota" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection