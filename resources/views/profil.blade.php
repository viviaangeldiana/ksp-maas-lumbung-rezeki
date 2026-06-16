@extends('layout')

@section('title', 'Profil')

@section('content')
<style>
/* Mobile-first: default (mobile) */
h2 { font-size: clamp(14px, 7vw, 20px) !important; }
h4 { font-size: clamp(12px, 3.5vw, 18px) !important; }
p, li { font-size: clamp(13px, 3.5vw, 16px) !important; }
.img-fluid { max-width: 100% !important; height: auto !important; }
.card-body .bi { font-size: 1.5rem !important; }
.card-body h6 { font-size: 9px !important; }
.card-body p { font-size: 8px !important; }
.card-body { padding: 8px !important; }
.card-body .visi-teks { font-size: clamp(13px, 3.5vw, 16px) !important; }

/* Desktop overrides (≥768px) */
@media (min-width: 768px) {
    h2 { font-size: 2rem !important; }
    h4 { font-size: 1.5rem !important; }
    p { font-size: 1rem !important; }
    .card-body .bi { font-size: 2.5rem !important; }
    .card-body h6 { font-size: 1rem !important; }
    .card-body p { font-size: 1rem !important; }
    .card-body { padding: 1rem !important; }
    .card-body .visi-teks { font-size: 1rem !important;}
}
</style>

<div class="container py-5">
    <h2 class="text-center mb-5 fw-bold">Profil Koperasi</h2>

    {{-- Tentang Kami --}}
    <div class="row align-items-center mb-5">
        <div class="col-12 col-md-6">
            <h4 class="text-success fw-bold">Tentang Kami</h4>
            <p>Koperasi Simpan Pinjam Maas Lumbung Rezeki adalah salah satu Koperasi Simpan Pinjam Primer Kota Batam yang berkedudukan di Ruko Palm Spring Blok D2 No.8 RT 001/RW 001 Kelurahan Taman Baloi, Kecamatan Batam Kota, Kota Batam, Provinsi Kepulauan Riau.</p>
            <p>Koperasi Simpan Pinjam Maas Lumbung Rezeki didaftarkan pada Dinas Koperasi, Usaha Mikro, Kecil, dan Menengah dengan Badan Hukum Nomor 014781/BH/M.KUKM.2/IX/2019.</p>
        </div>
        <div class="col-12 col-md-6 text-center">
            <img src="/images/gedung.jpeg" class="img-fluid rounded shadow" style="max-width:350px;">
        </div>
    </div>

    {{-- Visi Misi --}}
    <div class="row g-4 mb-5">
        <div class="col-12 col-md-6">
            <div class="card border-danger h-100">
                <div class="card-header bg-success text-white fw-bold">Visi</div>
                <div class="card-body">
                    <p class="visi-teks">Meningkatkan kesejahteraan Anggota pada khususnya dan masyarakat pada umumnya serta meningkatkan peran serta Koperasi dalam menyukseskan pemerintah dibidang perkoperasian.</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card border-danger h-100">
                <div class="card-header bg-success text-white fw-bold">Misi</div>
                <div class="card-body">
                    <ul>
                        <li>Memberikan pinjaman kepada Anggota dengan prioritas usaha skala kecil dan mencari modal berupa Simpanan dari Anggota</li>
                        <li>Memberikan pinjaman kepada Anggota baru dengan skala kecil dan menengah dan mencari modal Simpanan dari Anggota baru.</li>
                        <li>Memberikan pinjaman kepada Anggota dengan skala kecil dan menengah dengan cakupan wilayah yang lebih luas dan terus mencari modal dari Simpanan Anggota baru.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Struktur Organisasi --}}
    <h2 class="text-success fw-bold text-center mb-4">Struktur Organisasi</h2>
    <h5 class="text-center mb-3">Pengurus</h5>
    <div class="row g-3 text-center">
        <div class="col-4 col-md-4">
            <div class="card shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-person-circle fs-1 text-danger"></i>
                    <h6 class="mt-2 fw-bold">Ketua</h6>
                    <p class="text-muted mb-0">Budiarjo Gultom</p>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-4">
            <div class="card shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-person-circle fs-1 text-danger"></i>
                    <h6 class="mt-2 fw-bold">Sekretaris</h6>
                    <p class="text-muted mb-0">Hariyanto</p>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-4">
            <div class="card shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-person-circle fs-1 text-danger"></i>
                    <h6 class="mt-2 fw-bold">Bendahara</h6>
                    <p class="text-muted mb-0">Freddie Febrian</p>
                </div>
            </div>
        </div>
    </div>

    <h5 class="text-center mb-3"><br>Pengawas</h5>
    <div class="row g-3 text-center">
        <div class="col-4 col-md-4">
            <div class="card shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-person-circle fs-1 text-danger"></i>
                    <h6 class="mt-2 fw-bold">Ketua</h6>
                    <p class="text-muted mb-0">Ferry Firdaus</p>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-4">
            <div class="card shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-person-circle fs-1 text-danger"></i>
                    <h6 class="mt-2 fw-bold">Anggota</h6>
                    <p class="text-muted mb-0">Mimi Sartika</p>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-4">
            <div class="card shadow-sm border-danger">
                <div class="card-body">
                    <i class="bi bi-person-circle fs-1 text-danger"></i>
                    <h6 class="mt-2 fw-bold">Anggota</h6>
                    <p class="text-muted mb-0">Imelda Christy. S</p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection