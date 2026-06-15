@extends('layout')

@section('title', 'Ganti Password')

@section('content')
<style>
/* ── Mobile-first: default (mobile) ── */
h4, h5 { font-size: clamp(12px, 4vw, 18px) !important; }
p, label { font-size: clamp(10px, 3vw, 13px) !important; }
.card-body { padding: 8px !important; }
.btn { font-size: clamp(10px, 3vw, 14px) !important; padding: 4px 8px !important; }
.form-control { font-size: clamp(10px, 3vw, 14px) !important; }

/* ── Desktop overrides (≥768px) ── */
@media (min-width: 768px) {
    h4, h5 { font-size: 1.25rem !important; }
    p, label { font-size: 1rem !important; }
    .card-body { padding: 1rem !important; }
    .btn { font-size: 1rem !important; padding: 0.375rem 0.75rem !important; }
    .form-control { font-size: 1rem !important; }
}
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Ganti Password</h5>
                </div>
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p class="mb-0">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="/petugas/ganti-password">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Password Lama</label>
                            <div class="input-group">
                                <input type="password" name="password_lama" id="password_lama" class="form-control" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_lama', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <div class="input-group">
                                <input type="password" name="password_baru" id="password_baru" class="form-control" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_baru', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('konfirmasi_password', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Simpan</button>
                    </form>

                </div>
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