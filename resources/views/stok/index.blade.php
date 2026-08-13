@extends('layouts.app')

@section('title', 'Stok')

@section('content')

<div class="container-fluid">

    {{-- ================= HEADER ================= --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1 class="mb-1">
                Data Stok Barang
            </h1>

            <p class="text-muted mb-0">
                Kelola stok barang inventaris sekolah
            </p>

        </div>


        {{-- TAMBAH STOK --}}
        <a href="{{ route('stok.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-lg me-1"></i>

            Tambah Stok

        </a>

    </div>



    {{-- ================= ALERT ================= --}}
    @if (session('success'))

        <div class="alert alert-success alert-dismissible fade show"
             role="alert">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif



    {{-- ================= TABLE ================= --}}
    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th>
                                ID Stok
                            </th>

                            <th>
                                ID Barang
                            </th>

                            <th>
                                Nama Barang
                            </th>

                            <th>
                                Jumlah
                            </th>

                            <th width="180"
                                class="text-center">

                                Aksi

                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($stok as $index => $item)

                            <tr>

                                {{-- NO --}}
                                <td>

                                    {{ $index + 1 }}

                                </td>


                                {{-- ID STOK --}}
                                <td>

                                    <strong>
                                        {{ $item->id_stok }}
                                    </strong>

                                </td>


                                {{-- ID BARANG --}}
                                <td>

                                    {{ $item->id_barang }}

                                </td>


                                {{-- NAMA BARANG --}}
                                <td>

                                    {{ $item->barang->nama_barang ?? '-' }}

                                </td>


                                {{-- JUMLAH --}}
                                <td>

                                    <span class="badge bg-primary">

                                        {{ $item->jumlah }}

                                    </span>

                                </td>


                                {{-- AKSI --}}
                                <td class="text-center">

                                    <div class="d-flex justify-content-center gap-2">


                                        {{-- EDIT --}}
                                        <a href="{{ route('stok.edit', $item->id_stok) }}"
                                           class="btn btn-sm btn-warning">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- HAPUS --}}
                                        <form action="{{ route('stok.destroy', $item->id_stok) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data stok ini?')">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>


                                    </div>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-5">

                                    <div class="text-muted">

                                        <i class="bi bi-inbox"
                                           style="font-size: 40px;">
                                        </i>

                                        <p class="mt-2 mb-0">

                                            Belum ada data stok barang.

                                        </p>

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