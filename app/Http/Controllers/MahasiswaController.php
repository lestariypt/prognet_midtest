<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Mahasiswa;
use Illuminate\Pagination\Paginator;

class MahasiswaController extends Controller
{
    ///////////////////  FUNGSI UNTUK MAHASISWA  /////////////////////////////

    //fungsi untuk menampilkan data mahasiswa (user)
    public function index()
    {
        return view('user.profile');
    }

    //fungsi untuk mengubah data mahasiswa (user)
    public function ubah(){
        //menyimpan foto profil
        request()->validate([
            'alamat' => 'required|max:255',
            'telepon' => 'required|max:20',
            'foto_mahasiswa'=>'image|max:5120|mimes:jpg,png,jpeg'
        ]);

        $mahasiswa = Mahasiswa::find(auth()->user()->id);

        if(request()->file('foto_mahasiswa')){
            $mahasiswa->foto_mahasiswa = request()->file('foto_mahasiswa')
                                                  ->store('profile-mahasiswa');
        }
        if(request()->password_mahasiswa){
            $mahasiswa->password_mahasiswa = bcrypt(request()->password_mahasiswa);
        }
        $mahasiswa->alamat = request()->alamat;
        $mahasiswa->telepon = request()->telepon;
        $mahasiswa->tanggal = request()->tanggal;
        $mahasiswa->save();

        return redirect()->route('mahasiswa')->with([
            'jenis_pesan'=>'success',
            'pesan'=>'Data Berhasil Di Perbaharui !'
        ]);
    }
    ////////////////  AKHIR DARI FUNGSI UNTUK MAHASISWA  //////////////////

    /////////////// FUNGSI UNTUk ADMIN  ///////////////////////////

    //fungsi untuk menampilkan seluruh mahasiswa
    public function semua_mahasiswa(){
        $mahasiswas = Mahasiswa::where('id','!=',0);
        if(request()->search){
            $mahasiswas->where(function($query){
                $query->where('nama','LIKE','%'.request()->search.'%')
                ->orWhere('nim','LIKE','%'.request()->search.'%')
                ->orWhere('program_studi','LIKE','%'.request()->search.'%');
            });
        }
        $mahasiswas = $mahasiswas->where('jabatan','=','mahasiswa')->orderBy('program_studi')->paginate(8)->withQueryString();
        Paginator::useBootstrap();
        return view('mahasiswa.daftar_mahasiswa',compact('mahasiswas'));
    }

    //fungsi untuk menampilkan view tambah mahasiswa
    public function tambah()
    {
        return view('mahasiswa.tambah_mahasiswa');
    }

    //fungsi untuk menyimpan mahasiswa baru
    public function simpan_tambah()
    {

        request()->validate([

            'nim'=> 'required|unique:mahasiswas',
            'nama'=>'required',
            'password_mahasiswa'=>'required',
            'alamat'=> 'required',
            'telepon'=>'required|numeric',

            'program_studi'=>'required',
            'angkatan'=>'required|numeric'
        ]);
        Mahasiswa::create([
            'nim' => request()->nim,
            'nama' => request()->nama,
            'password_mahasiswa' => bcrypt(request()->password_mahasiswa),
            'alamat' => request()->alamat,
            'telepon' => request()->telepon,
            'tanggal lahir' => request()->tanggal,
            'program_studi' => request()->program_studi,
            'angkatan' => request()->angkatan,
            'jabatan'=>'mahasiswa',
            'foto_mahasiswa' => 'default-pic/propil.png'
        ]);
        return redirect()->route('daftar_mahasiswa')->with([
            'jenis_pesan'=>'success',
            'pesan'=>'Mahasiswa berhasil ditambahkan !'
        ]);
    }

    //fungsi untuk menampilkan halaman edit mahasiswa
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit_mahasiswa',compact('mahasiswa'));
    }

    //fungsi untuk menyimpan perubahan pada mahasiswa
    public function simpanedit($id){
        $validate = [
            'nim'=> 'required',
            'nama'=>'required',
            'alamat'=> 'required',
            'tanggal lahir'=> 'required',
            'telepon'=>'required|numeric',
            'program_studi'=>'required',
            'angkatan'=>'required|numeric'
        ];
        $mahasiswa = Mahasiswa::find($id);
        if(request()->kode!=$mahasiswa->kode){
            $validate['nim'] = 'required|unique:mahasiswas';
        }
        request()->validate($validate);
        $mahasiswa->nim = request()->nim;
        $mahasiswa->nama = request()->nama;
        $mahasiswa->alamat = request()->alamat;
        $mahasiswa->telepon = request()->telepon;
        $mahasiswa->tanggal = request()->tanggal;
        $mahasiswa->program_studi = request()->program_studi;
        $mahasiswa->angkatan = request()->angkatan;
        if(request()->password_mahasiswa){
            $mahasiswa->password_mahasiswa= bcrypt(request()->password_mahasiswa);
        }
        $mahasiswa->save();

        return redirect()->route('daftar_mahasiswa')->with([
            'jenis_pesan'=>'success',
            'pesan'=>'Daftar Mahasiswa Berhasil Diperbaharui'
        ]);
    }

    //fungsi untuk menghapus mahasiswa
    public function hapus($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect()->route('daftar_mahasiswa')->with([
            'jenis_pesan'=>'danger',
            'pesan'=>'Mahasiswa berhasil dihapus'
        ]);;
    }

    ///////////////  AKHIR DARI FUNGSI UNTUK ADMIN  /////////////////////
}
