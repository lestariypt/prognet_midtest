<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'tahun_ajaran',
        'semester',
        'mahasiswa_id',
        'mata_kuliah_id',
        'nilai',
        'nilai_angka',
        'status'
    ];

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }
    public function matkul(){
        return $this->belongsTo(MataKuliah::class,'mata_kuliah_id','id');
    }
    public static function khs($id,array $fields){
        if(isset($fields)){
            return Transaksi::select($fields)
                  ->join('mata_kuliahs','mata_kuliahs.id','=','mata_kuliah_id')
                  ->where('transaksis.mahasiswa_id','=',$id)
                  ->where('status','=','Disetujui')
                  ->orderBy('transaksis.semester','desc');
        }
    }
    public static function tahun_ajaran($id){
        return Transaksi::select('tahun_ajaran','semester')
              ->where('mahasiswa_id','=',$id)
              ->where('status','!=','Dibatalkan')
              ->groupBy('tahun_ajaran','semester')
              ->orderBy('semester','desc')
              ->get();
    }
    use HasFactory;
}
