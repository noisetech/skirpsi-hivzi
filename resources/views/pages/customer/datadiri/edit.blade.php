@extends('layouts.customer')

@section('title', 'Ubah Data Diri Customer')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('datadiricustomer.update', $item->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="{{ $item->nama_lengkap }}">
                </div>

                <div class="form-group">
                    <label for="">No Telpon</label>
                    <input type="text" name="no_telpon" class="form-control" placeholder="No Telpon" value="{{ $item->no_telpon }}">
                </div>




                <button class="btn btn-block btn-warning" type="submit">
                    Ubah
                </button>
            </form>
        </div>
  </div>
</div>
@endsection


