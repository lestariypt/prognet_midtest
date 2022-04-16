<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = [
        'kode',
        'nama_mata_kuliah',
        'semester',
        'sks',
        'prodi',
        'status_mk'
    ];

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }

    public static function krsMahasiswa($id){
        return MataKuliah::select('transaksis.id','kode','nama_mata_kuliah','sks','status','tahun_ajaran','transaksis.semester')
                ->join('transaksis', 'mata_kuliahs.id', '=', 'transaksis.mata_kuliah_id')
                ->where('transaksis.mahasiswa_id','=',$id)
                ->orderBy('transaksis.semester','desc');
    }
    //untuk melakukan pencarian berdasarkan sebuah keyword pada beberapa fields
    public function scopeCari($query, $filter,array $fields ){
        if(isset($filter) && count($fields)>0){
            foreach($fields as $key=>$field){
                if($key > 0){
                    $query->orWhere($field,'like','%'.$filter.'%');
                }else {
                    $query->where($field,'like','%'.$filter.'%');
                }
            }
            
        }else {
            $query->limit(8);
        }
    }
    use HasFactory;
}
