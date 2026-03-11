@extends('layouts.app') @section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Daftar Menu Kantin</h2>
    <a href="{{ route('menus.create') }}" class="btn btn-primary">Tambah Menu</a>
</div>

<table class="table table-bordered bg-white">
    <thead class="table-warning">
        <tr>
            <th>No</th>
            <th>Nama Makanan</th>
            <th>Kantin (Kategori)</th> <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $menu)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $menu->nama_makanan }}</td>
            <td>
                <span class="badge bg-info text-dark">{{ $menu->stall->nama_kantin }}</span>
            </td>
            <td>Rp {{ number_format($menu->harga) }}</td>
            <td>
                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection