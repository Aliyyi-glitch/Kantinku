<x-app-layout>
    <div class="py-8 bg-slate-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <div class="relative overflow-hidden bg-gradient-to-r from-orange-500 via-amber-500 to-yellow-400 p-8 rounded-3xl shadow-xl shadow-orange-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div class="absolute -right-10 -bottom-10 text-white/10 text-9xl font-black pointer-events-none">
                    <i class="fas fa-store-alt"></i>
                </div>
                <div class="relative z-10 text-white">
                    <span class="bg-white/20 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-sm">Mitra KantinKu</span>
                    <h1 class="text-3xl font-black mt-2 tracking-tight">Halo, {{ Auth::user()->name }}! 👋</h1>
                    <p class="text-sm text-orange-50/90 mt-1 font-medium">Kelola stan, pantau menu dagangan, dan mulai jualan digital hari ini.</p>
                </div>
                <div class="flex gap-3 relative z-10 w-full md:w-auto">
                    <a href="{{ route('menus.create') }}"
                        class="w-full md:w-auto text-center bg-white text-orange-600 font-bold px-5 py-3 rounded-xl shadow-md hover:bg-orange-50 hover:-translate-y-0.5 transition duration-200 text-sm flex items-center justify-center gap-2">
                        <i class="fas fa-plus"></i> Tambah Menu
                    </a>
                    <a href="{{ route('stall.setup') }}"
                        class="w-full md:w-auto text-center bg-orange-600/30 text-white border border-white/20 font-bold px-5 py-3 rounded-xl backdrop-blur-md hover:bg-orange-600/50 hover:-translate-y-0.5 transition duration-200 text-sm flex items-center justify-center gap-2">
                        <i class="fas fa-cog"></i> Pengaturan Stan
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 bg-orange-50 text-orange-500 rounded-xl flex items-center justify-center text-xl">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Menu Dagangan</p>
                        <h3 class="text-2xl font-black text-slate-800 mt-0.5">Aktif</h3>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 {{ $stall->status === 'buka' ? 'bg-green-50 text-green-500' : 'bg-red-50 text-red-500' }} rounded-xl flex items-center justify-center text-xl transition-colors duration-300">
                        <i class="fas {{ $stall->status === 'buka' ? 'fa-door-open' : 'fa-door-closed' }}"></i>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Status Toko</p>
                        @if($stall->status === 'buka')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-50 text-green-700 mt-1">
                                <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-green-500 animate-pulse"></span> Buka
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-50 text-red-700 mt-1">
                                <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-red-500"></span> Tutup
                            </span>
                        @endif
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4 sm:col-span-2 lg:col-span-1">
                    <div class="w-12 h-12 {{ $stall->status === 'buka' ? 'bg-red-50 text-red-500' : 'bg-green-50 text-green-500' }} rounded-xl flex items-center justify-center text-xl transition-colors duration-300">
                        <i class="fas fa-power-off"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Kontrol Operasional</p>

                        <form action="{{ route('stall.updateStatus', $stall->id) }}" method="POST" class="mt-1">
                            @csrf
                            @method('PATCH')
                            <button type="submit" 
                                class="text-xs font-bold {{ $stall->status === 'buka' ? 'text-red-500 hover:text-red-600' : 'text-green-500 hover:text-green-600' }} hover:underline flex items-center gap-1 transition-colors duration-200">
                                @if($stall->status === 'buka')
                                    Tutup Stan Sekarang <i class="fas fa-sync text-[10px]"></i>
                                @else
                                    Buka Stan Sekarang <i class="fas fa-sync text-[10px]"></i>
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-black text-slate-900">Aktivitas Toko Anda</h2>
                        <p class="text-xs text-slate-400 mt-0.5 font-medium">Kelola apa yang pembeli lihat pada aplikasi kantin.</p>
                    </div>
                </div>

                <div class="p-12 text-center max-w-sm mx-auto">
                    <div class="w-16 h-16 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-4 border border-dashed border-slate-200">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <h4 class="text-sm font-bold text-slate-700">Mulai Mengisi Katalog Stan</h4>
                    <p class="text-xs text-slate-400 mt-1 leading-relaxed">Gunakan tombol **Tambah Menu** di atas untuk memasukkan makanan atau minuman yang ingin kamu jual ke pembeli.</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>