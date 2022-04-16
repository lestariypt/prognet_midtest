<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'telepon',
        'program_studi',
        'angkatan',
        'foto_mahasiswa',
        'jabatan',
        'tanggal',
        'password_mahasiswa'

    ];

    protected $hidden = [
        'remember_token',
    ];
    public function getAuthPassword()
    {
        return $this->password_mahasiswa;
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
    // public function jabatan(){
    //     return $this->belongsTo(Jabatan::class);
    // }
    use HasFactory;
}
