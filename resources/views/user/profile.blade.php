@extends('dashboard-template')
@section('tittle','Profile')
@section('content')
@error('foto_mahasiswa')

<div class="position-fixed alert alert-danger alert-dismissible fade show " role="alert">
    <div class="container-fluid p-0 m-0 d-flex justify-content-between" style="font-size: 16px">
      <strong>Pesan :</strong>
      <span style="width:8px"></span>
      {{ $message }}
      <button type="button" class="close ms-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@enderror

<div class="row h-100 d-flex align-items-center justify-content-center">
  <div class="col-6 shadow rounded p-3">
      {{-- foto profile --}}
      <div class="row d-flex justify-content-center p-0 m-0 mt-2">
        <div id="gambar" class="p-0 rounded-circle" style="width:32%; height:140px; background-image: url('{{ asset('storage/'.auth()->user()->foto_mahasiswa)  }}'); background-repeat:no-repeat; background-size:cover; overflow: hidden">
          <div class="semi-circle container h-75"></div>
          <div id="upload_poto" class="rotated-semi-circle container d-flex justify-content-center text-white bg-dark pt-1" style="height: 25%">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
              <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
              <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
            </svg>
          </div>
        </div>
      </div>
    {{-- data --}}
    <form class="row p-0 m-0" action="{{ route('ubah')}}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="file" hidden name="foto_mahasiswa" id="input_poto" accept="image/png, image/jpg, image/jpeg" />
        @error('foto_mahasiswa')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" class="form-control rounded-0" id="nim" placeholder="NIM" value="{{ auth()->user()->nim }}" readonly>
      </div>
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control rounded-0" id="nama" placeholder="Nama" value="{{ auth()->user()->nama }}" readonly>
      </div>
      <div class="form-group">
        <label for="tanggal">Tanggal Lahir</label>
        <input type="date"  class="form-control rounded-0"  id="tanggal" placeholder="Tanggal Lahir" value="{{ auth()->user()->tanggal }}" name="tanggal" >
      </div>
      <div class="form-group mb-1">
        <label for="password">Password Baru</label>
        <input type="text" class="form-control rounded-0" id="password" placeholder="Password Baru" name="password_mahasiswa">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control rounded-0 @error('alamat') is-invalid @enderror" id="alamat" placeholder="Apartment, studio, or floor" value="{{ auth()->user()->alamat }}" name="alamat">
        @error('alamat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
          <label for="telepon">No. Telp</label>
          <input type="text" class="form-control rounded-0 @error('telepon') is-invalid @enderror" id="telepon" placeholder="No. Telepon" value="{{ auth()->user()->telepon }}" name="telepon">
          @error('telepon')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      <div class="form-group mb-4">
        <label for="program_studi">Program Studi</label>
        <input type="text" class="form-control rounded-0" id="program_studi" placeholder="Program Studi" value="{{ auth()->user()->program_studi }}" readonly>
      </div>
      <div class="col d-flex justify-content-center p-0 me-1 mb-3">
        <button type="submit" class="simpan btn btn-primary py-1 w-25 ps-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
          </svg>
          Perbaharui</button>
      </div>
    </form>
  </div>
</div>
<script>
  $(document).ready(function(){
    $("#upload_poto").click(function(){
      $("#input_poto").trigger('click');
    });
    //image prefiew
    $("#input_poto").change(function(){
        readURL(this);
    });
  });
</script>
@endsection
