<x-app-layout>
    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-4 bg-emerald-100 text-emerald-800 rounded-2xl font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-gradient-to-r from-slate-800 to-slate-950 rounded-3xl p-8 mb-8 shadow-xl text-white flex justify-between items-center">
                <div>
                    <h2 class="text-3xl font-black mb-2">Panel Utama Admin 🛡️</h2>
                    <p class="text-slate-400">Manajemen akun dan hak akses pedagang Kantinku.</p>
                </div>
                <a href="{{ route('admin.pedagang.create') }}" class="bg-emerald-500 text-white px-5 py-3 rounded-2xl font-bold hover:bg-emerald-600 transition shadow-lg text-sm">
                    + Tambah Pedagang Baru
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-slate-100">
                <div class="p-8">
                    <h3 class="text-xl font-black text-slate-800 mb-6">Daftar Akun Pedagang Aktif</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 text-xs uppercase border-b border-slate-100">
                                    <th class="p-4 font-bold">No</th>
                                    <th class="p-4 font-bold">Nama Pemilik</th>
                                    <th class="p-4 font-bold">Email Akun</th>
                                    <th class="p-4 font-bold">Nama Kantin</th>
                                    <th class="p-4 font-bold">No. WA Toko</th>
                                    <th class="p-4 font-bold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-slate-700 text-sm divide-y divide-slate-50">
                                @forelse($pedagang as $index => $p)
                                <tr class="hover:bg-slate-50/80 transition">
                                    <td class="p-4 font-medium">{{ $index + 1 }}</td>
                                    <td class="p-4 font-bold text-slate-900">{{ $p->name }}</td>
                                    <td class="p-4 text-slate-500">{{ $p->email }}</td>
                                    <td class="p-4">
                                        @if($p->stall)
                                            <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-bold">
                                                {{ $p->stall->name }}
                                            </span>
                                        @else
                                            <span class="bg-slate-100 text-slate-400 px-3 py-1 rounded-full text-xs font-medium italic">
                                                Belum Setup Toko
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-slate-600">{{ $p->stall->phone ?? '-' }}</td>
                                    <td class="p-4 flex justify-center gap-2">
                                        <form action="{{ route('admin.pedagang.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pedagang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-50 text-red-600 px-4 py-2 rounded-xl font-bold hover:bg-red-100 transition text-xs">
                                                Hapus Akun
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="p-8 text-center text-slate-400 italic">Belum ada data pedagang yang terdaftar.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>