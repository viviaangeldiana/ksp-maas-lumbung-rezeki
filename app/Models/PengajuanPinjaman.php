<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanPinjaman extends Model
{
    protected $table = 'pengajuan_pinjaman';

    protected $fillable = [
        'user_id',
        'jenis_pinjaman',
        'jumlah_pinjaman',
        'tenor_bulan',
        'tujuan_pinjaman',
        'pekerjaan',
        'penghasilan_bulanan',
        'agunan',
        'status',
        'catatan_petugas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}