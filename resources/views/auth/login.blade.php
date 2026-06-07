<x-guest-layout>
    <div
        class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-slate-50 via-orange-50/30 to-slate-100 p-6">

        <!-- Box Login Minimalis -->
        <div
            class="w-full max-w-md bg-white/80 backdrop-blur-md border border-slate-200/80 p-8 rounded-3xl shadow-xl shadow-slate-100">

            <!-- Header Halaman -->
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center bg-gradient-to-tr from-orange-500 to-amber-500 text-white w-12 h-12 rounded-2xl shadow-lg shadow-orange-500/30 mb-4 text-xl">
                    <i class="fas fa-store"></i>
                </div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight">KantinKu <span
                        class="text-orange-500">Merchant</span></h2>
                <p class="text-xs text-slate-400 mt-1 font-medium">Masuk untuk mengelola menu jualan & memantau tokomu.
                </p>
            </div>

            <!-- Alert Clue Pendaftaran Sukses -->
            @if(session('success'))
                <div
                    class="mb-5 flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3.5 rounded-2xl text-xs font-medium animate-fade-in shadow-sm">
                    <i class="fas fa-check-circle text-sm text-emerald-500 mt-0.5"></i>
                    <div>
                        <strong class="font-bold">Berhasil!</strong>
                        <p class="text-emerald-600/90 mt-0.5">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email"
                        class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Email Pemilik
                        Stan</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"><i
                                class="far fa-envelope"></i></span>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            autocomplete="username"
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 text-sm text-slate-700 transition-all"
                            placeholder="nama@emailkantin.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password"
                        class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Password
                        Akun</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"><i
                                class="fas fa-lock"></i></span>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 text-sm text-slate-700 transition-all"
                            placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between text-xs font-medium pt-1">
                    <label for="remember_me" class="inline-flex items-center text-slate-500 cursor-pointer">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-slate-300 text-orange-500 focus:ring-orange-500/30" name="remember">
                        <span class="ms-2">Ingat Akun Saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-orange-500 hover:text-orange-600 transition" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif
                </div>

                <!-- Action Button -->
                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-orange-500 to-amber-500 text-white font-bold py-3.5 px-4 rounded-2xl shadow-lg shadow-orange-500/20 hover:shadow-xl hover:shadow-orange-500/30 hover:-translate-y-0.5 transition-all duration-300">
                        Masuk Ke Ruang Pengelola
                    </button>
                </div>

                <!-- Footer Info -->
                <div class="text-center text-xs text-slate-400 mt-6 pt-4 border-t border-slate-100">
                    Bukan pedagang kantin?
                    <a href="{{ url('/') }}" class="text-orange-500 font-bold hover:underline">Kembali Jajan</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>