<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.urbanui.com/chroma/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Aug 2018 20:24:44 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Chroma Admin Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/simple-line-icon/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <!-- <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one"> -->
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100 mx-auto">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">
                            <!-- <div class="text-center">
                                <img src="{{ asset('images/logo_sodexo.png') }}" alt="">
                            </div> -->
                            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="label">E-mail</label>
                                    <div class="input-group">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label">Contraseña</label>
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="*********" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary submit-btn btn-block">
                                            {{ __('Ingresar') }}
                                        </button>

                                        <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a> -->
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                                            <!-- <input type="checkbox" class="form-check-input" checked> Keep me signed in  -->
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Recordar contraseña 
                                            <!-- <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label> -->
                                        </label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="text-small forgot-password text-black">Resetar contraseña</a>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-block g-login">
                                    <img class="mr-3" src="../../images/file-icons/icon-google.svg" alt="">Ingresar con Google</button>
                                </div>
                                <div class="text-block text-center my-3">
                                    <span class="text-small font-weight-semibold">¿No eres un miembro?</span>
                                    <a href="{{ route('register') }}" class="text-black text-small">Registrate</a>
                                </div>
                            </form>
                        </div>
                        <!-- <ul class="auth-footer">
                            <li>
                            <a href="#">Conditions</a>
                            </li>
                            <li>
                            <a href="#">Help</a>
                            </li>
                            <li>
                            <a href="#">Terms</a>
                            </li>
                        </ul>
                        <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p> -->
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
     <!-- plugins:js -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    </body>


<!-- Mirrored from www.urbanui.com/chroma/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Aug 2018 20:24:44 GMT -->
</html>

