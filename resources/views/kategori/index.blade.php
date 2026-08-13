@extends('layouts.app')

@section('title', 'Kategori')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1>Data Kategori</h1>

            <p class="text-muted">
                Kelola kategori barang inventaris
            </p>

        </div>

        <a href="{{ route('kategori.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-lg"></i>

            Tambah Kategori

        </a>

    </div>


    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($kategori as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->nama_kategori }}
                                </td>

                                <td>
                                    {{ $item->deskripsi ?? '-' }}
                                </td>

                                <td>

                                    <a href="{{ route('kategori.edit', $item->id) }}"
                                       class="btn btn-sm btn-warning">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4"
                                    class="text-center">

                                    Belum ada kategori.

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