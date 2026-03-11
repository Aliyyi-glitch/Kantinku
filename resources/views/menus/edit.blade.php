@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4">
            <h4 class="fw-bold text-center mb-4">Edit Menu: {{ $menu->nama_makanan }}</h4>
            
            <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="mb-3">
                    <label class="form-label">Nama Makanan/Minuman</label>
                    <input type="text" name="nama_makanan" class="form-control" value="{{ $menu->nama_makanan }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Kantin (Stall)</label>
                    <select name="stall_id" class="form-select" required>
                        @foreach($stalls as $stall)
                            <option value="{{ $stall->id }}" {{ $menu->stall_id == $stall->id ? 'selected' : '' }}>
                                {{ $stall->nama_kantin }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="harga" class="form-control" value="{{ $menu->harga }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold">Update Data Menu</button>
                <a href="{{ route('menus.index') }}" class="btn btn-link w-100 text-secondary mt-2">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection