<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Stall;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index(Request $request)
    {
        // 1. Inisialisasi query dasar untuk mengambil menu
        $query = Menu::query();

        // 2. Filter berdasarkan Pencarian Kata Kunci (Hanya jalan jika ada isinya)
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // 3. Filter berdasarkan Kategori Menu (Gunakan 'category' sesuai nama kolom database)
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // 4. Eksekusi query untuk mengambil data menu terbaru
        $menus = $query->latest()->get();

        // 5. Ambil semua data toko kantin untuk ditampilkan di sidebar
        $stalls = Stall::all();

        // 6. Lempar data ke view welcome
        return view('welcome', compact('menus', 'stalls'));
    }
}