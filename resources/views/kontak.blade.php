@extends('layout')

@section('title', 'Hubungi Kami')

@section('content')
<style>
/* Mobile-first: default (mobile) */
h2 { font-size: clamp(14px, 7vw, 20px) !important; }
h4, h5 { font-size: clamp(12px, 4vw, 18px) !important; }
p, label { font-size: clamp(10px, 3vw, 13px) !important; }
.card-body { padding: 8px !important; }
.btn { font-size: clamp(10px, 3vw, 14px) !important; padding: 4px 8px !important; }
.form-control { font-size: clamp(10px, 3vw, 14px) !important; }

/* Desktop overrides (≥768px) */
@media (min-width: 768px) {
    h2 { font-size: 2rem !important; }
    h4, h5 { font-size: 1.25rem !important; }
    p, label { font-size: 1rem !important; }
    .card-body { padding: 1rem !important; }
    .btn { font-size: 1rem !important; padding: 0.375rem 0.75rem !important; }
    .form-control { font-size: 1rem !important; }
}
</style>

<div class="container py-5">
    <h2 class="text-center fw-bold mb-5">Hubungi Kami</h2>

    <div class="row g-4">
        {{-- Informasi Kontak --}}
        <div class="col-12 col-md-5">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="text-success fw-bold mb-4">Informasi Kontak</h5>
                    <div class="d-flex mb-3">
                        <i class="bi bi-geo-alt-fill text-danger fs-4 me-3"></i>
                        <div>
                            <strong>Alamat</strong>
                            <p class="mb-0 text-muted">Ruko Palm Spring Blok D2 No.8, Batam Centre</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="bi bi-telephone-fill text-danger fs-4 me-3"></i>
                        <div>
                            <strong>Telepon</strong>
                            <p class="mb-0 text-muted">0778 416 3927</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="bi bi-envelope-fill text-danger fs-4 me-3"></i>
                        <div>
                            <strong>Email</strong>
                            <p class="mb-0 text-muted">kspmaaslumbungrezeki@gmail.com</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="bi bi-whatsapp text-danger fs-4 me-3"></i>
                        <div>
                            <strong>WhatsApp</strong>
                            <p class="mb-0 text-muted">0821 7230 6884</p>
                            <p class="mb-0 text-muted">0822 8511 8821</p>
                            <p class="mb-0 text-muted">0822 8340 0909</p>
                            <p class="mb-0 text-muted">0813 6412 3422</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="bi bi-instagram text-danger fs-4 me-3"></i>
                        <div>
                            <strong>Instagram</strong>
                            <p class="mb-0 text-muted">KSP.MAASLUMBUNGREZEKI</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="bi bi-facebook text-danger fs-4 me-3"></i>
                        <div>
                            <strong>Facebook</strong>
                            <p class="mb-0 text-muted">KSP MAAS LUMBUNG REZEKI</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="bi bi-clock-fill text-danger fs-4 me-3"></i>
                        <div>
                            <strong>Jam Operasional</strong>
                            <p class="mb-0 text-muted">Senin - Jumat: 08.00 - 17.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Kontak --}}
        <div class="col-12 col-md-7">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="text-success fw-bold mb-4">Kirim Pesan</h5>
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form method="POST" action="/kontak/kirim">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukkan email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" name="hp" placeholder="Masukkan nomor HP">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pesan</label>
                            <textarea class="form-control" rows="4" name="pesan" placeholder="Tulis pesan di sini"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection