@extends('layouts.pengelola')

@section('title', 'Data Booking ')

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
                            <th>Tanggal Transaksi</th>
                            <th>Lama Waktu Main</th>
                            <th>Keterangan Waktu Main</th>
                            <th>Total Pembayaran</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->customer->nama_lengkap }}</td>
                            <td>{{ $item->lapangan->nama_lapangan }}</td>
                            <td>{{ $item->tanggal_transaksi }}</td>
                            <td>{{ $item->lama_waktu_main }}</td>
                            <td>{{ $item->keterangan_waktu_main }}</td>
                            <td>{{ $item->total_pembayaran }}</td>
                            <td>
                                <img src="{{ Storage::url($item->bukti_pembayaran) }}"
                                 alt="" width="150px" class="img-thumbnail">
                            </td>
                            <td>{{ $item->status }}</td>
                            <td>
                                @if ($item->status == 'Pending')
                                <a href="{{ route('bookingan.edit', $item->id) }}" class="btn btn-sm btn-warning  text-white">
                                    ubah status
                                  </a>
                                @endif
                            </td>
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
