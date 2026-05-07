<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat data contoh 1
        Attendance::create([
            'name'       => 'Galih Pratama',
            'kelas'      => 'XI RPL 2',
            'no_absen'   => 1,
            'keterangan' => 'Hadir'
        ]);

        // Membuat data contoh 2
        Attendance::create([
            'name'       => 'Siti Aminah',
            'kelas'      => 'XI RPL 2',
            'no_absen'   => 2,
            'keterangan' => 'Izin'
        ]);
    }
}