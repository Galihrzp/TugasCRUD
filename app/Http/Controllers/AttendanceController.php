<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller {
    public function index() {
        // Ambil semua data absen, urutkan berdasarkan no_absen
        $data_absen = Attendance::orderBy('no_absen', 'asc')->get();
        return view('absensi', compact('data_absen'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:attendances,name',
            'kelas' => 'required',
            'no_absen' => 'required|numeric|unique:attendances,no_absen',
            'keterangan' => 'required'
        ],
        [
            // Pesan error khusus untuk validasi
            'name.unique' => 'Nama ini sudah terdaftar.',
            'no_absen.unique' => 'Nomor absen ini sudah terisi.',
        ]);

        \App\Models\Attendance::create($validated);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function destroy($id)
    {
    $absen = \App\Models\Attendance::findOrFail($id);
    $absen->delete();

    return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
