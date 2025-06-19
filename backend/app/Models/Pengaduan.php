<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_laporan',
        'nama',
        'ktp',
        'kategori',
        'lokasi_kejadian',
        'isi_laporan',
        'bukti_foto',
        'setuju',
        'tiket_lacak',
    ];

    protected $table = 'pengaduan';
}
