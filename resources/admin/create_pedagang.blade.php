<x-app-layout>
    <div class="py-12 bg-slate-50 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-md border border-slate-100">
            <h2 class="text-2xl font-black text-slate-900 mb-2">Registrasi Pedagang Baru</h2>
            <p class="text-sm text-slate-500 mb-6">Buatkan akun akses login resmi untuk pemilik stan kantin.</p>

            <form method="POST" action="{{ route('admin.pedagang.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Nama Lengkap Pemilik</label>
                    <input type="text" name="name" class="w-full px-4 py-2.5 rounded-xl border-slate-200 focus:ring-slate-800 focus:border-slate-800" required placeholder="Contoh: Pak Asep">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Alamat Email</label>
                    <input type="email" name="email" class="w-full px-4 py-2.5 rounded-xl border-slate-200 focus:ring-slate-800 focus:border-slate-800" required placeholder="asep@gmail.com">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-slate-700 mb-1">Password Awal</label>
                    <input type="password" name="password" class="w-full px-4 py-2.5 rounded-xl border-slate-200 focus:ring-slate-800 focus:border-slate-800" required placeholder="Minimal 8 Karakter">
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('admin.pedagang.index') }}" class="w-1/2 text-center bg-slate-100 text-slate-700 py-3 rounded-xl font-bold text-sm hover:bg-slate-200 transition">Batal</a>
                    <button type="submit" class="w-1/2 bg-slate-900 text-white py-3 rounded-xl font-bold text-sm hover:bg-slate-800 transition">Daftarkan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>