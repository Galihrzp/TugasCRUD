<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Absensi XI RPL 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; padding-top: 50px; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .table thead { background-color: #4e73df; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-dark m-0">Data Absensi XI RPL 2</h3>
                <a href="/absen/tambah" class="btn btn-primary shadow-sm">+ Tambah Siswa</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Nama Siswa</th>
                            <th>Keterangan</th>
                            <th width="20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data_absen as $row)
                        <tr class="align-middle">
                            <td>{{ $row->no_absen }}</td>
                            <td class="fw-semibold">{{ $row->name }}</td>
                            <td>
                                @if($row->keterangan == 'Hadir')
                                    <span class="badge bg-success">Hadir</span>
                                @elseif($row->keterangan == 'Sakit')
                                    <span class="badge bg-danger">Sakit</span>
                                @else
                                    <span class="badge bg-warning text-dark">Izin</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="/absen/edit/{{ $row->id }}" class="btn btn-sm btn-outline-info me-1">Edit</a>
                                <a href="/absen/hapus/{{ $row->id }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data absen hari ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
