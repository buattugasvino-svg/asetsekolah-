@extends('layouts.app')

@section('title', 'Barang')

@section('content')

<style>
    /* Styling khusus agar empty state dan tabel persis seperti halaman Stok */
    .empty-state-container {
        padding: 60px 0;
        text-align: center;
        color: #94a3b8;
    }

    .empty-state-container i {
        font-size: 3rem;
        display: block;
        margin-bottom: 12px;
        opacity: 0.7;
    }

    .empty-state-container p {
        margin: 0;
        font-size: 0.95rem;
    }
</style>

<div class="container-fluid p-0">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h2 text-white fw-bold m-0">Data Barang</h1>
            <p class="text-muted m-0 mt-1">
                Kelola data barang inventaris sekolah
            </p>
        </div>

        <a href="{{ route('barang.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i>
            Tambah Barang
        </a>
    </div>

    {{-- CARD TABLE --}}
    <div class="card bg-dark border-secondary text-white">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 align-middle">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-uppercase text-muted small fw-bold" style="width: 80px;">NO</th>
                            <th class="px-4 py-3 text-uppercase text-muted small fw-bold">NAMA BARANG</th>
                            <th class="px-4 py-3 text-uppercase text-muted small fw-bold">KATEGORI</th>
                            <th class="px-4 py-3 text-uppercase text-muted small fw-bold">JUMLAH</th>
                            <th class="px-4 py-3 text-uppercase text-muted small fw-bold">KONDISI</th>
                            <th class="px-4 py-3 text-uppercase text-muted small fw-bold text-center" style="width: 140px;">AKSI</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($barang as $item)
                            <tr>
                                <td class="px-4 py-3">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-4 py-3 fw-semibold">
                                    {{ $item->nama_barang }}
                                </td>

                                <td class="px-4 py-3 text-muted">
                                    {{ $item->kategori->nama_kategori ?? '-' }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $item->jumlah }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $item->kondisi }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            {{-- Tampilan Kosong (Empty State dengan Ikon Box) --}}
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state-container">
                                        <i class="bi bi-inbox"></i>
                                        <p>Belum ada data barang.</p>
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
