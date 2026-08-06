<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajuan - Inventaris</title>
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
            max-width: 900px;
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
            font-size: 0.9rem;
        }

        th {
            background-color: #f8fafc;
            color: #4b5563;
            padding: 12px 16px;
            border-bottom: 2px solid #e5e7eb;
            font-weight: 600;
        }

        td {
            padding: 12px 16px;
            border-bottom: 1px solid #f3f4f6;
            color: #374151;
        }

        tr:hover {
            background-color: #f9fafb;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 50px;
        }

        .badge-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-approved {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge-rejected {
            background-color: #fee2e2;
            color: #991b1b;
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

        .btn-primary {
            background-color: #2563eb;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .btn-warning {
            background-color: #f59e0b;
            color: #ffffff;
            padding: 6px 12px;
            font-size: 0.8rem;
        }

        .btn-warning:hover {
            background-color: #d97706;
        }

        .btn-danger {
            background-color: #ef4444;
            color: #ffffff;
            padding: 6px 12px;
            font-size: 0.8rem;
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }

        .action-group {
            display: flex;
            gap: 6px;
        }

        .empty-state {
            text-align: center;
            padding: 30px;
            color: #6b7280;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="card-header">
        <h2>Daftar Pengajuan</h2>
        <a href="{{ route('pengajuan.create') }}" class="btn btn-primary" style="background-color: #ffffff; color: #2563eb;">+ Tambah Pengajuan</a>
    </div>
    
    <div class="card-body">

        {{-- Alert Notifikasi Sukses --}}
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Kode</th>
                        <th>Nama Pemohon</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th style="width: 140px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengajuan as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><strong>{{ $item->kode_pengajuan }}</strong></td>
                            <td>{{ $item->nama_pemohon }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>
                                @if ($item->status == 'Pending')
                                    <span class="badge badge-pending">Pending</span>
                                @elseif ($item->status == 'Disetujui')
                                    <span class="badge badge-approved">Disetujui</span>
                                @else
                                    <span class="badge badge-rejected">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-group" style="justify-content: center;">
                                    <a href="{{ route('pengajuan.edit', $item->id_pengajuan) }}" class="btn btn-warning">Edit</a>
                                    
                                    <form action="{{ route('pengajuan.destroy', $item->id_pengajuan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty-state">
                                Belum ada data pengajuan.
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