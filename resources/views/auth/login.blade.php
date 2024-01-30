<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>The Ultimate Academia System | Log in</title>
  @php
  $getHeaderSetting = App\Models\SettingModel::getSingle();
  $settingModel = new App\Models\SettingModel(); // Create an instance of SettingModel
  $getLoginImage = $settingModel->getLoginImage(); // Call the method on the instance
  @endphp

  <link href="{{ $getHeaderSetting->getFevicon() }}" rel="icon" type="image/jpg">
  
  <!-- External stylesheets -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ url('public/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/dist/css/adminlte.min.css') }}">

  <!-- Your custom styles -->
  <style>
    body {
      background-image: url('/upload/setting/20231102074252eqdyqcyjwc.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .login-box {
      background-color: rgba(255, 255, 255, 0.9); /* Add a semi-transparent white background to the login box */
      border-radius: 10px;
      padding: 20px;
      margin-top: 100px; /* Adjust as needed */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a subtle shadow to the login box */
    }

    .login-logo {
      font-size: 36px;
      color: #333; /* Choose your desired color */
    }

    .login-box-msg {
      font-size: 18px;
    }

    /* Style the input fields, buttons, and links as needed */
    .form-control {
      border: 1px solid #ccc;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>

<body class="hold-transition login-page" style="background-image: url('{{ $getLoginImage }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Academia</b><br>Login</a>
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
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
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
