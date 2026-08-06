<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang - Inventaris</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .card {
            background: #ffffff;
            width: 100%;
            max-width: 550px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .card-header {
            background: #2563eb;
            color: #ffffff;
            padding: 20px 28px;
        }

        .card-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .card-body {
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

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%3a6b7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            cursor: pointer;
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
</head>
<body>

<div class="card">
    <div class="card-header">
        <h2>Tambah Data Barang</h2>
    </div>
    
    <div class="card-body">

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

        <form action="{{ route('barang.store') }}" method="POST">
            @csrf

            {{-- Kategori --}}
            <div class="form-group">
                <label for="id_kategori">Kategori Barang <span class="required">*</span></label>
                <select name="id_kategori" id="id_kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id_kategori }}" {{ old('id_kategori') == $item->id_kategori ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Kode Barang --}}
            <div class="form-group">
                <label for="kode_barang">Kode Barang <span class="required">*</span></label>
                <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="{{ old('kode_barang') }}" placeholder="Contoh: BRG-001" required>
            </div>

            {{-- Nama Barang --}}
            <div class="form-group">
                <label for="nama_barang">Nama Barang <span class="required">*</span></label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ old('nama_barang') }}" placeholder="Masukkan nama barang" required>
            </div>

            {{-- Kondisi --}}
            <div class="form-group">
                <label for="kondisi">Kondisi Barang <span class="required">*</span></label>
                <select name="kondisi" id="kondisi" class="form-control" required>
                    <option value="">-- Pilih Kondisi --</option>
                    <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
            </div>

            {{-- Tombol Aksi --}}
            <div class="form-actions">
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Barang</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>