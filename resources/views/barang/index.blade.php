<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang - Inventaris Aset</title>
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
            padding: 30px 20px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* Top Header Area */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .page-title h1 {
            font-size: 1.6rem;
            color: #1e293b;
            font-weight: 700;
        }

        .page-title p {
            font-size: 0.875rem;
            color: #64748b;
            margin-top: 4px;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: #2563eb;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .btn-edit {
            background-color: #f59e0b;
            color: #ffffff;
            padding: 6px 12px;
            font-size: 0.8rem;
        }

        .btn-edit:hover {
            background-color: #d97706;
        }

        .btn-delete {
            background-color: #ef4444;
            color: #ffffff;
            padding: 6px 12px;
            font-size: 0.8rem;
        }

        .btn-delete:hover {
            background-color: #dc2626;
        }

        /* Flash Message Alert */
        .alert-success {
            background-color: #ecfdf5;
            border-left: 4px solid #10b981;
            color: #065f46;
            padding: 14px 18px;
            border-radius: 6px;
            margin-bottom: 24px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Card & Table */
        .card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.9rem;
        }

        thead {
            background-color: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
        }

        th {
            padding: 14px 20px;
            color: #475569;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        td {
            padding: 16px 20px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
            vertical-align: middle;
        }

        tbody tr:hover {
            background-color: #f8fafc;
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-kategori {
            background-color: #eff6ff;
            color: #1d4ed8;
            border: 1px solid #bfdbfe;
        }

        .badge-baik {
            background-color: #dcfce7;
            color: #15803d;
        }

        .badge-rusak-ringan {
            background-color: #fef3c7;
            color: #b45309;
        }

        .badge-rusak-berat {
            background-color: #fee2e2;
            color: #b91c1c;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            color: #94a3b8;
        }

        .empty-state p {
            margin-top: 8px;
            font-size: 0.95rem;
        }

        /* Actions Column Alignment */
        .action-buttons {
            display: flex;
            gap: 8px;
        }
    </style>
</head>
<body>

<div class="container">

    {{-- Top Header --}}
    <div class="page-header">
        <div class="page-title">
            <h1>Daftar Inventaris Barang</h1>
            <p>Kelola seluruh aset dan inventaris barang sekolah</p>
        </div>
        <a href="{{ route('barang.create') }}" class="btn btn-primary">
            + Tambah Barang
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Card & Tabel Barang --}}
    <div class="card">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Kondisi</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barang as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $item->kode_barang }}</strong></td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>
                                <span class="badge badge-kategori">
                                    {{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                                </span>
                            </td>
                            <td>
                                @if ($item->kondisi == 'Baik')
                                    <span class="badge badge-baik">Baik</span>
                                @elseif ($item->kondisi == 'Rusak Ringan')
                                    <span class="badge badge-rusak-ringan">Rusak Ringan</span>
                                @else
                                    <span class="badge badge-rusak-berat">Rusak Berat</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('barang.edit', $item->id_barang) }}" class="btn btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('barang.destroy', $item->id_barang) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <h3>Belum Ada Data Barang</h3>
                                    <p>Klik tombol "Tambah Barang" di atas untuk menambahkan data pertama kamu.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>