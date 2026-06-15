@extends('layout')

@section('title', 'Kelola Anggota')

@section('content')
<style>
/* ── Mobile-first: default (mobile) ── */
h4, h5 { font-size: clamp(12px, 4vw, 18px) !important; }
p, label { font-size: clamp(10px, 3vw, 13px) !important; }
.card-body { padding: 8px !important; }
.btn { font-size: clamp(10px, 3vw, 14px) !important; padding: 4px 8px !important; }
.form-control { font-size: clamp(10px, 3vw, 14px) !important; }

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
    .form-control { font-size: 1rem !important; }

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
    <h4 class="fw-bold mb-4">Kelola Anggota</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form Buat Akun Anggota --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0">Buat Akun Anggota Baru</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="/petugas/buat-akun-anggota">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">No. Anggota</label>
                        <input type="text" name="no_anggota" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" required>
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password', this)">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger mt-3">Buat Akun</button>
            </form>
        </div>
    </div>

    {{-- Daftar Anggota --}}
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0">Daftar Anggota</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Anggota</th>
                            <th>No. Telepon</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($anggota as $index => $a)
                        <tr>
                            <td data-label="No">{{ $index + 1 }}</td>
                            <td data-label="Nama">{{ $a->name }}</td>
                            <td data-label="Email">{{ $a->email }}</td>
                            <td data-label="No. Anggota">{{ $a->no_anggota }}</td>
                            <td data-label="No. Telepon">{{ $a->no_telepon }}</td>
                            <td data-label="Status">
                                @if($a->status == 'aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td data-label="Aksi">
                                @if($a->status == 'aktif')
                                    <form action="/petugas/anggota/{{ $a->id }}/nonaktifkan" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Nonaktifkan</button>
                                    </form>
                                @else
                                    <form action="/petugas/anggota/{{ $a->id }}/aktifkan" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Aktifkan</button>
                                    </form>
                                @endif
                                <form action="/petugas/anggota/{{ $a->id }}/reset-password" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Reset password menjadi password123?')">Reset Password</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada anggota.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword(id, btn) {
    const input = document.getElementById(id);
    if (input.type === 'password') {
        input.type = 'text';
        btn.innerHTML = '<i class="bi bi-eye-slash"></i>';
    } else {
        input.type = 'password';
        btn.innerHTML = '<i class="bi bi-eye"></i>';
    }
}
</script>

@endsection