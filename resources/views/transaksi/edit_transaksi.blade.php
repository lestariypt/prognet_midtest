@extends('admin.dashboard')
@section('tittle','Edit Transaksi')
@section('content')
<div class="row h-100 d-flex align-items-center justify-content-center">
    <div class="col-6 mt-3 mb-3 me-3 shadow rounded p-3">
        <form class="row p-0 m-0" action="{{ route('simpan_edit_transaksi',$transaksi->id)}}" method="post">
            @csrf
            <div class="form-group">
              <label for="tahun_ajaran">Tahun Ajaran</label>
              <input type="text" class="form-control rounded-0 @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran" placeholder="tahun_ajaran" value="{{ $transaksi->tahun_ajaran }}" name="tahun_ajaran">
              @error('tahun_ajaran')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="mahasiswa_id">Id Mahasiswa</label>
              <input type="text" class="form-control rounded-0 @error('mahasiswa_id') is-invalid @enderror" id="mahasiswa_id" placeholder="Id Mahasiswa" value="{{ $transaksi->mahasiswa_id }}" name="mahasiswa_id" readonly>
              @error('mahasiswa_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="semester">Semester</label>
              <input type="text" class="form-control rounded-0 @error('semester') is-invalid @enderror" id="semester" placeholder="Semester" value="{{ $transaksi->semester }}" name="semester">
              @error('semester')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
                <label for="mata_kuliah_id">Id Mata Kuliah</label>
                <input type="text" class="form-control rounded-0 @error('mata_kuliah_id') is-invalid @enderror" id="mata_kuliah_id" placeholder="Id Mata Kuliah" value="{{ $transaksi->mata_kuliah_id }}" name="mata_kuliah_id">
                @error('mata_kuliah_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="form-group">
              <label for="nilai_angka">Nilai Angka</label>
              <input type="text" value="{{ $transaksi->nilai_angka }}" class="form-control rounded-0 @error('nilai_angka') is-invalid @enderror" id="nilai_angka" placeholder="Nilai Angka" name="nilai_angka"
              oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
              @error('nilai_angka')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              {{-- input hanya menerima angka integer dan pecahan --}}
              {{-- https://stackoverflow.com/questions/469357/html-text-input-allow-only-numeric-input --}}
            </div>
            {{-- <div class="form-group">
              <label for="nilai">Nilai</label>
              <select class="form-control @error('nilai') is-invalid @enderror" name="nilai" id="nilai">
                  @foreach (['Tunda','A','B','C','D','E'] as $nilai)
                      <option value="{{ $nilai }}"
                        @if ($transaksi->nilai == $nilai)
                          {{ "selected" }}
                        @endif
                      >{{ $nilai }}</option>
                  @endforeach
              </select>
              @error('nilai')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div> --}}
            <div class="form-group">
              <label for="nilai">Nilai</label>
              <input readonly type="text" value="{{ $transaksi->nilai }}" class="form-control rounded-0 @error('nilai') is-invalid @enderror" id="nilai" placeholder="Nilai" name="nilai">
              @error('nilai')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group mb-4">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="Belum Disetujui"
                        @if ($transaksi->status == "Belum Disetujui")
                        {{ "selected" }}
                        @endif
                    >Belum Disetujui</option>
                    <option value="Disetujui"
                        @if ($transaksi->status == "Disetujui")
                            {{ "selected" }}
                        @endif
                    >Disetujui</option>
                    <option value="Dibatalkan"
                        @if ($transaksi->status == "Dibatalkan")
                            {{ "selected" }}
                        @endif
                    >Dibatalkan</option>
                </select>
                @error('status')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            <div class="col d-flex justify-content-center p-0 me-1 mb-3">
              <button type="submit" class="simpan btn btn-primary py-1 w-25 ps-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload-fill me-2" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z"/>
                </svg>
                Simpan</button>
              <a type="submit" href="{{ route('daftar_transaksi') }}" class="ps-2 simpan btn btn-danger py-1 w-25 ms-3">
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
    let input_angka = $('#nilai_angka');
    let input_huruf = $("#nilai");
    var rentang_nilai = {'A':90,'B':80,'C':70,'D':60,'E':0};
      input_angka.on('keyup',function(){
        let keys = Object.keys(rentang_nilai);
        for(let i=0; i<keys.length;i++){
          if(input_angka.val() >= rentang_nilai[keys[i]]){
                input_huruf.val(keys[i]);
                break;
          }
        }
        if(!(input_angka.val())){
          input_huruf.val("Tunda");
        }
      }); 
  });
</script>
@endsection