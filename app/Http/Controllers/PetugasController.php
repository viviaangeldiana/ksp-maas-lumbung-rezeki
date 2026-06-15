<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanPinjaman;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function dashboard()
    {
        $pengajuan = PengajuanPinjaman::with('user')->latest()->get();
        $totalAnggota = User::where('role', 'anggota')->count();
        $totalPengajuan = PengajuanPinjaman::count();
        $menunggu = PengajuanPinjaman::where('status', 'menunggu')->count();
        return view('petugas.dashboard', compact('pengajuan', 'totalAnggota', 'totalPengajuan', 'menunggu'));
    }

    public function detailPengajuan($id)
    {
        $pengajuan = PengajuanPinjaman::with('user')->findOrFail($id);
        return view('petugas.detail-pengajuan', compact('pengajuan'));
    }

    public function prosesPengajuan(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
            'catatan_petugas' => 'nullable|string',
        ]);

        $pengajuan = PengajuanPinjaman::findOrFail($id);
        $pengajuan->update([
            'status' => $request->status,
            'catatan_petugas' => $request->catatan_petugas,
        ]);

        return redirect('/dashboard-petugas')->with('success', 'Pengajuan berhasil diproses!');
    }

    public function kelolaAkun()
    {
        $petugas = User::where('role', 'petugas')->get();
        return view('petugas.kelola-akun', compact('petugas'));
    }

    public function buatAkunPetugas(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas',
        ]);

        return redirect('/petugas/kelola-akun')->with('success', 'Akun petugas berhasil dibuat!');
    }

    public function resetPasswordPetugas($id)
    {
        $user = User::findOrFail($id);
        $user->update(['password' => Hash::make('password123')]);
        return back()->with('success', 'Password petugas berhasil direset menjadi: password123');
    }

    public function gantiPasswordForm()
{
    return view('petugas.ganti-password');
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
public function daftarPesan()
{
    $pesan = \App\Models\Pesan::orderBy('created_at', 'desc')->get();
    return view('petugas.daftar-pesan', compact('pesan'));
}

public function bacaPesan($id)
{
    $pesan = \App\Models\Pesan::findOrFail($id);
    $pesan->update(['status' => 'sudah_dibaca']);
    return view('petugas.detail-pesan', compact('pesan'));
}
public function tandaiDibalas($id)
{
    $pesan = \App\Models\Pesan::findOrFail($id);
    $pesan->update(['dibalas' => true]);
    return back()->with('success', 'Pesan ditandai sudah dibalas!');
}
public function buatAkunAnggota(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'no_anggota' => 'required',
        'no_telepon' => 'required',
        'alamat' => 'required',
        'password' => 'required|min:6',
    ]);

    \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'no_anggota' => $request->no_anggota,
        'no_telepon' => $request->no_telepon,
        'alamat' => $request->alamat,
        'password' => Hash::make($request->password),
        'role' => 'anggota',
        'status' => 'aktif',
    ]);

    return back()->with('success', 'Akun anggota berhasil dibuat!');
}
public function kelolaAnggota()
{
    $anggota = \App\Models\User::where('role', 'anggota')->get();
    return view('petugas.kelola-anggota', compact('anggota'));
}

public function nonaktifkanAnggota($id)
{
    $user = \App\Models\User::findOrFail($id);
    $user->update(['status' => 'tidak_aktif']);
    return back()->with('success', 'Akun anggota berhasil dinonaktifkan!');
}

public function aktifkanAnggota($id)
{
    $user = \App\Models\User::findOrFail($id);
    $user->update(['status' => 'aktif']);
    return back()->with('success', 'Akun anggota berhasil diaktifkan!');
}
public function resetPasswordAnggota($id)
{
    $user = \App\Models\User::findOrFail($id);
    $user->update(['password' => \Illuminate\Support\Facades\Hash::make('password123')]);
    return back()->with('success', 'Password berhasil direset menjadi: password123');
}
}