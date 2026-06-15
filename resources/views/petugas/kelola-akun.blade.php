@extends('layout')

@section('title', 'Kelola Akun Petugas')

@section('content')
<style>
/* ── Mobile-first: default (mobile) ── */
h4 { font-size: clamp(12px, 5vw, 18px) !important; }
h5 { font-size: clamp(12px, 3vw, 18px) !important; }
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
    h4 { font-size: 1.5rem !important; }
    h5 { font-size: 1.25rem !important; }
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
    <h4 class="fw-bold mb-4">Kelola Akun Petugas</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        {{-- Form Buat Akun --}}
        <div class="col-12 col-md-5">
            <div class="card shadow-sm border-danger">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-success mb-3">Buat Akun Petugas Baru</h6>

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="/petugas/buat-akun">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Masukkan nama" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                placeholder="Masukkan email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Minimal 8 karakter" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Buat Akun</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Daftar Petugas --}}
        <div class="col-12 col-md-7">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-success mb-3">Daftar Akun Petugas</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-danger">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($petugas as $index => $p)
                                <tr>
                                    <td data-label="No">{{ $index + 1 }}</td>
                                    <td data-label="Nama">{{ $p->name }}</td>
                                    <td data-label="Email">{{ $p->email }}</td>
                                    <td data-label="Aksi">
                                        @if($p->id !== Auth::id())
                                        <form method="POST" action="/petugas/akun/{{ $p->id }}/reset-password"
                                            onsubmit="return confirm('Reset password akun ini menjadi password123?')">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm">Reset Password</button>
                                        </form>
                                        @else
                                        <span class="text-muted" style="font-size:11px;">Akun Anda</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada akun petugas</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="/dashboard-petugas" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
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