@extends('admin.dashboard')
@section('tittle','Edit Mahasiswa')
@section('content')
<div class="row h-100 d-flex align-items-center justify-content-center">
    <div class="col-6 mt-3 mb-3 me-3 shadow rounded p-3">
        <form class="row p-0 m-0" action="{{ route('simpan_edit_mahasiswa',$mahasiswa->id)}}" method="post">
            @csrf
            <div class="container-fluid d-flex justify-content-center">
              <div id="gambar" class="p-0 rounded-circle border" style="width:155.187px; height:155.187px; background-image: url('{{ asset('storage/'.$mahasiswa->foto_mahasiswa)  }}'); background-repeat:no-repeat; background-size:cover; overflow: hidden">
                
              </div>
            </div>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" class="form-control rounded-0 @error('nim') is-invalid @enderror" id="nim" placeholder="Nim" value="{{ $mahasiswa->nim }}" name="nim">
              @error('nim')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control rounded-0 @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" value="{{ $mahasiswa->nama }}" name="nama">
              @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
                <label for="password_mahasiswa">Password</label>
                <input type="text" class="form-control rounded-0 @error('password_mahasiswa') is-invalid @enderror" id="password_mahasiswa" placeholder="Password Baru" name="password_mahasiswa">
                @error('password_mahasiswa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
              <label for="angkatan">Angkatan</label>
              <input type="text" class="form-control rounded-0 @error('angkatan') is-invalid @enderror" id="angkatan" placeholderalamatngkatan" value="{{ $mahasiswa->angkatan }}" name="angkatan">
              @error('angkatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control rounded-0 @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" value="{{ $mahasiswa->alamat }}" name="alamat">
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="text" class="form-control rounded-0 @error('telepon') is-invalid @enderror" id="telepon" placeholder="Telepon" value="{{ $mahasiswa->telepon }}" name="telepon">
                @error('telepon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-4">
              <label for="prodi">Program Studi</label>
              <select class="form-control" name="program_studi" id="prodi">
                  @foreach (['Teknologi Informasi','Teknik Mesin','Teknik Industri','Teknik Elektro','Teknik Arsitektur'] as $prodi)
                      <option value="{{ $prodi }}"
                        @if ($mahasiswa->prodi == $prodi)
                          {{ "selected" }}
                        @endif
                      >{{ $prodi }}</option>
                  @endforeach
              </select>
            </div>
            <div class="col d-flex justify-content-center p-0 me-1 mb-3">
              <button type="submit" class="simpan btn btn-primary py-1 w-25 ps-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload-fill me-2" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z"/>
                </svg>Simpan</button>

              <a type="submit" href="{{ route('daftar_mahasiswa') }}" class="ps-2 simpan btn btn-danger py-1 w-25 ms-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Kembali</a>
            </div>
          </form>
    </div>
</div>
@endsection