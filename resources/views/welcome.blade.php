<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kantinku - Jajan Lebih Mewah & Cepat</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js', 'resources/js/ui-interact.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.6);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-orange-50 via-white to-yellow-50 min-h-screen flex flex-col text-slate-800 antialiased">

    <header class="bg-white/70 backdrop-blur-lg shadow-sm sticky top-0 z-50 border-b border-white">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
            <a href="{{ route('pembeli.index') }}" class="flex items-center gap-3">
                <div class="bg-gradient-to-tr from-orange-500 to-yellow-400 text-white p-2 rounded-xl shadow-lg shadow-orange-200">
                    <i class="fas fa-store text-xl"></i>
                </div>
                <span class="text-2xl font-black tracking-tight text-slate-900">Kantin<span class="text-orange-500">ku</span></span>
            </a>

            <form action="{{ route('pembeli.index') }}" method="GET" class="hidden md:block relative w-full max-w-md animate-fade">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Mau jajan apa hari ini?..." class="w-full pl-12 pr-12 py-3 border-none rounded-full bg-slate-100/80 shadow-inner focus:ring-4 focus:ring-orange-200 focus:bg-white transition-all">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-orange-400 text-lg"><i class="fas fa-search"></i></span>
                
                @if(request('search'))
                    <a href="{{ route('pembeli.index', request()->except('search')) }}" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition">
                        <i class="fas fa-times-circle"></i>
                    </a>
                @endif
            </form>

            <div class="flex items-center gap-4 font-semibold text-sm">
                @auth
                    <a href="{{ url('/dashboard') }}" class="flex items-center gap-2 text-orange-600 hover:text-orange-700 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-th-large text-lg"></i>
                        <span>Kelola Kantin</span>
                    </a>
                @else
                    <div class="hidden md:flex items-center gap-1.5 text-[11px] tracking-wider uppercase text-slate-400 bg-slate-50 border border-slate-200/60 px-3 py-1.5 rounded-xl font-bold">
                        <span class="inline-block w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
                        Area Mitra Pedagang
                    </div>
                    
                    <a href="{{ route('login') }}" class="text-slate-500 hover:text-orange-500 transition-colors duration-300">
                        Login Stan
                    </a>
                    
                    <a href="{{ route('register') }}" class="relative group overflow-hidden bg-gradient-to-r from-orange-500 to-amber-500 text-white px-5 py-2.5 rounded-full shadow-md shadow-orange-500/20 transition-all duration-300 hover:shadow-xl hover:shadow-orange-500/30 hover:-translate-y-0.5 flex items-center gap-2">
                        <i class="fas fa-plus-circle text-xs opacity-90 group-hover:rotate-90 transition-transform duration-300"></i>
                        <span>Buka Stan Baru</span>
                    </a>
                @endauth
            </div>
        </nav>
    </header>

    <section class="text-center pt-16 pb-12 px-4 animate-fade relative overflow-hidden">
        <div class="absolute top-0 left-1/4 w-64 h-64 bg-orange-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 right-1/4 w-64 h-64 bg-yellow-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        
        <h1 class="text-5xl md:text-7xl font-black text-slate-900 mb-6 drop-shadow-sm">
            Jajan Praktis, <br />
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-yellow-400">Tanpa Antri Panjang!</span>
        </h1>
        <p class="text-lg md:text-xl text-slate-500 max-w-2xl mx-auto font-medium">
            Temukan menu favoritmu dari berbagai kantin, pesan langsung via WhatsApp, dan ambil pesananmu saat jam istirahat tiba.
        </p>
    </section>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24 w-full flex flex-col lg:flex-row gap-10 flex-grow relative z-10">
        
        <aside class="w-full lg:w-72 flex-shrink-0 space-y-6 animate-fade" style="animation-delay: 0.2s;">
            
            <div class="glass-card rounded-3xl p-6">
                <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                    <div class="bg-orange-100 text-orange-500 p-2 rounded-lg"><i class="fas fa-layer-group"></i></div>
                    Kategori Menu
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('pembeli.index', request()->only('search')) }}" class="flex items-center justify-between px-4 py-3 rounded-2xl font-bold transition-all {{ !request('category') ? 'bg-gradient-to-r from-orange-500 to-orange-400 text-white shadow-md' : 'text-slate-600 hover:bg-white hover:text-orange-500 hover:shadow-sm' }}">
                            <span>Semua Menu</span> 
                            <i class="fas fa-chevron-right text-xs"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pembeli.index', array_merge(request()->only('search'), ['category' => 'Makanan Berat'])) }}" class="flex items-center justify-between px-4 py-3 rounded-2xl font-semibold transition-all {{ request('category') == 'Makanan Berat' ? 'bg-gradient-to-r from-orange-500 to-orange-400 text-white font-bold shadow-md' : 'text-slate-600 hover:bg-white hover:text-orange-500 hover:shadow-sm' }}">
                            <span>Makanan Berat</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pembeli.index', array_merge(request()->only('search'), ['category' => 'Jajanan Ringan'])) }}" class="flex items-center justify-between px-4 py-3 rounded-2xl font-semibold transition-all {{ request('category') == 'Jajanan Ringan' ? 'bg-gradient-to-r from-orange-500 to-orange-400 text-white font-bold shadow-md' : 'text-slate-600 hover:bg-white hover:text-orange-500 hover:shadow-sm' }}">
                            <span>Jajanan Ringan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pembeli.index', array_merge(request()->only('search'), ['category' => 'Minuman Segar'])) }}" class="flex items-center justify-between px-4 py-3 rounded-2xl font-semibold transition-all {{ request('category') == 'Minuman Segar' ? 'bg-gradient-to-r from-orange-500 to-orange-400 text-white font-bold shadow-md' : 'text-slate-600 hover:bg-white hover:text-orange-500 hover:shadow-sm' }}">
                            <span>Minuman Segar</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="glass-card rounded-3xl p-6 sticky top-28">
                <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                    <div class="bg-yellow-100 text-yellow-600 p-2 rounded-lg"><i class="fas fa-store"></i></div>
                    Daftar Stan Kantin
                </h3>
                <ul class="space-y-3">
                    @forelse($stalls as $stall)
                    <li class="flex items-center justify-between p-3 rounded-2xl bg-white/50 border border-slate-100 hover:bg-white transition-all {{ $stall->status == 'buka' ? '' : 'opacity-70' }}">
                        <div class="flex flex-col">
                            <span class="font-bold text-slate-800 text-sm">{{ $stall->name }}</span>
                            <span class="text-xs {{ $stall->status == 'buka' ? 'text-emerald-500' : 'text-red-400' }} font-bold mt-0.5 flex items-center gap-1">
                                <i class="fas fa-circle text-[8px]"></i> {{ $stall->status == 'buka' ? 'Buka' : 'Tutup' }}
                            </span>
                        </div>
                        
                        @if($stall->status == 'buka')
                            <a href="https://wa.me/{{ $stall->phone ?? '628138195672' }}?text={{ urlencode('Halo ' . $stall->name . ', saya ingin bertanya tentang menu hari ini.') }}" target="_blank" class="h-8 w-8 bg-green-100 text-green-600 rounded-xl flex items-center justify-center hover:bg-green-500 hover:text-white transition-all text-xs" title="Hubungi Stan">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        @else
                            <button disabled class="h-8 w-8 bg-slate-200 text-slate-400 rounded-xl flex items-center justify-center cursor-not-allowed text-xs" title="Kantin Sedang Tutup">
                                <i class="fas fa-ban"></i>
                            </button>
                        @endif
                    </li>
                    @empty
                    <li class="text-xs text-slate-400 italic py-4 text-center">Belum ada stan terdaftar.</li>
                    @endforelse
                </ul>
            </div>

        </aside>

        <section class="flex-1 animate-fade" style="animation-delay: 0.4s;">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-black text-slate-900">
                    @if(request('search'))
                        Hasil Pencarian: "{{ request('search') }}" 🔍
                    @else
                        {{ request('category') ? request('category') : 'Rekomendasi Hari Ini 🔥' }}
                    @endif
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                
                @forelse($menus as $menu)
                @php 
                    // Logika Status Baru: Membaca string 'buka' dari kolom status di tabel stalls
                    $isStallOpen = $menu->stall ? ($menu->stall->status == 'buka') : false; 
                @endphp

                <div class="glass-card rounded-3xl p-5 flex flex-col group relative {{ $isStallOpen ? '' : 'grayscale opacity-75' }}">
                    
                    <div class="relative overflow-hidden rounded-2xl mb-5 bg-slate-100 h-52 w-full flex items-center justify-center">
                        @if($menu->image)
                            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mb-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                                <span class="text-[10px] font-bold tracking-wide uppercase">No Image Available</span>
                            </div>
                        @endif

                        @if(!$isStallOpen)
                            <div class="absolute inset-0 bg-black/40 backdrop-blur-xs flex items-center justify-center z-10">
                                <span class="bg-red-600 text-white text-xs font-black px-4 py-2 rounded-xl tracking-wider shadow-lg">KANTIN TUTUP</span>
                            </div>
                        @endif

                        <span class="absolute bottom-3 left-3 bg-white/90 backdrop-blur-sm text-orange-700 text-xs font-bold px-3 py-1.5 rounded-xl shadow-sm">
                            <i class="fas fa-store mr-1"></i> {{ $menu->stall->name ?? 'Kantin Sekolah' }}
                        </span>
                    </div>
                    
                    <div class="flex-grow">
                        <span class="bg-orange-100 text-orange-700 text-[10px] font-black px-2.5 py-1 rounded-md tracking-wider uppercase mb-2 inline-block">
                            {{ $menu->category ?? 'Umum' }}
                        </span>
                        <h4 class="text-xl font-bold text-slate-900 leading-tight mb-2">{{ $menu->name }}</h4>
                        <p class="text-slate-500 text-sm mb-4 line-clamp-2">
                            {{ $menu->description ?? 'Nikmati hidangan lezat dan higienis ini langsung dari stan kantin terpercaya kami.' }}
                        </p>
                    </div>
                    
                    <div class="mt-auto border-t border-slate-100 pt-4 flex items-center justify-between">
                        <p class="text-2xl font-black text-orange-500">Rp{{ number_format($menu->price, 0, ',', '.') }}</p>
                        
                        @if($isStallOpen)
                            @php 
                                $whatsappNumber = $menu->stall->phone ?? '628138195672';
                                $messageText = urlencode("Halo " . ($menu->stall->name ?? 'Kantin') . ", saya ingin memesan " . $menu->name . ". Mohon disiapkan untuk jam istirahat ya, terima kasih!"); 
                            @endphp
                            <a href="https://wa.me/{{ $whatsappNumber }}?text={{ $messageText }}" target="_blank" class="btn-order h-12 w-12 bg-gradient-to-r from-green-400 to-green-500 text-white rounded-2xl flex items-center justify-center hover:shadow-lg hover:shadow-green-200 hover:-translate-y-1 transition-all text-xl cursor-pointer">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        @else
                            <button disabled class="h-12 w-12 bg-slate-300 text-slate-400 rounded-2xl flex items-center justify-center cursor-not-allowed text-xl">
                                <i class="fas fa-ban"></i>
                            </button>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 text-center bg-white/50 rounded-3xl border border-dashed border-slate-200 glass-card">
                    <div class="inline-block p-4 bg-orange-50 text-orange-500 rounded-full mb-4 animate-bounce">
                        <i class="fas fa-search-minus text-4xl"></i>
                    </div>
                    <p class="font-bold text-lg text-slate-700">Waduh, Jajanan Tidak Ditemukan!</p>
                    <p class="text-sm text-slate-400 mt-1 max-w-sm mx-auto">Kata kunci "{{ request('search') }}" tidak cocok dengan menu kami. Coba cari kata kunci lain seperti 'Ayam', 'Es', atau 'Gorengan'.</p>
                    <div class="mt-6">
                        <a href="{{ route('pembeli.index') }}" class="px-5 py-2.5 bg-gradient-to-r from-orange-500 to-yellow-400 text-white text-xs font-bold rounded-xl shadow-md hover:shadow-lg transition-all">
                            See All Menu
                        </a>
                    </div>
                </div>
                @endforelse

            </div>
        </section>
    </main>

</body>
</html>