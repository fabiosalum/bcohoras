
      @section('css')

      <style type="text/css">

        #btn_sair.span{
           text.hover:red;
        }


        </style>

      @endsection

      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.painel')}}">
                  <i class="mdi mdi-view-dashboard menu-icon"></i>
                  <span class="menu-title">Painel</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('setores.index')}}">
                  <i class="mdi mdi-view-headline menu-icon"></i>
                  <span class="menu-title">Setores</span>
                </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{route('adminuser.index')}}">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Usuários</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="{{route('solicitacoes.index')}}">
              <i class="mdi mdi-timetable menu-icon"></i>
              <span class="menu-title">Lançamentos</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="true" aria-controls="ui-basic">
              <i class="mdi mdi-checkbox-marked-circle-outline menu-icon"></i>
              <span class="menu-title">Solicitações</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('solicitacoes.pendentes')}}">Pendentes</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('solicitacoes.aprovadas')}}">Aprovadas</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('relatorios.index')}}">
              <i class="mdi mdi-note-text menu-icon"></i>
              <span class="menu-title">Relatórios</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.config')}}">
              <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">Configurações</span>
            </a>
          </li>

            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="nav-link" id="btn_sair" data-toggle="collapse" aria-expanded="false" style="border: none; background-color:white; " >
                    <i class="mdi mdi-account menu-icon"></i>
                    <span class="menu-title">Sair</span>
                </button>

                </form>
            </li>

        </ul>
      </nav>
