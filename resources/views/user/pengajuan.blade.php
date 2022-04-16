@extends('dashboard-template')

@section('tittle','krs')

@section('content')
    <div class="row p-3 pt-4 pb-1">
      <div class="col-7 pb-0 ps-0 d-flex align-items-end">
        <a class="btn btn-primary" role="button" href="">Kembali</a>
      </div>
      {{-- jika user belum mengajukan krs maka search akan berganti menjadi ajukan --}}
      <div class="col-5 pe-0">
        <form class="mb-3 mb-lg-0 d-flex justify-content-end">
          <input type="search" class="form-control form-control-dark w-75" placeholder="Cari Matakuliah" aria-label="Search" style="max-height: 33px">
        </form>
      </div>
    </div>
    <div class="row p-3 pt-0 mt-2">
        <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama Matakuliah</th>
                <th scope="col">SKS</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="border-0">
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>

              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@mdo</td>
                <td>@mdo</td>

              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@twitter</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection
