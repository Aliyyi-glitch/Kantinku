<?php

namespace App\Http\Controllers;

use App\Models\Stall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StallController extends Controller
{
    // Menampilkan halaman setup toko
    public function create()
    {
        // Jika sudah punya toko, langsung lempar balik ke dashboard
        if (Auth::user()->stall) {
            return redirect()->route('dashboard');
        }
        return view('menus.setup_stall');
    }

    // Menyimpan data toko baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
        ]);

        Stall::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'status' => 'buka', // UBAH INI: Dari 'is_open' ke 'status'
        ]);

        return redirect()->route('dashboard')->with('success', 'Selamat! Toko kantin Anda berhasil diaktifkan.');
    }

    // Toggle Status Buka / Tutup
    public function updateStatus(Request $request, $id)
    {
        // Ambil data stan berdasarkan ID
        $stall = Stall::findOrFail($id);

        // Logic Toggle: Jika saat ini 'buka' maka ganti 'tutup', dan sebaliknya
        $stall->status = ($stall->status === 'buka') ? 'tutup' : 'buka';
        $stall->save();

        // Kembali ke dashboard dengan membawa flash message sukses
        return redirect()->route('dashboard')->with('success', 'Status operasional stan berhasil diperbarui!');
    }
}