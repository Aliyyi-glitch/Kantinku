<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-slate-50 via-orange-50/30 to-slate-100 p-6">
        
        <div class="w-full max-w-md bg-white/80 backdrop-blur-md border border-slate-200/80 p-8 rounded-3xl shadow-xl shadow-slate-100">
            
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center bg-gradient-to-tr from-amber-500 to-orange-500 text-white w-12 h-12 rounded-2xl shadow-lg shadow-amber-500/30 mb-4 text-xl">
                    <i class="fas fa-store-alt"></i>
                </div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight">Kemitraan <span class="text-orange-500">Kantin</span></h2>
                <p class="text-xs text-slate-400 mt-1 font-medium">Daftarkan tokomu dan mulai jualan digital sekarang.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Nama Pemilik / Stan -->
                <div>
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Nama Pemilik / Stan</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"><i class="far fa-user"></i></span>
                        <!-- Ditambahkan value="{{ old('name') }}" -->
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                            class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border @error('name') border-red-500/50 focus:ring-red-500/20 @else border-slate-200 focus:ring-orange-500/20 focus:border-orange-500 @enderror rounded-2xl focus:outline-none focus:ring-2 text-sm text-slate-700 transition-all" placeholder="Contoh: Kantin Mbak Sri" />
                    </div>
                    <!-- Pesan Error Dinamis -->
                    @error('name')
                        <p class="text-[11px] text-red-500 font-semibold mt-1 pl-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Penjual -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Email Penjual</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"><i class="far fa-envelope"></i></span>
                        <!-- Ditambahkan value="{{ old('email') }}" -->
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
                            class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border @error('email') border-red-500/50 focus:ring-red-500/20 @else border-slate-200 focus:ring-orange-500/20 focus:border-orange-500 @enderror rounded-2xl focus:outline-none focus:ring-2 text-sm text-slate-700 transition-all" placeholder="penjual@email.com" />
                    </div>
                    <!-- Pesan Error Dinamis (Misal: Email sudah terdaftar) -->
                    @error('email')
                        <p class="text-[11px] text-red-500 font-semibold mt-1 pl-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buat Password -->
                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Buat Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"><i class="fas fa-lock"></i></span>
                        <input id="password" type="password" name="password" required autocomplete="new-password" 
                            class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border @error('password') border-red-500/50 focus:ring-red-500/20 @else border-slate-200 focus:ring-orange-500/20 focus:border-orange-500 @enderror rounded-2xl focus:outline-none focus:ring-2 text-sm text-slate-700 transition-all" placeholder="••••••••" />
                    </div>
                    <!-- Pesan Error Dinamis (Misal: Kurang dari 8 Karakter) -->
                    @error('password')
                        <p class="text-[11px] text-red-500 font-semibold mt-1 pl-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Konfirmasi Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"><i class="fas fa-check-double"></i></span>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" 
                            class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 text-sm text-slate-700 transition-all" placeholder="••••••••" />
                    </div>
                </div>

                <!-- Button -->
                <div class="pt-3">
                    <button type="submit" class="w-full bg-gradient-to-r from-orange-500 to-amber-500 text-white font-bold py-3 px-4 rounded-2xl shadow-lg shadow-orange-500/20 hover:shadow-xl hover:shadow-orange-500/30 hover:-translate-y-0.5 transition-all duration-300">
                        Ajukan Pendaftaran Stan
                    </button>
                </div>

                <!-- Footer Link -->
                <div class="text-center text-xs text-slate-400 mt-6 pt-3 border-t border-slate-100 flex items-center justify-center gap-1">
                    Sudah punya akun mitra? 
                    <a class="text-orange-500 font-bold hover:underline" href="{{ route('login') }}">
                        Login di sini
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>