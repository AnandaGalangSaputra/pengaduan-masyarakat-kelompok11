<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_status_pengaduan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'log_status_pengaduan';
    public $timestamps = false; // karena kamu pakai waktu_perubahan manual
}
