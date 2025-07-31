<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Kolom yang bisa diisi (Mass Assignment)
     */

     protected $table = 'users';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'no_hp',
    ];

    /**
     * Kolom yang disembunyikan saat serialisasi
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting kolom tertentu
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mutator untuk hash password otomatis
     */
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            // Hanya hash jika belum di-hash
            if (!Hash::needsRehash($value)) {
                $this->attributes['password'] = Hash::make($value);
            } else {
                $this->attributes['password'] = $value;
            }
        }
    }

}
