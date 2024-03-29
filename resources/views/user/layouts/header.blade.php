    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
          <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="{{route('user.painel')}}"><H4>BANCO DE HORAS</H4></a>
            <a class="navbar-brand brand-logo-mini"  href="{{route('admin.painel')}}"><h4>BH</h4></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-sort-variant"></span>
            </button>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

        @php
            $id = Auth::user()->id;
            $user = App\Models\User::find($id);
        @endphp
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <span class="nav-profile-name">{{$user->name}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                {{-- <a class="dropdown-item">
                  <i class="mdi mdi-settings text-primary"></i>
                  Perfil
                </a> --}}
                <form method="GET" action="{{ route('user.editar.perfil') }}">
                    @csrf
                    <button class="dropdown-item">
                        <i class="mdi mdi-settings text-primary"></i>
                        Perfil
                    </button>
                </form>

                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button class="dropdown-item">
                          <i class="mdi mdi-logout text-primary"></i>
                          Sair
                      </button>
                  </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
