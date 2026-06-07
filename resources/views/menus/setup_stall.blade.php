<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Profil Stan - Kantinku</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-2xl w-full bg-white p-8 rounded-3xl border border-slate-100 shadow-xl transition-all">
        
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('dashboard') }}" class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-slate-200 hover:text-slate-700 transition">
                <i class="fas fa-arrow-left text-sm"></i>
            </a>
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight">Pengaturan Profil Stan</h2>
                <p class="text-xs text-slate-400 mt-0.5">Kelola informasi lapak jualan kamu di Kantinku</p>
            </div>
        </div>

        <form action="{{ route('stall.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2.5">Nama Stan / Toko</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fas fa-store text-sm"></i>
                    </div>
                    <input type="text" name="name" value="{{ $stall->name ?? '' }}" class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-slate-200 text-sm focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-100 transition" placeholder="Masukkan nama stan..." required>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2.5">No. WhatsApp (Gunakan Awalan 62)</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fab fa-whatsapp text-base font-bold"></i>
                    </div>
                    <input type="text" name="phone" value="{{ $stall->phone ?? '' }}" class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-slate-200 text-sm focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-100 transition" placeholder="Contoh: 62812345678" required>
                </div>
            </div>

            <div class="mb-8">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2.5">Status Operasional Lapak</label>
                <div class="grid grid-cols-2 gap-4">
                    <label class="flex items-center justify-center gap-3 cursor-pointer bg-green-50/60 text-green-700 p-4 rounded-2xl border-2 border-transparent has-[:checked]:border-green-500 transition">
                        <input type="radio" name="status" value="buka" {{ ($stall->status ?? 'buka') == 'buka' ? 'checked' : '' }} class="accent-green-600 w-4 h-4">
                        <span class="text-sm font-bold flex items-center gap-1.5"><i class="fas fa-door-open text-xs"></i> Buka Toko</span>
                    </label>
                    
                    <label class="flex items-center justify-center gap-3 cursor-pointer bg-red-50/60 text-red-700 p-4 rounded-2xl border-2 border-transparent has-[:checked]:border-red-500 transition">
                        <input type="radio" name="status" value="tutup" {{ ($stall->status ?? '') == 'tutup' ? 'checked' : '' }} class="accent-red-600 w-4 h-4">
                        <span class="text-sm font-bold flex items-center gap-1.5"><i class="fas fa-door-closed text-xs"></i> Tutup Toko</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('dashboard') }}" class="px-6 py-3.5 rounded-2xl border border-slate-200 text-slate-500 text-sm font-bold hover:bg-slate-100 transition">
                    Batal
                </a>
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold text-sm px-7 py-3.5 rounded-2xl transition duration-200 shadow-md shadow-orange-500/20 hover:shadow-lg">
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </div>

</body>
</html>