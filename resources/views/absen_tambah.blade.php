<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Absen Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; display: flex; align-items: center; min-height: 100vh; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); width: 100%; max-width: 500px; margin: auto; }
    </style>
</head>
<body>
    <div class="card p-4">
        <h4 class="fw-bold mb-4 text-center">Input Absensi Baru</h4>

        @if ($errors->any())
            <div class="alert alert-danger py-2">
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/absen/store" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nomor Absen</label>
                <input type="number" name="no_absen" class="form-control" placeholder="1" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama siswa" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status Kehadiran</label>
                <select name="keterangan" class="form-select" required>
                    <option value="" selected disabled>-- Pilih Status --</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Izin">Izin</option>
                </select>
            </div>
            <input type="hidden" name="kelas" value="XI RPL 2">

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary py-2">Kirim & Simpan</button>
                <a href="/absen" class="btn btn-light border py-2">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
