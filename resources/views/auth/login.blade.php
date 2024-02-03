<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>The MISS System | Log in</title>
  @php
  $getHeaderSetting = App\Models\SettingModel::getSingle();
  $settingModel = new App\Models\SettingModel(); // Create an instance of SettingModel
  $getLoginImage = $settingModel->getLoginImage(); // Call the method on the instance
  $schoolLogo = $getHeaderSetting->getFevicon();
  @endphp

  <link href="{{ $schoolLogo }}" rel="icon" type="image/jpg">

  <!-- External stylesheets -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ url('public/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/dist/css/adminlte.min.css') }}">

  <!-- Your custom styles -->
  <style>
    body {
      background: url('{{ $getLoginImage }}') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
    }

    .login-logo img {
      width: 100px; /* Adjust the logo width as needed */
      height: auto;
      margin-bottom: 20px;
    }

    .login-box-msg {
      font-size: 18px;
    }

    .form-control {
      border: 1px solid #ccc;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: rgb(6, 179, 0);
      border-color: #00b30f;
    }
  </style>
</head>

<body class="hold-transition login-page" style="background: url('{{ $getLoginImage }}') no-repeat center center fixed; background-size: cover;">

  <div class="login-box">
    <div class="login-logo">
      <img src="{{ $schoolLogo }}" alt="School Logo">
    </div>
    <div class="card card-outline card-success">
      <div class="card-header text-center">
        <a href="" class="h1"><b>MISS</b><br>Login</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        @include('_message')
        <form action="{{ url('login') }}" method="post">
          {{ csrf_field() }}
          <div class="input-group mb-3">
            <input type="email" class="form-control" required name="email" placeholder="Enter Your Email ID">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span id="togglePassword" class="fas fa-eye" onclick="togglePasswordField()"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>

        <p class="mb-1">
          <a href="{{ url('forgot-password') }}">I forgot my password</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ url ('public/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ url ('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script type="{{ url ('public/dist/js/adminlte.min.js') }}"></script>

  <script>
    function togglePasswordField() {
      var passwordField = document.getElementById("password");
      var toggleIcon = document.getElementById("togglePassword");

      if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
      } else {
        passwordField.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
      }
    }
  </script>

</body>

</html>
