<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    public function profile()
    {
        // $admin = Mahasiswa::find(auth()->user()->id);
        return view('admin.profile');
    }

    public function ubah(){
        request()->validate([
            'alamat' => 'required|max:255',
            'telepon' => 'required|max:20',
            'foto_mahasiswa'=>'image|max:5120|mimes:jpg,png,jpeg'
        ]);

        $admin = Mahasiswa::find(auth()->user()->id);
        $admin->alamat = request()->alamat;
        $admin->telepon = request()->telepon;
        if(isset(request()->password_mahasiswa)){
            $admin->password_mahasiswa = bcrypt(request()->password_mahasiswa);
        }
        if(request()->file('foto_mahasiswa')){
            $admin->foto_mahasiswa = request()->file('foto_mahasiswa')
                                              ->store('profile-mahasiswa');
        }
        $admin->save();
        return redirect()->route('admin')->with([
            'jenis_pesan'=>'success',
            'pesan'=>'Data Berhasil Diperbaharui !'
        ]);
    }
    /// CRUD ADMIN

    public function semua_admin(){
        $admins = Mahasiswa::where('id','!=',0);
        if(request()->search){
            //callback untuk grouping where statement
            $admins->where(function($query){
                $query->where('nama','LIKE','%'.request()->search.'%')
                    ->orWhere('nim','LIKE','%'.request()->search.'%');
            });
        }
        $admins = $admins->where('jabatan','admin')->orderBy('nama')->paginate(8)->withQueryString();
        Paginator::useBootstrap();
        return view('admin.daftar_admin',compact('admins'));
    }

    //fungsi untuk menampilkan view tambah admin
    public function tambah()
    {
        return view('admin.tambah_admin');
    }

    //fungsi untuk menyimpan admin baru
    public function simpan_tambah()
    {
        // dd(request());
        request()->validate([
            'nim'=> 'required|unique:mahasiswas',
            'nama'=>'required',
            'password_mahasiswa'=>'required',
            'alamat'=> 'required',
            'telepon'=>'required|numeric'
        ]);
        $mahasiswa = Mahasiswa::create([
            'nim' => request()->nim,
            'nama' => request()->nama,
            'password_mahasiswa' => bcrypt(request()->password_mahasiswa),
            'alamat' => request()->alamat,
            'telepon' => request()->telepon,
            'angkatan' => 1,
            'jabatan'=>'admin',
            'foto_mahasiswa' => 'default-pic/propil.png'
        ]);
        if(request()->file('foto_mahasiswa')){
            $mahasiswa->foto_mahasiswa = request()->file('foto_mahasiswa')
                                                  ->store('profile-mahasiswa');
            $mahasiswa->save();

        }

        return redirect()->route('daftar_admin')->with([
            'jenis_pesan'=>'success',
            'pesan'=>'Admin berhasil ditambahkan !'
        ]);
    }

    //fungsi untuk menampilkan halaman edit mahasiswa
    public function edit($id)
    {
        $admin = Mahasiswa::find($id);
        return view('admin.edit_admin',compact('admin'));
    }

    //fungsi untuk menyimpan perubahan pada admin
    public function simpanedit($id){
        $validate = [
            'nim'=> 'required',
            'nama'=>'required',
            'alamat'=> 'required',
            'telepon'=>'required|numeric'
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
        if(request()->password_mahasiswa){
            $mahasiswa->password_mahasiswa= bcrypt(request()->password_mahasiswa);
        }
        if(request()->file('foto_mahasiswa')){
            $mahasiswa->foto_mahasiswa = request()->file('foto_mahasiswa')
                                                  ->store('profile-mahasiswa');
            $mahasiswa->save();

        }
        $mahasiswa->save();

        return redirect()->route('daftar_admin')->with([
            'jenis_pesan'=>'success',
            'pesan'=>'Admin Berhasil Ditambahkan'
        ]);
    }

    //fungsi untuk menghapus mahasiswa
    public function hapus($id)
    {
        $admin = Mahasiswa::find($id);
        $admin->delete();
        return redirect()->route('daftar_admin')->with([
            'jenis_pesan'=>'danger',
            'pesan'=>'Admin berhasil dihapus'
        ]);;
    }
}
