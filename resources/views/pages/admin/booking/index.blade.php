@extends('layouts.admin')

@section('title', ' Data Booking Lapangan')

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
            <div class="table-responsive">
                <table class="table text-center table-bordered table-hover" width="100%" cellspacing="0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Nama Lapangan</th>
                            <th>Tanggal Booking</th>
                            <th>Status Booking</th>
                            <th>No Telpon</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->customer->nama_lengkap }}</td>
                            <td>{{ $item->lapangan->nama_lapangan }}</td>
                            <td>{{ $item->tanggal_transaksi }}</td>
                            <td>{{ $item->lapangan->pengelola->no_telpon }}</td>
                            <td>{{ $item->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
  </div>
@endsection

@push('script')
<script>
$(document).ready(function(){
    $('#dataTable').DataTable();
})
</script>
@endpush
