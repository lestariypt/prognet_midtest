@extends('admin.dashboard')
@section('tittle','Tambah admin')
@section('content')
<div class="add row h-100 d-flex align-items-center justify-content-center">
    <div class="col-6 mt-3 mb-3 me-3 shadow rounded p-3">
        <form class="row p-0 m-0" action="{{ route('simpan_tambah_admin')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid d-flex justify-content-center">
              <div id="gambar" class="p-0 rounded-circle" style="width:155.817px; height:155.817px; background-image: url('{{ asset('storage/default-pic/propil.png')  }}'); background-repeat:no-repeat; background-size:cover; overflow: hidden">
                <div class="semi-circle container h-75"></div>
                <div id="upload_poto" class="rotated-semi-circle container d-flex justify-content-center text-white bg-dark pt-1" style="height: 25%">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                    <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                  </svg>
                </div>
              </div>
            </div>
            <input type="file" hidden name="foto_mahasiswa" id="input_poto" accept="image/png, image/jpg, image/jpeg" />
            <div class="form-group">
              <label for="nim">Username</label>
              <input type="text" value="{{ old('nim') }}" class="form-control rounded-0 @error('nim') is-invalid @enderror" id="nim" placeholder="Username" name="nim">
              @error('nim')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" value="{{ old('nama') }}" class="form-control rounded-0 @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="nama">
              @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" value="{{ old('password_mahasiswa') }}" class="form-control rounded-0 @error('password_mahasiswa') is-invalid @enderror" id="password" placeholder="Password" name="password_mahasiswa">
              @error('password_mahasiswa')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" value="{{ old('alamat') }}" class="form-control rounded-0 @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat">
                @error('alamat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="telepon">Telepon</label>
                <input type="text" value="{{ old('telepon') }}" class="form-control rounded-0 @error('telepon') is-invalid @enderror" id="telepon" placeholder="Telepon" name="telepon">
                @error('telepon')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            <div class="col d-flex justify-content-center p-0 me-1 mb-3">
              <button type="submit" class="simpan btn btn-success py-1 w-25 ps-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload-fill me-2" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z"/>
                </svg>
                Tambah</button>
              <a role="button" href="{{ route('daftar_admin') }}" class="simpan btn btn-danger py-1 w-25 ms-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Kembali</a>
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
