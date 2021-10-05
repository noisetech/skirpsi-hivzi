@extends('layouts.app')

@section('title', 'Halaman Login')
@section('content')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<style>
    .login-page{
        background-image: url('{{ asset('backend/test.png') }}');
        -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: 90rem 40rem;
 background-repeat: no-repeat;
    }
</style>
<body class="hold-transition login-page">

    <div class="bg-halaman">

    </div>

<div class="login-box">
    <div class="login-logo">
      </div>

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <p class="login-box-msg" style="font-family: Roboto; font-size: 16px;">GEMOR LOGIN PAGE</p>

      <form action="{{ route('login') }}" method="post" class="">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Masukan Username Anda">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Masukan Password Anda">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <button class="btn btn-block btn-primary mt-4" type="submit">
            <i class="fas fa-sign-in-alt"> Login</i>
        </button>
      </form>

      <div class="social-auth-links text-center mt-3">
        <a href="{{ route('register') }}" class="btn btn-block btn-primary">
          <i class="fas fa-sm fa-registered"></i>
        </a>

      </div>
      <!-- /.social-auth-links -->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>

</body>
</html>

@endsection
