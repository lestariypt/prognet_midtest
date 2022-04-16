@extends('admin.dashboard')

@section('tittle','Daftar admin')

@section('content')
  <div class="pt-4 row px-0 m-0">
    <div class="col-7">
      <a role="button" class="btn btn-success ps-2" href="{{ route('tambah_admin') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16" style="margin-top: -1px">
          <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
        </svg>
        Tambah</a>
    </div>
    <div class="col-5 pe-0 pe-3">
      <form action="{{ route('daftar_admin') }}" method="GET" class="mb-3 mb-lg-0 d-flex justify-content-end">
        <input name="search" id="search" type="search" class="form-control form-control-dark w-75" placeholder="Cari Admin" aria-label="Search">
      </form>
    </div>
  </div>
  <div class="row p-4 pt-0 mt-2">
        <table class="table table-striped">
            <thead class="bg-primary text-light">
              <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Nama admin</th>
                <th class="text-center" scope="col">Username</th>
                <th class="text-center" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="border-0">
              @forelse ($admins as $admin)
                  <tr>
                    <td class="text-center">{{ $loop->index+1+($admins->currentPage()-1)*8 }}</td>
                    <td class="text-center">{{ $admin->nama }}</td>
                    <td class="text-center">{{ $admin->nim }}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{ route('hapus_admin',$admin->id) }}" method="post" onsubmit ="return persetujuan()" style="margin-right: -20px">
                            <div class="btn-group" role="group" aria-label="Basic example">
                            @csrf
                            <a type="button" class="btn btn-primary px-4 ps-3 rounded-start" href="{{ route('edit_admin',$admin->id) }}">
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" style="margin-top: -1px">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg>
                              Edit</a>
                            <button type="submit" class="btn btn-danger ps-3">
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16" style="margin-top: -1px">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                              </svg>
                              Delete</button>
                            </div>
                        </form>
                    </td>
                  </tr>
              @empty
                <tr>
                  <td colspan="5" align="center"> Tidak ada admin yang Ditemukan ! </td>
                </tr>
              @endforelse
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {{ $admins->links() }}
          </div>
    </div>
    <script>
      function persetujuan(){
          if(confirm('yakin ingin menghapus ?')){
              return true;
          }else {
              return false;
          }
      }
</script>
@endsection
