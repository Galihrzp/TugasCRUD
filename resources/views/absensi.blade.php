<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi XI RPL 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="py-5">

<div class="container">
    <div class="main-card">
        <h2 class="header-title">Absensi Siswa - XI RPL 2</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                </ul>
            </div>
        @endif
        
        <form action="/absen" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama siswa" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label fw-bold">No Absen</label>
                    <input type="number" name="no_absen" class="form-control" placeholder="00" required>
                </div>
                <div class="col-md-5 mb-3">
                    <label class="form-label fw-bold">Keterangan</label>
                    <select name="keterangan" class="form-select" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Izin">Izin</option>
                    </select>
                </div>
            </div>
            
            <input type="hidden" name="kelas" value="XI RPL 2">
            
            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-submit text-white px-4">Kirim Absensi</button>
            </div>
        </form>
    </div>

    <div class="main-card">
        <h3 class="header-title">Daftar Hadir Siswa</h3>
        <div class="table-responsive">
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_absen as $row)
                    <tr class="align-middle">
                        <td>{{ $row->no_absen }}</td>
                        <td class="fw-semibold">{{ $row->name }}</td>
                        <td>{{ $row->kelas }}</td>
                        <td class="text-center">
                            @if($row->keterangan == 'Hadir')
                                <span class="badge bg-success badge-custom">Hadir</span>
                            @elseif($row->keterangan == 'Sakit')
                                <span class="badge bg-danger badge-custom">Sakit</span>
                            @elseif($row->keterangan == 'Izin')
                                <span class="badge bg-warning text-dark badge-custom">Izin</span>
                            @else
                                <span class="badge bg-secondary badge-custom">{{ $row->keterangan }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/absen/hapus/{{ $row->id }}" 
                               class="btn btn-outline-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                               Hapus
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>