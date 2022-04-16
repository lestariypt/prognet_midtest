@extends('dashboard-template')
@section('tittle','Profile')
@section('content')
<div class="data-profile row h-100 d-flex align-items-center justify-content-center">
  <div class="col-6 mt-3 mb-3 me-3 shadow rounded p-3">
    {{-- data --}}
    <div class="form-group">
    <label for="nim">Kode</label>
    <input type="text" class="form-control rounded-0" id="nim" placeholder="NIM" value="{{ $matkul->kode }}" readonly>
    </div>
    <div class="form-group">
    <label for="nama">Nama Mata Kuliah</label>
    <input type="text" class="form-control rounded-0" id="nama" placeholder="Nama" value="{{ $matkul->nama_mata_kuliah }}" readonly>
    </div>
    <div class="form-group">
    <label for="alamat">SKS</label>
    <input type="text" class="form-control rounded-0" id="alamat" placeholder="Apartment, studio, or floor" value="{{ $matkul->sks }}" name="alamat" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="telepon">Program Studi</label>
        <input type="text" class="form-control rounded-0" id="telepon" placeholder="No. Telepon" value="{{ $matkul->prodi }}" name="telepon" readonly>
    </div>
    <div class="col d-flex justify-content-center p-0 me-1 mb-3">
        <a href="{{ route('khs') }}" class="simpan btn btn-danger py-1 w-25">Kembali</a>
    </div>
  </div>
</div>
@endsection