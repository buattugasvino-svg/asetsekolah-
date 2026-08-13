@extends('layouts.app') {{-- Sesuaikan 'layouts.app' dengan lokasi file master layout project Anda --}}

@section('content')
<style>
    /* CSS khusus untuk form penambahan kategori */
    .card-custom {
        background: #ffffff;
        width: 100%;
        max-width: 600px;
        margin: 20px auto;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .card-header-custom {
        background: #2563eb;
        color: #ffffff;
        padding: 20px 28px;
    }

    .card-header-custom h2 {
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0;
    }

    .card-body-custom {
        padding: 28px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: #4b5563;
    }

    .required {
        color: #ef4444;
    }

    .form-control {
        width: 100%;
        padding: 10px 14px;
        font-size: 0.95rem;
        border: 1.5px solid #d1d5db;
        border-radius: 6px;
        outline: none;
        transition: all 0.2s ease-in-out;
        background-color: #fafafa;
    }

    .form-control:focus {
        border-color: #2563eb;
        background-color: #ffffff;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .alert-error {
        background-color: #fef2f2;
        border-left: 4px solid #ef4444;
        color: #991b1b;
        padding: 12px 16px;
        border-radius: 4px;
        margin-bottom: 20px;
        font-size: 0.875rem;
    }

    .alert-error ul {
        padding-left: 20px;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid #f3f4f6;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 0.875rem;
        font-weight: 600;
        border-radius: 6px;
        text-decoration: none;
        cursor: pointer;
        border: none;
        transition: background-color 0.2s;
    }

    .btn-primary {
        background-color: #2563eb;
        color: #ffffff;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
    }

    .btn-secondary {
        background-color: #e5e7eb;
        color: #374151;
    }

    .btn-secondary:hover {
        background-color: #d1d5db;
    }
</style>

<div class="card-custom">
    <div class="card-header-custom">
        <h2>Tambah Data Kategori</h2>
    </div>

    <div class="card-body-custom">

        {{-- Alert Error Validasi --}}
        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            {{-- Kode Kategori --}}
            <div class="form-group">
                <label for="kode_kategori">Kode Kategori <span class="required">*</span></label>
                <input type="text" name="kode_kategori" id="kode_kategori" class="form-control" value="{{ old('kode_kategori') }}" placeholder="Contoh: KTG-001" required>
            </div>

            {{-- Nama Kategori --}}
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori <span class="required">*</span></label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{ old('nama_kategori') }}" placeholder="Masukkan nama kategori" required>
            </div>

            {{-- Deskripsi --}}
            <div class="form-group">
                <label for="deskripsi">Deskripsi Kategori</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan deskripsi kategori (opsional)">{{ old('deskripsi') }}</textarea>
            </div>

            {{-- Tombol Aksi --}}
            <div class="form-actions">
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Kategori</button>
            </div>

        </form>
    </div>
</div>
@endsection
