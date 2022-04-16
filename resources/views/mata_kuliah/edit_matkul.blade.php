@extends('admin.dashboard')
@section('tittle','Edit Mata Kuliah')
@section('content')
<div class="data-profile row h-100 d-flex align-items-center justify-content-center">
    <div class="col-6 mt-3 mb-3 me-3 shadow rounded p-3">
        <form class="row p-0 m-0" action="{{ route('simpan_edit_matkul',$matkul->id)}}" method="post">
            @csrf
            <div class="form-group">
              <label for="kode">Kode</label>
              <input type="text" class="form-control rounded-0 @error('kode') is-invalid @enderror" id="kode" placeholder="Kode" value="{{ $matkul->kode }}" name="kode">
              @error('kode')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Mata Kuliah</label>
              <input type="text" class="form-control rounded-0 @error('nama_mata_kuliah') is-invalid @enderror" id="nama" placeholder="Mata Kuliah" value="{{ $matkul->nama_mata_kuliah }}" name="nama_mata_kuliah">
              @error('nama_mata_kuliah')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="semester">Semester</label>
              <input type="text" class="form-control rounded-0 @error('semester') is-invalid @enderror" id="semester" placeholder="Semester" value="{{ $matkul->semester }}" name="semester">
              @error('semester')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
                <label for="sks">SKS</label>
                <input type="text" class="form-control rounded-0 @error('sks') is-invalid @enderror" id="sks" placeholder="SKS" value="{{ $matkul->sks }}" name="sks">
                @error('sks')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="form-group">
              <label for="prodi">Program Studi</label>
              <select class="form-control" name="prodi" id="prodi">
                  @foreach (['Teknologi Informasi','Teknik Mesin','Teknik Industri','Teknik Elektro','Teknik Arsitektur'] as $prodi)
                      <option value="{{ $prodi }}"
                        @if ($matkul->prodi == $prodi)
                          {{ "selected" }}
                        @endif
                      >{{ $prodi }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group mb-4">
                <label for="status">Status</label>
                <select name="status_mk" id="status" class="form-control">
                    <option value="Wajib"
                        @if ($matkul->status == "Wajib")
                        {{ "selected" }}
                        @endif
                    >Wajib</option>
                    <option value="Pilihan"
                        @if ($matkul->status == "Pilihan")
                            {{ "selected" }}
                        @endif
                    >Pilihan</option>
                </select>
              </div>
            <div class="col d-flex justify-content-center p-0 me-1 mb-3">
              <button type="submit" class="simpan btn btn-primary py-1 w-25 ps-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload-fill me-2" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z"/>
                </svg>
                Simpan</button>
              <a type="submit" href="{{ route('daftar_matkul') }}" class="ps-2 simpan btn btn-danger py-1 w-25 ms-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>Kembali</a>

            </div>
          </form>
    </div>
</div>
@endsection