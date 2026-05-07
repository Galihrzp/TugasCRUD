<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['name', 'kelas', 'no_absen', 'keterangan'];
}
