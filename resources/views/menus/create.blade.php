@extends('layouts.app') @section('content') <div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4">
            <h4 class="fw-bold text-center mb-4">Tambah Menu Baru</h4>
            
            <form action="{{ route('menus.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Makanan/Minuman</label>
                    <input type="text" name="nama_makanan" class="form-control" placeholder="Contoh: Es Teh Solo">
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Kantin (Stall)</label>
                    <select name="stall_id" class="form-select" required>
                        <option value="">-- Pilih Lokasi Kantin --</option>
                        @foreach($stalls as $stall)
                            <option value="{{ $stall->id }}">{{ $stall->nama_kantin }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="harga" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-warning w-100 fw-bold text-white">Simpan ke Daftar Menu</button>
            </form>
        </div>
    </div>
</div>
@endsection