<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penyusutan - Inventaris</title>
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
            <h2>Data Penyusutan Barang</h2>
            <a href="{{ route('penyusutan.create') }}" class="btn btn-add">+ Tambah Penyusutan</a>
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
                            <th>ID Penyusutan</th>
                            <th>Nama Barang</th>
                            <th>Nilai Penyusutan</th>
                            <th style="width: 150px;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penyusutan as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><strong>{{ $item->id_penyusutan }}</strong></td>
                                <td>{{ $item->barang->nama_barang ?? $item->id_barang }}</td>
                                <td>Rp {{ number_format($item->nilai_penyusutan, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <div class="action-group" style="justify-content: center;">
                                        <a href="{{ route('penyusutan.edit', $item->id_penyusutan) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('penyusutan.destroy', $item->id_penyusutan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-state">Belum ada data penyusutan.</td>
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
