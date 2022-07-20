<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">webSIG</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
          </li>
          {{-- <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Kecamatan
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  @foreach ($kecamatan as $data)
                    <li><a class="dropdown-item" href="/kecamatan/{{ $data->id_kecamatan }}">{{ $data->kecamatan }}</a></li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </div> --}}
          <li class="nav-item">
            <a class="nav-link {{ Request::is('products') ? 'active' : '' }}" href="/products">Produk</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link " href="/categories">Categories</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="/kontak">Kontak</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <!-- Authentication Links -->
          @guest
              @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
              @endif

              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              {{-- @hasanyrole($roles)
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                  </li>
              @endhasanyrole --}}
              <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                      <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <a class="dropdown-item" href="{{ url('/logout') }}"> logout </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
              {{-- <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li> --}}
          @endguest
      </ul>
      </div>
    </div>
</nav>