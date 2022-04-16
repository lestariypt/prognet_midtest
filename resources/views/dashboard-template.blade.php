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
        <a href=" {{ route('krs')}} " class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          <span class="fs-4">KRS</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href=" {{ route('mahasiswa') }}" class="nav-link text-white {{ Request::is(auth()->user()->jabatan) ? 'active' : '' }}" aria-current="page">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
              Profile
            </a>
          </li>
          <li>
            <a href="{{ route('krs') }}" class="nav-link text-white {{ Request::is(auth()->user()->jabatan.'/krs*') ? 'active' : '' }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-fill me-2" viewBox="0 0 16 16">
                <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
              </svg>
              KRS
            </a>
          </li>
          <li>
            <a href="{{ route('khs') }}" class="nav-link text-white {{ Request::is(auth()->user()->jabatan.'/khs*') ? 'active' : '' }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check-fill me-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
              </svg>
              KHS
            </a>
          </li>
          <li>
            <a href="{{ route('mata_kuliah') }}" class="nav-link text-white {{ Request::is(auth()->user()->jabatan.'/matkul*') ? 'active' : '' }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill me-2" viewBox="0 0 16 16">
                <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
              </svg>
              Daftar Mata Kuliah
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
      <div class="konten container-fluid" >
        <div id="alert" class="position-fixed alert alert-@if(session()->has('pesan')){{session()->get('jenis_pesan') }}@endif" role="alert">
            <div class="container-fluid p-0 m-0" style="font-size: 16px">
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
      {{-- content area --}}
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
</body>
</html>