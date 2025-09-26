<!doctype html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('/') }}"
  data-template="vertical-menu-template"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login Inventify</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset ('/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset ('/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="{{ asset ('/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset ('/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="{{ asset ('/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset ('/vendor/libs/node-waves/node-waves.css') }}" />

    <link rel="stylesheet" href="{{ asset ('/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/vendor/libs/typeahead-js/typeahead.css') }}" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('/vendor/libs/@form-validation/form-validation.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset ('/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<style>
  .login-box {
    background: rgba(255, 255, 255, 0.20); 
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px); 
    border-radius: 15px; 
    padding: 30px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
}

  .authentication-wrapper {
    background: url("{{ asset('img/icons/misc/in.png') }}") no-repeat center center;
    background-size: cover;        
    background-attachment: fixed;   
    min-height: 100vh;              
    width: 100%;
    margin: 0;
    padding: 0;
}


  .authentication-wrapper::before {
    display: none !important;
  }

  .authentication-inner {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.2);
    padding: 30px;
  }
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;

    /* Kotak luar */
.card {
  background: rgba(255, 255, 255, 0.15) !important;
  backdrop-filter: blur(15px) !important;
  -webkit-backdrop-filter: blur(15px) !important;
  border-radius: 20px !important;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3) !important;
  border: 1px solid rgba(255, 255, 255, 0.2) !important;
}

/* Isi dalam kotak */
.card-body {
  background: transparent !important;
  border-radius: 20px !important;
  padding: 30px !important;
}

/* Input transparan */
.form-control {
  background: rgba(255, 255, 255, 0.25) !important;
  border: 1px solid rgba(255, 255, 255, 0.3) !important;
  color: #000 !important;
}

.form-control::placeholder {
  color: rgba(0, 0, 0, 0.6) !important;
}

/* Tombol transparan */
.btn-primary {
  background: rgba(0, 123, 255, 0.85) !important;
  border: none !important;
  backdrop-filter: blur(4px) !important;
  transition: all 0.3s ease !important;
}

.btn-primary:hover {
  background: rgba(0, 123, 255, 1) !important;
}

}

</style>

  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6">
          <!-- Login -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center mb-6">
                <a href="index.html" class="app-brand-link">
                  <span class="app-brand-logo demo">
                    <img src="{{ asset('img/icons/misc/logo-inves.jpg.png') }}" alt="Inventify Logo" style="width: 80px; height: 60px;">
                  </span>
                  <span class="app-brand-text demo text-heading fw-bold">Inventify</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-1" style="text-align:center;">Selamat Datang </h4>
              <p class="mb-6" style="text-align:center;">Silahkan login untuk masuk ke INVENTIFY</p>

              <form id="formAuthentication" class="mb-4" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-6">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Masukan alamat email"
                    autofocus />
                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-6 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                  </div>
                  @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="my-8">
                  <div class="d-flex justify-content-between">
                    <div class="form-check mb-0 ms-2">
                      <input class="form-check-input" name="remember" type="checkbox" id="remember-me" />
                      <label class="form-check-label" for="remember-me"> Selalu ingat saya </label>
                    </div>
                   
                  </div>
                </div>
                <div class="mb-6">
                  <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset ('/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset ('/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset ('/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset ('/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset ('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset ('/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{ asset ('/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset ('/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset ('/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset ('/vendor/libs/@form-validation/auto-focus.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset ('/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset ('/js/pages-auth.js') }}"></script>
  </body>
</html>