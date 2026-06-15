<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\PengajuanPinjaman;

class AnggotaController extends Controller
{
    public function dashboard()
    {
        $pengajuan = PengajuanPinjaman::where('user_id', Auth::id())->latest()->get();
        return view('anggota.dashboard', compact('pengajuan'));
    }

    public function formPinjaman()
    {
        return view('anggota.form-pinjaman');
    }

    public function ajukanPinjaman(Request $request)
    {
        $request->validate([
            'jenis_pinjaman' => 'required',
            'jumlah_pinjaman' => 'required|numeric',
            'tenor_bulan' => 'required|integer',
            'tujuan_pinjaman' => 'required',
            'pekerjaan' => 'required',
            'penghasilan_bulanan' => 'required|numeric',
        ]);

        PengajuanPinjaman::create([
            'user_id' => Auth::id(),
            'jenis_pinjaman' => $request->jenis_pinjaman,
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
            'tenor_bulan' => $request->tenor_bulan,
            'tujuan_pinjaman' => $request->tujuan_pinjaman,
            'pekerjaan' => $request->pekerjaan,
            'penghasilan_bulanan' => $request->penghasilan_bulanan,
            'agunan' => $request->agunan,
            'status' => 'menunggu',
        ]);

        return redirect('/dashboard-anggota')->with('success', 'Pengajuan pinjaman berhasil dikirim!');
    }
    public function gantiPasswordForm()
{
    return view('anggota.ganti-password');
}

public function gantiPassword(Request $request)
{
    $request->validate([
        'password_lama' => 'required',
        'password_baru' => 'required|min:6',
        'konfirmasi_password' => 'required|same:password_baru',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->password_lama, $user->password)) {
        return back()->withErrors(['password_lama' => 'Password lama tidak sesuai.']);
    }

    $user->update(['password' => Hash::make($request->password_baru)]);

    return back()->with('success', 'Password berhasil diubah!');
}
}