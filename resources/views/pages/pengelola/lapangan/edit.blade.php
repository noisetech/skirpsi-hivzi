@extends('layouts.pengelola')

@section('title', 'Ubah Lapangan')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Data Lapangan</h1>
            </div><!-- /.col -->
          </div>
        </div><!-- /.container-fluid -->
      </div>
    <!-- /.content-header -->

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('lapangan-pengelola.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="">Nama Lapangan</label>
                    <input type="text" name="nama_lapangan" class="form-control" placeholder="Nama Lapangan" value="{{ $item->nama_lapangan }}">
                </div>

                <div class="form-group">
                    <label for="">Kategori</label>
                    <input type="text" name="kategori" class="form-control" placeholder="Kategori" value="{{ $item->kategori }}">
                </div>

                <div class="col">
                    <img src="{{ Storage::url($item->gambar) }}" alt="" width="150px" class="img-thumbnail mb-3 mt3">
                    <p style="font-size: 12px; margin-top: -10px; margin-left: 20px;">gambar sebelumnya</p>
                </div>

                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" name="gambar" class="form-control-file">
                </div>

                <div class="form-group">
                    <label for="">No Lapangan</label>
                    <input type="text" name="no_lapangan" class="form-control" placeholder="Waktu Lapangan" value="{{ $item->no_lapangan }}">
                </div>


                <div class="form-group">
                    <label for="">Jenis Lapangan</label>
                    <input type="text" name="jenis_lapangan" class="form-control" placeholder="Jenis Lapangan" value="{{ $item->jenis_lapangan }}">
                </div>

                <div class="form-group">
                    <label for="">Waktu Lapangan</label>
                    <input type="time" name="waktu_lapangan" class="form-control" placeholder="Waktu Lapangan" value="{{ $item->waktu_lapangan }}">
                </div>


                <div class="form-group">
                    <label for="">Harga Sewa Perjam</label>
                    <input type="text" name="harga_sewa_perjam" class="form-control" placeholder="Harga Sewa Perjam" value="{{ $item->harga_sewa_perjam }}">
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" rows="10" class="form-control">{{ $item->alamat }}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Status Ketersediaan</label>
                    <select name="status_ketersediaan" class="form-control">
                        <option value="{{ $item->status_ketersediaan }}">Data sebelumnya({{ $item->status_ketersediaan }})</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                    </select>
                </div>



                <button class="btn btn-sm btn-warning text-white-50" type="submit">
                    Ubah
                </button>
            </form>
        </div>
    </div>
  </div>
@endsection
