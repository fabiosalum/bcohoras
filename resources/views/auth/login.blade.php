<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Banco de Horas</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">

              <h4>Banco de Horas CNEC</h4>
              <h6 class="font-weight-light">Bem vindo!</h6>


              <ul>
                @foreach ($errors->all() as $erro)
                    <li style="color: red; padding-left:20px; margin-top:20px " >{{$erro}}</li>
                @endforeach
            </ul>


            <form method="POST" class="pt-3" action="{{ route('login') }}">
            @csrf
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" name="email" id="exampleInputEmail" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Senha</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" name="password" id="exampleInputPassword" placeholder="Password">
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                      Manter Conectado
                    </label>
                  </div>

                </div>
                <div class="my-3">

                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                </div>

              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2024  All rights reserved. Fábio Salum</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset("assets/vendors/base/vendor.bundle.base.js")}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset("assets/js/off-canvas.js")}}"></script>
  <script src="{{asset("assets/js/hoverable-collapse.js")}}"></script>
  <script src="{{asset("assets/js/template.js")}}"></script>
  <!-- endinject -->
</body>

</html>
