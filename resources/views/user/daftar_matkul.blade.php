@extends('dashboard-template')

@section('tittle','Mata Kuliah')

@section('content')
    <div class="row p-3 pt-4 pb-1">
      <div class="col-7">

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
                <th class="text-center" scope="col">No</th>
                {{-- <th class="text-center" scope="col">Id</th> --}}
                <th class="text-center" scope="col">Kode</th>
                <th class="text-center" scope="col">Nama Matakuliah</th>
                <th class="text-center" scope="col">Semester</th>
                <th class="text-center" scope="col">SKS</th>
                <th class="text-center" scope="col">Status</th>
              </tr>
            </thead>
            <tbody class="border-0">
              @foreach ($matkuls as $matkul)
                  <tr>
                    <td class="text-center">{{ $loop->index+1+($matkuls->currentPage()-1)*8 }}</td>
                    {{-- <td class="text-center">{{ $matkul->id }}</th> --}}
                    <td class="text-center">{{ $matkul->kode }}</th>
                    <td class="text-center">{{ $matkul->nama_mata_kuliah }}</td>
                    <td class="text-center"> {{ $matkul->semester }} </td>
                    <td class="text-center"> {{ $matkul->sks }} </td>
                    <td class="text-center"> {{ $matkul->status_mk }} </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-center" hidden>
            {{ $matkuls->links() }}
          </div>
    </div>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>
<script>
  $(document).ready(function(){
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
