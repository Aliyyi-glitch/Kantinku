<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Tambah Menu Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100 p-8">
                
                <div class="flex items-center gap-3 mb-6">
                    <a href="{{ route('dashboard') }}" class="text-slate-400 hover:text-slate-600 transition">
                        <i class="fas fa-arrow-left text-lg"></i>
                    </a>
                    <h2 class="text-xl font-black text-slate-800">Form Tambah Menu Jajanan</h2>
                </div>

                <form action="{{ route('menus.store') }}" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Nama Menu</label>
                        <input type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-orange-500" placeholder="Contoh: Ayam Geprek Spesial" required>
                    </div>

                    <div class="mb-5">
                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Harga (Rp)</label>
                        <input type="number" name="price" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-orange-500" placeholder="Contoh: 15000" required>
                    </div>

                    <div class="mb-5">
                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Kategori</label>
                        <select name="category" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-orange-500" required>
                            <option value="Makanan Berat">Makanan Berat</option>
                            <option value="Minuman Segar">Minuman Segar</option>
                            <option value="Jajanan Ringan">Jajanan Ringan</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Deskripsi Menu</label>
                        <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-orange-500" placeholder="Gambarkan kelezatan menu ini..." required></textarea>
                    </div>

                    <div class="mt-8 flex justify-end gap-3">
                        <a href="{{ route('dashboard') }}" class="px-6 py-3 rounded-xl border border-slate-200 text-slate-500 text-sm font-bold hover:bg-slate-50 transition">
                            Batal
                        </a>
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold text-sm px-6 py-3 rounded-xl transition duration-200 shadow-md">
                            Tambah Jajanan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>