@extends('dashboard-template')

@section('tittle','Tambah KRS')
@section('content')
<script src="/js/script.js"></script>
<link rel="stylesheet" href="/css/style.css">
<div class="konten container-fluid p-0 h-100">
    <div class="row p-3 pt-4 pb-1">
        <div class="col-7 ps-0">
            <form action=" {{ route('simpan_krs') }} " method="POST" class="p-0">
                @csrf
                <input id="listKrs" type="text" hidden name="listKrs" value="0">
                <input id="semesterKrs" type="text" hidden name="semesterKrs" value="0">
                <a href="{{ route('krs') }}" class="btn btn-danger ps-2" onclick="krs_ajukan()">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                  </svg>
                  Kembali
                </a>
                <button type="submit" class="btn btn-success ps-2" onclick="krs_ajukan()">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload-fill me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z"/>
                  </svg>
                  Ajukan
                </button>
            </form>
        </div>
        <div class="col-5 pe-0">
          <form class="mb-3 mb-lg-0 d-flex justify-content-end">
            <input id="search" type="search" class="form-control form-control-dark w-75" placeholder="Cari Matakuliah" aria-label="Search">
          </form>
        </div>
      </div>
      <div class="row p-3 pt-0 mt-2">
          <table class="table table-striped">
              <thead class="bg-primary text-light">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode</th>
                  <th scope="col">Nama Matakuliah</th>
                  <th scope="col">Semester</th>
                  <th scope="col">SKS</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="border-0">
                @forelse ($matkuls as $matkul)
                    <tr>
                      <td>{{ $loop->index+1+($matkuls->currentPage()-1)*8 }}</td>
                      <td>{{ $matkul->kode }}</td>
                      <td>{{ $matkul->nama_mata_kuliah }}</td>
                      <td> {{ $matkul->semester }} </td>
                      <td> {{ $matkul->sks }} </td>
                      <td>
                          <button value="{{ $matkul->id }}" id="{{ $loop->index + 1 }}" class="tambah btn btn-success" onclick="krs_tambah(this.id)">
                              Tambah
                          </button> 
                          <input hidden value="{{ $matkul->sks }}" id="sks-{{ $loop->index + 1 }}">
                      </td>
                    </tr>
                @empty
                  <tr>
                    <td colspan="6" align="center"> Tidak ada Mata Kuliah yang Ditemukan ! </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $matkuls->links() }}
            </div>
      </div>
</div>
<script>
  $(document).ready(function(){
    //untuk inisialisasi localStorage jika kosong
    if(!localStorage['krs']){
      let temp = {list:[]};
      localStorage['krs'] = JSON.stringify(temp);
    }
    //menghitung banyak sks yang sudah diambil
    
    //mencari data dari localStorage
    let krs_cache = JSON.parse(localStorage['krs']).list; 
    let krs_maks = localStorage['krs_maks'];
    let krs_len = parseInt(localStorage['krs_len']);
    //untuk mengecek krs yang sudah ada di localStorage
    for(var i=1;i<= {{ count($matkuls) }};i++){
        if(krs_cache.includes(Number($('#'+i).val()))){
          $('#'+i).removeClass( "btn-success" ).addClass('btn-danger').text('Hapus');
        }
    }

    $('#search').on('keyup',function(){
      let url = '{{ route("cari_matkul",["cari"=>"nilai"]) }}'.replace('nilai',$('#search').val());
      if($('#search').val()){
          $('.pagination').hide();
      }else {
          $('.pagination').show();
      }
      ajax_search('tbody',url,6);
    });
  }); 
</script>
@endsection