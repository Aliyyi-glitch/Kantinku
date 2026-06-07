<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; // Digunakan untuk menghapus file foto lama di storage

class AdminController extends Controller
{
    // Tampilkan Daftar Pedagang
    public function index()
    {
        // Mengambil user dengan role penjual beserta data stalls-nya
        $pedagang = User::where('role', 'penjual')->with('stall')->get();
        return view('admin.pedagang', compact('pedagang'));
    }

    // Form Tambah Pedagang
    public function create()
    {
        return view('admin.create_pedagang');
    }

    // Simpan Akun Pedagang Baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'penjual', // Otomatis diset sebagai penjual
        ]);

        return redirect()->route('admin.pedagang.index')->with('success', 'Akun pedagang berhasil didaftarkan!');
    }

    // Form Edit Pedagang & Foto Stan (Langkah Tambahan agar Form Edit Terbuka)
    public function edit($id)
    {
        // Mencari user pedagang beserta data relasi stan-nya
        $pedagang = User::with('stall')->findOrFail($id);
        return view('admin.edit_pedagang', compact('pedagang'));
    }

    // Update Akun Pedagang dan Foto Stan (Langkah 2)
    public function update(Request $request, $id)
    {
        // 1. Validasi input (email unik kecuali untuk user yang sedang di-edit itu sendiri)
        // Kolom 'image' diset 'nullable' agar jika foto tidak diganti, sistem tidak error
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        // 2. Cari data user pedagang yang ingin diubah
        $user = User::findOrFail($id);
        
        // Update data dasar pada tabel users
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // 3. Logika Upload & Ganti Foto pada tabel Stalls (jika user mengunggah file baru)
        if ($request->hasFile('image')) {
            
            // Mengambil data stan milik user ini melalui relasi
            $stall = $user->stall; 

            if ($stall) {
                // A. HAPUS FOTO LAMA dari folder storage jika sebelumnya sudah ada file terdaftar
                if ($stall->image && Storage::disk('public')->exists($stall->image)) {
                    Storage::disk('public')->delete($stall->image);
                }

                // B. SIMPAN FOTO BARU ke dalam folder storage/app/public/stalls
                $newImagePath = $request->file('image')->store('stalls', 'public');

                // C. Update nama path foto baru ke database stan
                $stall->update([
                    'image' => $newImagePath
                ]);
            }
        }

        return redirect()->route('admin.pedagang.index')->with('success', 'Data stan dan foto berhasil diperbarui!');
    }

    // Hapus Akun Pedagang
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Karena cascade di migration, data di tabel stalls otomatis ikut terhapus

        return redirect()->route('admin.pedagang.index')->with('success', 'Akun pedagang berhasil dihapus.');
    }
}