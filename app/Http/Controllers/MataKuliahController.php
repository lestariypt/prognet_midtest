<?php

namespace App\Http\Controllers;

use App\Support\Collection;
use App\Http\Requests\StoreMataKuliahRequest;
use App\Http\Requests\UpdateMataKuliahRequest;
use Illuminate\Pagination\Paginator;
use App\Models\MataKuliah;
use App\Models\Mahasiswa;
use App\Models\Transaksi;
class MataKuliahController extends Controller
{
    //////////////////////////  FUNGSI UNTUK MAHASISWA  //////////////////////////////////

    //fungsi untuk menampilkan mata kuliah user
    public function index()
    {
        $matkuls = MataKuliah::where('prodi','=',auth()->user()->program_studi)->orderBy('semester')->paginate(8);
        Paginator::useBootstrap();
        return view('user.daftar_matkul',compact('matkuls'));
    }

    //fungsi untuk mencari data mata kuliah (AJAX)
    public function cari(){
        //mengambil data mata kuliah yang sudah diambil pada semester ini
        $matkuls = MataKuliah::select(['kode','nama_mata_kuliah','semester','sks','status_mk'])
                    ->where('prodi','=',auth()->user()->program_studi)
                    ->cari(request()->cari,['kode','nama_mata_kuliah'])->get();
        return json_encode($matkuls);
    }
    ////////////////////////// AKHIR DARI FUNGSI UNTUK MAHASISWA  ////////////////////////

    ///////////////////////// FUNGSI UNTUK ADMIN  ///////////////////////////////////////

    //fungsi untuk menampilkan seluruh mata kuliah
    public function semua_matkul(){
        $mata_kuliahs = MataKuliah::where('id','!=',0);
        if(request()->search){
            $mata_kuliahs->where('nama_mata_kuliah','LIKE','%'.request()->search.'%')
                         ->orWhere('kode','LIKE','%'.request()->search.'%')
                         ->orWhere('prodi','LIKE','%'.request()->search.'%');
        }
        $mata_kuliahs = $mata_kuliahs->orderBy('prodi')->paginate(8)->withQueryString();
        Paginator::useBootstrap();
        return view('mata_kuliah.seluruh_matkul',compact('mata_kuliahs'));
    }

    //fungsi untuk menampilkan view tambah mata kuliah
    public function tambah(){
        return view('mata_kuliah.tambah_matkul');
    }

    //fungsi untuk menyimpan mata kuliah baru
    public function simpan_tambah()
    {
        request()->validate([
            'kode'=> 'required|unique:mata_kuliahs',
            'nama_mata_kuliah'=>'required',
            'semester'=>'required|numeric',
            'sks'=> 'required|numeric',
            'status_mk'=>'required'
        ]);
        MataKuliah::create([
            'kode' => request()->kode,
            'nama_mata_kuliah' => request()->nama_mata_kuliah,
            'semester' => request()->semester,
            'sks' => request()->sks,
            'prodi' => request()->prodi,
            'status_mk' => request()->status_mk
        ]);
        return redirect()->route('daftar_matkul')->with([
            'jenis_pesan'=>'success',
            'pesan'=>'Mata Kuliah Berhasil Ditambahkan'
        ]);
    }

    //fungsi untuk menampilkan view edit mata kuliah
    public function edit($id)
    {
        $matkul = MataKuliah::find($id);
        return view('mata_kuliah.edit_matkul',compact('matkul'));
    }

    //fungsi untuk menyimpan perubahan mata kuliah
    public function simpanedit($id){
        $validate = [
            'kode' => 'required',
            'nama_mata_kuliah' => 'required',
            'semester' => 'required|numeric',
            'sks' => 'required|numeric',
            'prodi' => 'required',
            'status_mk' => 'required'
        ];
        $matkul = MataKuliah::find($id);
        if(request()->kode!=$matkul->kode){
            $validate['kode'] = 'required|unique:mata_kuliahs';
        }
        request()->validate($validate);
        $matkul->kode = request()->kode;
        $matkul->nama_mata_kuliah = request()->nama_mata_kuliah;
        $matkul->semester = request()->semester;
        $matkul->sks = request()->sks;
        $matkul->prodi = request()->prodi;
        $matkul->status_mk = request()->status_mk;
        $matkul->save();

        return redirect()->route('daftar_matkul')->with([
            'jenis_pesan'=>'success',
            'pesan'=>'Mata Kuliah Berhasil Diubah !'
        ]);;
    }

    //fungsi untuk menghapus data mata kuliah
    public function hapus($id)
    {
        $matkul = MataKuliah::find($id);
        $transaksis = $matkul->transaksi()->get();
        foreach($transaksis as $transaksi){
            $transaksi->delete();
        }
        $matkul->delete();
        return redirect()->route('daftar_matkul')->with([
            'jenis_pesan'=>'danger',
            'pesan'=>'Mata Kuliah Berhasil Dihapus'
        ]);
    }

    /////////////////////////  AKHIR DARI FUNGSI UNTUK ADMIN  ////////////////////////////////
}
