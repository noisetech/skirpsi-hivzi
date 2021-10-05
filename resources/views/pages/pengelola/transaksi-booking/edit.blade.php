@extends('layouts.pengelola')

@section('title', 'Ubah Status Booking ')

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
            <form action="{{ route('bookingan.update', $item->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="">Status Transaksi</label>
                    <select name="status" class="form-control">
                        <option value="{{ $item->status }}">Data Sebelumnya ({{ $item->status }})</option>
                        <option value="Success">Success</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>

                <button class="btn btn-block btn-warning text-white" type="submit">
                    Ubah
                </button>
            </form>
        </div>
    </div>
  </div>
@endsection

