@extends('layout')

@section('title', 'Login')

@section('content')
<style>
/* Mobile-first: default (mobile) */
h4 { font-size: clamp(12px, 4vw, 18px) !important; }
label { font-size: clamp(10px, 3vw, 13px) !important; }
.card-body { padding: 8px !important; }
.btn { font-size: clamp(10px, 3vw, 14px) !important; padding: 4px 8px !important; }
.form-control { font-size: clamp(10px, 3vw, 14px) !important; }

/* Desktop overrides (≥768px) */
@media (min-width: 768px) {
    h4 { font-size: 1.5rem !important; }
    label { font-size: 1rem !important; }
    .card-body { padding: 1rem !important; }
    .btn { font-size: 1rem !important; padding: 0.375rem 0.75rem !important; }
    .form-control { font-size: 1rem !important; }
}
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-5">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h4 class="text-center fw-bold text-success mb-4">Login</h4>

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                    @endif

                    <form method="POST" action="/login">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                placeholder="Masukkan email" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Login</button>
                    </form>

                    <hr>
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