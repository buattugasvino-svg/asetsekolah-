@extends('layouts.app')

@section('title', 'Barang')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="mb-1">Data Barang</h1>

            <p class="text-muted mb-0">
                Kelola data barang inventaris sekolah
            </p>
        </div>

        <a href="{{ route('barang.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-lg me-1"></i>

            Tambah Barang

        </a>

    </div>


    {{-- CARD TABLE --}}
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
                                Nama Barang
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Jumlah
                            </th>

                            <th>
                                Kondisi
                            </th>

                            <th width="180">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($barang as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->nama_barang }}
                                </td>

                                <td>
                                    {{ $item->kategori->nama_kategori ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->jumlah }}
                                </td>

                                <td>
                                    {{ $item->kondisi }}
                                </td>

                                <td>

                                    <a href="{{ route('barang.edit', $item->id) }}"
                                       class="btn btn-sm btn-warning">

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    <form action="{{ route('barang.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus barang ini?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-4">

                                    Belum ada data barang.

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