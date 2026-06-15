@extends('layout')

@section('title', 'Keanggotaan')

@section('content')
<style>
/* Mobile-first: default (mobile) */
h2 { font-size: clamp(14px, 7vw, 20px) !important; }
h4 { font-size: clamp(12px, 3.5vw, 18px) !important; }
h3 { font-size: clamp(13px, 3.5vw, 18px) !important; }
p { font-size: clamp(11px, 3vw, 14px) !important; }
.img-fluid { max-width: 100% !important; height: auto !important; }
.btn { font-size: 12px !important; padding: 6px 12px !important; }
.list-group-item { font-size: 11px !important; padding: 6px 8px !important; }
table { font-size: 11px !important; }
th, td { padding: 4px !important; }

/* Desktop overrides (≥768px) */
@media (min-width: 768px) {
    h2 { font-size: 2rem !important; }
    h4 { font-size: 1.5rem !important; }
    h3 { font-size: 1.75rem !important; }
    p { font-size: 1rem !important; }
    .btn { font-size: 1rem !important; padding: 0.375rem 0.75rem !important; }
    .list-group-item { font-size: 1rem !important; padding: 0.5rem 1rem !important; }
    table { font-size: 1rem !important; }
    th, td { padding: 0.5rem !important; }
}
</style>

<div class="container py-5">
    <h2 class="text-center fw-bold mb-5">Keanggotaan</h2>

    {{-- Syarat Keanggotaan --}}
    <div class="row g-4 mb-5">
        <div class="col-12 col-md-6">
            <div class="card h-100 shadow-sm border-danger">
                <div class="card-header bg-danger text-white fw-bold">
                    <i class="bi bi-person-check"></i> Syarat Menjadi Anggota
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Warga Negara Indonesia</li>
                        <li class="list-group-item">Mempunyai kemampuan penuh untuk melakukan tindakan hukum.</li>
                        <li class="list-group-item">Bertempat tinggal di wilayah Kota Batam dan sekitarnya.</li>
                        <li class="list-group-item">Telah menyatakan kesanggupan tertulis untuk melunasi Simpanan Pokok sebesar Rp. 50.000,- (lima puluh ribu rupiah) dan Simpanan Wajib sebesar Rp.20.000,- (dua puluh ribu rupiah).</li>
                        <li class="list-group-item">Telah menyetujui isi Anggaran Dasar, Anggaran Rumah Tangga dan ketentuan yang berlaku.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card h-100 shadow-sm border-danger">
                <div class="card-header bg-danger text-white fw-bold">
                    <i class="bi bi-person-x"></i> Berakhirnya Keanggotaan
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Anggota bersangkutan meninggal dunia.</li>
                        <li class="list-group-item">Koperasi membubarkan diri atau dibubarkan oleh Pemerintah.</li>
                        <li class="list-group-item">Diberhentikan oleh Pengurus karena tidak memenuhi lagi persyaratan keanggotaan dan atau melanggar ketentuan Anggaran Dasar atau Anggaran Tangga Koperasi dan ketentuan lain yang Rumah berlaku dalam Koperasi.</li>
                        <li class="list-group-item">Anggota tidak menyetor Simpanan Wajib selama 3 bulan berturut-turut.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Keuntungan Menjadi Anggota --}}
    <h2 class="text-success fw-bold text-center mb-4">Keuntungan Menjadi Anggota</h2>
    <div class="row g-3 text-center mb-5">
        <div class="col-6 col-md-3">
            <div class="card shadow-sm h-100 border-danger">
                <div class="card-body">
                    <div class="bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:50px;height:50px;">1</div>
                    <p class="fw-bold mb-0">SHU</p>
                    <small class="text-muted">Memperoleh keuntungan dari pendapatan Hasil Sisa Usaha</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm h-100 border-danger">
                <div class="card-body">
                    <div class="bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:50px;height:50px;">2</div>
                    <p class="fw-bold mb-0">Simpanan</p>
                    <small class="text-muted">Fasilitas simpanan untuk Kebutuhan Anggota</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm h-100 border-danger">
                <div class="card-body">
                    <div class="bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:50px;height:50px;">3</div>
                    <p class="fw-bold mb-0">Pinjaman</p>
                    <small class="text-muted">Fasilitas pinjaman untuk berbagai kebutuhan</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm h-100 border-danger">
                <div class="card-body">
                    <div class="bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:50px;height:50px;">4</div>
                    <p class="fw-bold mb-0">RAT</p>
                    <small class="text-muted">Mengikuti Rapat Anggota Tahunan</small>
                </div>
            </div>
        </div>
    </div>

    {{-- CTA --}}
    <div class="text-center">
        <a href="/kontak" class="btn btn-danger btn-lg">Hubungi Kami untuk Mendaftar sebagai Anggota</a>
    </div>
</div>

@endsection