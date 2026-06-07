<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // 1. CREATE: Menampilkan Form Tambah Menu (Route: menus.create)
    public function create()
    {
        // Mengarah ke resources/views/menus/create.blade.php
        return view('menus.create');
    }

    // 2. STORE: Menyimpan Data Menu Baru ke Database (Route: menus.store)
    public function store(Request $request)
{
    // 1. Validasi input, pastikan file berupa gambar (jpg, jpeg, png) & ukuran max 2MB
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Batasi tipe & ukuran file
    ]);

    // 2. Ambil semua data input kecuali image terlebih dahulu
    $data = $request->except('image');

    // 3. Proses upload foto jika file fisik dikirim oleh user
    if ($request->hasFile('image')) {
        // Menyimpan gambar ke dalam folder: storage/app/public/menus
        // store() akan otomatis men-generate nama file acak yang unik agar tidak bentrok
        $imagePath = $request->file('image')->store('menus', 'public');
        
        // Simpan jalur/path file tersebut ke dalam array data untuk disimpan ke database
        $data['image'] = $imagePath;
    }

    // 4. Simpan ke database melalui Model
    Menu::create($data); 

    return redirect()->back()->with('success', 'Menu baru beserta fotonya berhasil ditambahkan!');
}

    // 3. EDIT: Menampilkan Form Edit Menu (Route: menus.edit)
    public function edit($id)
    {
        $menu = Menu::where('stall_id', auth()->user()->stall->id)->findOrFail($id);

        // Mengarah ke resources/views/menus/edit.blade.php
        return view('menus.edit', compact('menu'));
    }

    // 4. UPDATE: Memperbarui Data Menu di Database (Route: menus.update)
    public function update(Request $request, $id)
    {
        $menu = Menu::where('stall_id', auth()->user()->stall->id)->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada di storage
            if ($menu->image) {
                Storage::disk('public')->delete($menu->image);
            }
            $menu->image = $request->file('image')->store('menu-images', 'public');
        }

        $menu->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('dashboard')->with('success', 'Menu dagangan berhasil diperbarui!');
    }

    // 5. DELETE: Menghapus Menu (Route: menus.destroy)
    public function destroy($id)
    {
        $menu = Menu::where('stall_id', auth()->user()->stall->id)->findOrFail($id);

        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }

        $menu->delete();

        return redirect()->route('dashboard')->with('success', 'Menu dagangan berhasil dihapus!');
    }
}