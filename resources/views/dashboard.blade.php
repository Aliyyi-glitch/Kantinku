@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
            <h3 class="fw-bold mb-4">Dashboard Manajemen Kantinku</h3>
            <p>Pantau dan kelola ketersediaan menu kantin dengan mudah dalam satu kendali sistem yang terintegrasi.</p>
            <hr>
            <div class="mt-4">
                <a href="{{ route('menus.index') }}" class="btn btn-warning fw-bold">
                    Lihat Daftar Menu
                </a>
                <a href="{{ route('menus.create') }}" class="btn btn-outline-primary ms-2">
                    Tambah Menu Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection