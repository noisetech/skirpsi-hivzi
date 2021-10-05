@extends('layouts.app')

@section('title', 'Halaman Register')
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
    .register-page{
        background-image: url('{{ asset('backend/test.png') }}');
        -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: 90rem 40rem;
 background-repeat: no-repeat;
    }
</style>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register Your Account</p>

      <form action="{{ route('register') }}" method="POST">
        @csrf


        <div class="input-group mb-3">
          <input type="text" name="nama_lengkap" class="form-control" placeholder="Ketikan Nama Lengkap Anda">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Ketikan Email Anda">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Ketikan Username Anda">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-users"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="no_telpon" class="form-control" placeholder="Ketikan No Telpon Anda">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <select name="role" class="form-control">
               <option value="">Pilih Role Anda</option>
               <option value="Pengelola Lapangan">Pengelola Lapangan</option>
               <option value="Customer">Customer</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                {{-- <span class="fas fa-envelope"></span> --}}
              </div>
            </div>
          </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <button class="btn btn-block btn-primary" type="submit" style="font-family: Roboto;">
            Register <i class="fas fa-sm fa-paper-plane"></i>
        </button>
      </form>


      </div>


    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>

@endsection
