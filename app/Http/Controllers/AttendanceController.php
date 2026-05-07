<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller {
    public function index() {
    $data_absen = \App\Models\Attendance::orderBy('no_absen', 'asc')->get();
    return view('absen_index', compact('data_absen'));
}

public function create() {
    return view('absen_tambah');
}

public function store(Request $request) {
    $validated = $request->validate([
        'name' => 'required|unique:attendances,name',
        'no_absen' => 'required|numeric|unique:attendances,no_absen',
        'keterangan' => 'required',
        'kelas' => 'required'
    ]);
    \App\Models\Attendance::create($validated);
    return redirect('/absen')->with('success', 'Berhasil tambah data!');
}

public function edit($id) {
    $data = \App\Models\Attendance::findOrFail($id);
    return view('absen_edit', compact('data'));
}

public function update(Request $request, $id) {
    $data = \App\Models\Attendance::findOrFail($id);
    $validated = $request->validate([
        'name' => 'required|unique:attendances,name,'.$id,
        'no_absen' => 'required|numeric|unique:attendances,no_absen,'.$id,
        'keterangan' => 'required'
    ]);
    $data->update($validated);
    return redirect('/absen')->with('success', 'Berhasil update data!');
}

public function destroy($id) {
    \App\Models\Attendance::findOrFail($id)->delete();
    return redirect('/absen');
}
}