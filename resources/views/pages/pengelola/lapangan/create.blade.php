@extends('layouts.pengelola')

@section('title', 'Tambah Lapangan')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Data Lapangan</h1>
            </div><!-- /.col -->
          </div>
        </div><!-- /.container-fluid -->
      </div>
    <!-- /.content-header -->

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('lapangan-pengelola.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">Nama Lapangan</label>
                    <input type="text" name="nama_lapangan" class="form-control" placeholder="Nama Lapangan" value="{{ old('nama_lapangan') }}">
                </div>

                <div class="form-group">
                    <label for="">Kategori</label>
                    <input type="text" name="kategori" class="form-control" placeholder="Kategori" value="{{ old('kategori') }}">
                </div>

                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" name="gambar" class="form-control-file">
                </div>

                <div class="form-group">
                    <label for="">No Lapangan</label>
                    <input type="text" name="no_lapangan" class="form-control" placeholder="Waktu Lapangan" value="{{ old('no_lapangan') }}">
                </div>


                <div class="form-group">
                    <label for="">Jenis Lapangan</label>
                    <input type="text" name="jenis_lapangan" class="form-control" placeholder="Jenis Lapangan" value="{{ old('jenis_lapangan') }}">
                </div>

                <div class="form-group">
                    <label for="">Waktu Lapangan</label>
                    <input type="time" name="waktu_lapangan" class="form-control" placeholder="Waktu Lapangan" value="{{ old('waktu_lapangan') }}">
                </div>


                <div class="form-group">
                    <label for="">Harga Sewa Perjam</label>
                    <input type="text" name="harga_sewa_perjam" class="form-control" placeholder="Harga Sewa Perjam" value="{{ old('harga_sewa_perjam') }}">
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" rows="10" class="form-control"></textarea>
                </div>



                <button class="btn btn-sm btn-primary" type="submit">
                    Simpan
                </button>
            </form>
        </div>
    </div>
  </div>
@endsection
