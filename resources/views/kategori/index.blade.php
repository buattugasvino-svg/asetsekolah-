@extends('layouts.app')

@section('title', 'Kategori')

@section('content')

<style>
    /* Styling khusus agar tinggi & presisi empty state persis seperti Halaman Stok */
    .empty-state-container {
        min-height: 260px; /* Menjaga tinggi area kosong agar konsisten */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
    }

    .empty-state-container i {
        font-size: 3.5rem;
        margin-bottom: 12px;
        opacity: 0.7;
        line-height: 1;
    }

    .empty-state-container p {
        margin: 0;
        font-size: 0.95rem;
    }
</style>

<div class="container-fluid p-0">

    {{-- Header Halaman & Tombol Tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h2 text-white fw-bold m-0">Data Kategori</h1>
            <p class="text-muted m-0 mt-1">
                Kelola kategori barang inventaris
            </p>
        </div>

        <a href="{{ route('kategori.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i>
            Tambah Kategori
        </a>
    </div>

    {{-- Card Tabel Kategori --}}
    <div class="card bg-dark border-secondary text-white">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 align-middle">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-uppercase text-muted small fw-bold" style="width: 80px;">NO</th>
                            <th class="px-4 py-3 text-uppercase text-muted small fw-bold">NAMA KATEGORI</th>
                            <th class="px-4 py-3 text-uppercase text-muted small fw-bold">DESKRIPSI</th>
                            <th class="px-4 py-3 text-uppercase text-muted small fw-bold text-center" style="width: 120px;">AKSI</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($kategori as $item)
                            <tr>
                                <td class="px-4 py-3">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-4 py-3 fw-semibold">
                                    {{ $item->nama_kategori }}
                                </td>

                                <td class="px-4 py-3 text-muted">
                                    {{ $item->deskripsi ?? '-' }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            {{-- Tampilan Kosong (Empty State dengan Ukuran Presisi) --}}
                            <tr>
                                <td colspan="4" class="p-0">
                                    <div class="empty-state-container">
                                        <i class="bi bi-inbox"></i>
                                        <p>Belum ada data kategori.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
