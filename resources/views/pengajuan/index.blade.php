@extends('layouts.app')

@section('title', 'Pengajuan')

@section('content')

<div class="container-fluid">

```
{{-- ================= HEADER ================= --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="mb-1">Daftar Pengajuan</h1>

        <p class="text-muted mb-0">
            Kelola data pengajuan inventaris sekolah
        </p>
    </div>

    <a href="{{ route('pengajuan.create') }}"
       class="btn btn-primary">

        <i class="bi bi-plus-lg me-1"></i>

        Tambah Pengajuan

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
                            Kode
                        </th>

                        <th>
                            Nama Pemohon
                        </th>

                        <th>
                            Barang
                        </th>

                        <th>
                            Jumlah
                        </th>

                        <th>
                            Status
                        </th>

                        <th width="180"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($pengajuan as $key => $item)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $key + 1 }}
                            </td>


                            {{-- KODE --}}
                            <td>

                                <strong>
                                    {{ $item->kode_pengajuan }}
                                </strong>

                            </td>


                            {{-- PEMOHON --}}
                            <td>
                                {{ $item->nama_pemohon }}
                            </td>


                            {{-- BARANG --}}
                            <td>
                                {{ $item->nama_barang }}
                            </td>


                            {{-- JUMLAH --}}
                            <td>
                                {{ $item->jumlah }}
                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if ($item->status == 'Pending')

                                    <span class="badge bg-warning text-dark">

                                        <i class="bi bi-clock me-1"></i>

                                        Pending

                                    </span>

                                @elseif ($item->status == 'Disetujui')

                                    <span class="badge bg-success">

                                        <i class="bi bi-check-circle me-1"></i>

                                        Disetujui

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        <i class="bi bi-x-circle me-1"></i>

                                        Ditolak

                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td class="text-center">

                                <div class="d-flex justify-content-center gap-2">


                                    {{-- EDIT --}}
                                    <a href="{{ route('pengajuan.edit', $item->id_pengajuan) }}"
                                       class="btn btn-sm btn-warning">

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    {{-- HAPUS --}}
                                    <form action="{{ route('pengajuan.destroy', $item->id_pengajuan) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')">

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

                            <td colspan="7"
                                class="text-center py-5">

                                <div class="text-muted">

                                    <i class="bi bi-inbox"
                                       style="font-size: 40px;">
                                    </i>

                                    <p class="mt-2 mb-0">

                                        Belum ada data pengajuan.

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
```

</div>

@endsection
