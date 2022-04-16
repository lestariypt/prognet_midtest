<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
    <script src="{{ URL::asset('/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ URL::asset('/js/script.js') }}"></script>
    <title>@yield('tittle')</title>
</head>
<body class="h-100 d-flex">
    {{-- sidebar panel--}}
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100" style="width: 280px;">
        <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          <span class="fs-4">Admin</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href=" {{ route('admin') }}" class="nav-link text-white {{ Request::is(auth()->user()->jabatan) ? 'active' : '' }}" aria-current="page">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
              Profile
            </a>
          </li>
          <li class="nav-item">
            <a href=" {{ route('daftar_admin') }}" class="nav-link text-white {{ Request::is(auth()->user()->jabatan."/daftaradmin*") ? 'active' : '' }}" aria-current="page">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill me-2" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
              </svg>
              Daftar Admin
            </a>
          </li>
          <li>
            <a href="{{ route('daftar_mahasiswa') }}" class="nav-link text-white {{ Request::is(auth()->user()->jabatan."/daftarmahasiswa*") ? 'active' : '' }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill me-2" viewBox="0 0 16 16">
                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
              </svg>
                Daftar Mahasiswa
            </a>
          </li>
          <li>
            <a href="{{ route('daftar_matkul') }}" class="nav-link text-white {{ Request::is(auth()->user()->jabatan.'/daftarmatkul*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill me-2" viewBox="0 0 16 16">
                    <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                  </svg>
              Daftar Mata Kuliah
            </a>
          </li>
          <li>
            <a href="{{ route('daftar_transaksi') }}" class="nav-link text-white {{ Request::is(auth()->user()->jabatan.'/daftartransaksi*') ? 'active' : '' }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up me-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
              </svg>
              Daftar Transaksi
            </a>
          </li>

        </ul>
        <hr>
        <form id="formPanel" action="{{ route('logout') }}" method="POST">
          @csrf
          <a id="logout" type="submit" role="button" class="keluar nav-link text-white rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left me-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
              </svg>
            Keluar
            </a>
        </form>
      </div>
      {{-- end sidebar panel--}}
      {{-- content area --}}
      <div class="konten container-fluid p-0">
          <div id="alert" class="position-fixed alert alert-@if(session()->has('pesan')){{session()->get('jenis_pesan') }}@endif" role="alert">
            <div class="container-fluid p-0 m-0" style="font-size: 16px; max-width: 300px">
              @if (session()->has('pesan'))
                @if (session()->get('jenis_pesan')=='success')
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16" style="margin-top: -5px">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </svg>
                @endif
                @if (session()->get('jenis_pesan')=='danger')
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16" style="margin-top: -5px">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  </svg>
                @endif
                @if (session()->get('jenis_pesan')=='warning')
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16" style="margin-top: -5px">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg>
                @endif
              @endif
              <strong>Pesan :</strong>
              <span style="width:8px"></span>
              <span id="pesan">
                @if(session()->has('pesan'))
                  {{session()->get('pesan') }}
                @endif
              </span>
              <button id="close" type="button" class="close position-absolute h-100">
                <span>&times;</span>
              </button>
            </div>
          </div>
          @yield('content')
      </div>
      {{-- end content area --}}
</body>
<script>
  document.getElementById("logout").onclick = function() {
      document.getElementById("formPanel").submit();
  }
  let message = "{{ session()->has('pesan') ? session()->get('jenis_pesan') : null }}";
  let alert = $('#alert');
  let close = $('#close');
  if(message == 'success'){
    alert.css({display:'block'});
    alert.addClass('show');
    alert.addClass('showAlert');
    alert.css({borderLeft:"7px solid #0cce77"});
    close.hover(function(){
        close.css({backgroundColor: "#98bcac"});
    },function(){
        close.css({backgroundColor:"transparent"});
    });
  }else if(message=='danger'){
    alert.css({display:'block'});
    alert.addClass('show');
    alert.addClass('showAlert');
    alert.css({borderLeft:"7px solid #dd0b1c"});
    close.hover(function(){
        close.css({backgroundColor:"#c99b9e"});
    },function(){
        close.css({backgroundColor:"transparent"});
    });

  }else if(message=='warning'){
    alert.css({display:'block'});
    alert.addClass('show');
    alert.addClass('showAlert');
    alert.css({borderLeft:"7px solid #fcbd00"});
    close.hover(function(){
        close.css({backgroundColor:"#b7ab86"});
    },function(){
        close.css({backgroundColor:"transparent"});
    });

  }
  setTimeout(() => {
    alert.addClass('hide');
    alert.removeClass('show');
  }, 3000);
  close.click(function(){
      alert.addClass('hide');
      alert.removeClass('show');
  });
</script>

</html>
