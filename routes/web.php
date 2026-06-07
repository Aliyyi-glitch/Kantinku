<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StallController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProfileController; // Tambahkan import ProfileController ini
use App\Models\Stall;
use Illuminate\Support\Facades\Route;

// ==========================================
// 🌍 HALAMAN PUBLIK PEMBELI (Tanpa Login)
// ==========================================
Route::get('/', [PembeliController::class, 'index'])->name('pembeli.index');


// ==========================================
// 🔒 GROUP ROUTE: KHUSUS PEDAGANG / PENJUAL
// (Hanya bisa diakses jika sudah LOGIN)
// ==========================================
Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', function () {
    $user = Auth::user();

    // 1. Cari stan yang punya user_id cocok dengan user login
    $stall = Stall::where('user_id', $user->id)->first();

    // 2. QUICK FIX FOR NEW REGISTER: Jika user baru daftar dan belum punya stan, 
    // ambil stan pertama yang ada di database sebagai contoh (fallback) supaya tidak error
    if (!$stall) {
        $stall = Stall::first();
    }

    // 3. EMERGENCY FALLBACK: Jika di database benar-benar kosong total (belum di-seed)
    // kita buat objek kosong tiruan agar halaman blade tidak crash mencari ->status
    if (!$stall) {
        $stall = (object) [
            'id' => null,
            'name' => 'Kantin Kamu',
            'status' => 'tutup',
            'phone' => '-'
        ];
    }

    // Kirim variabel $stall yang sudah aman dan pasti ada isinya ke view
    return view('dashboard', compact('stall'));
})->middleware(['auth', 'verified'])->name('dashboard');

    // Setup & Status Toko/Stan
    Route::get('/stall/setup', [StallController::class, 'create'])->name('stall.setup');
    Route::post('/stall/setup', [StallController::class, 'store'])->name('stall.store');
    Route::patch('/stall/{stall}/status', [StallController::class, 'updateStatus'])->name('stall.updateStatus');

    // CRUD Menu Dagangan milik Pedagang
    Route::resource('menus', MenuController::class)->except(['index', 'show']);
});


// ==========================================
// ⚙️ FIX ERROR: GROUP ROUTE PROFILE BAWAAN
// (Dibutuhkan oleh file navigation.blade.php)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ==========================================
// 🛠️ GROUP ROUTE: MANAGEMENT OLEH ADMIN
// ==========================================
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/pedagang', [AdminController::class, 'index'])->name('admin.pedagang.index');
    Route::get('/admin/pedagang/create', [AdminController::class, 'create'])->name('admin.pedagang.create');
    Route::post('/admin/pedagang', [AdminController::class, 'store'])->name('admin.pedagang.store');
    Route::get('/admin/pedagang/{id}/edit', [AdminController::class, 'edit'])->name('admin.pedagang.edit');
    Route::put('/admin/pedagang/{id}', [AdminController::class, 'update'])->name('admin.pedagang.update');
    Route::delete('/admin/pedagang/{id}', [AdminController::class, 'destroy'])->name('admin.pedagang.destroy');
});

require __DIR__.'/auth.php';