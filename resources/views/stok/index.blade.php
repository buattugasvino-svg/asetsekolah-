<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Stok - Inventaris</title>
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
            align-items: flex-start;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 900px;
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .card-header {
            background: #2563eb;
            color: #ffffff;
            padding: 20px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .card-body {
            padding: 28px;
        }

        .alert-success {
            background-color: #ecfdf5;
            border-left: 4px solid #10b981;
            color: #065f46;
            padding: 12px 16px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 0.875rem;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.95rem;
        }

        table th, table td {
            padding: 12px 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        table th {
            background-color: #f9fafb;
            color: #374151;
            font-weight: 600;
        }

        table tbody tr:hover {
            background-color: #f9fafb;
        }

        .sub-id {
            display: block;
            font-size: 0.8rem;
            color: #6b7280;
            margin-top: 2px;
        }

        .badge-stok {
            display: inline-block;
            padding: 4px 10px;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 20px;
            background-color: #e0e7ff;
            color: #3730a3;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: background-color 0.2s;
        }

        .btn-add {
            background-color: #ffffff;
            color: #2563eb;
        }

        .btn-add:hover {
            background-color: #f3f4f6;
        }

        .btn-warning {
            background-color: #f59e0b;
            color: #ffffff;
            margin-right: 4px;
        }

        .btn-warning:hover {
            background-color: #d97706;
        }

        .btn-danger {
            background-color: #ef4444;
            color: #ffffff;
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }

        .text-center {
            text-align: center;
        }

        .action-group {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .empty-state {
            text-align: center;
            color: #6b7280;
            padding: 30px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Data Stok Barang</h2>
            <a href="{{ route('stok.create') }}" class="btn btn-add">+ Tambah Stok</a>
        </div>

        <div class="card-body">

            {{-- Pesan Sukses --}}
            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>ID Stok </th>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th style="width: 150px;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stok as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong>{{ $item->id_stok }}</strong>
                                    <span class="sub-id">ID Barang: {{ $item->id_barang }}</span>
                                </td>
                                <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                                <td>
                                    <span class="badge-stok">{{ $item->jumlah }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="action-group">
                                        <a href="{{ route('stok.edit', $item->id_stok) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('stok.destroy', $item->id_stok) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data stok ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-state">Belum ada data stok barang.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

</body>
</html>
