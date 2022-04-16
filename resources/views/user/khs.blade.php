@extends('dashboard-template')

@section('tittle','khs')

@section('content')
    <div class="row p-3 pt-4 pb-1">
      <div class="col-10 pb-0 ps-0 d-flex align-items-end">
        <div class="btn-group border d-flex align-items-center ps-2 border-dark rounded-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill me-2" viewBox="0 0 16 16">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
            <select name="tahun_ajaran" id="tahun_ajaran" class="form-select rounded-0 ms-0">
              @forelse ($tahun_ajarans as $tahun_ajaran)
                <option value="{{ $tahun_ajaran->semester }}">
                  @if ($tahun_ajaran->semester % 2 == 0)
                      {{ "Genap - ".strval($tahun_ajaran->tahun_ajaran-1)."/".strval($tahun_ajaran->tahun_ajaran) }}
                  @else
                      {{ "Ganjil  -  ".strval($tahun_ajaran->tahun_ajaran)."/".strval($tahun_ajaran->tahun_ajaran+1)}}
                  @endif
                </option>
              @empty
                <option value="0">Belum Ada KHS</option>
              @endforelse
            </select>
        </div>
      </div>
      <div class="col-2 me-0 p-0 border border-primary" style="font-size: 0.8rem">
        <div class="row p-0 m-0">
          <div class="col-8"><strong class="w-auto">IPK</strong></div>:
          <div class="col-1 me-0 pe-0"><span id="ipk" class="d-block">{{ $ipk }}</span></div>
        </div>
        <div class="row p-0 m-0">
          <div class="col-8"><strong class="w-auto">IPS</strong></div>:
          <div class="col-1 me-0 pe-0"><span id="ips" class="d-block">0</span></div>
        </div>
        <div class="row p-0 m-0">
          <div class="col-8"><strong class="w-auto">Jumlah SKS</strong></div>:
          <div class="col-1 me-0 pe-0"><span id="sks" class="d-block">0</span></div>
        </div>
      </div>
    </div>
    <div class="row p-3 pt-0 mt-2">
        <table class="table table-striped" id="table">
            <thead class="bg-primary text-light">
              <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Kode</th>
                <th class="text-center" scope="col">Nama Matakuliah</th>
                <th class="text-center" scope="col">Nilai</th>
                <th class="text-center" scope="col">Nilai Akhir</th>
                <th class="text-center" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="border-0">
            </tbody>
          </table>
    </div>
<script>
  $(document).ready(function(){
      localStorage.clear();
      let url = '{{ route("cari_khs",["semester"=> "nilai"])}}';
      tabel_khs(url.replace('nilai',$('#tahun_ajaran').val()),'tbody');
      $('#tahun_ajaran').on('change',function(){
        tabel_khs(url.replace('nilai',$('#tahun_ajaran').val()),'tbody');
      });
  });
</script>
@endsection

