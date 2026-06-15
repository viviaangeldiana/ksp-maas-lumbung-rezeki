<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class KontakController extends Controller
{
    public function kirimPesan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
            'pesan' => 'required',
        ]);

        Pesan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'hp' => $request->hp,
            'pesan' => $request->pesan,
        ]);

        return back()->with('success', 'Pesan berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}