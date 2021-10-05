@extends('layouts.customer')

@section('title', 'Bookingan Customer')

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
                <table class="table  table-bordered table-hover" width="100%" cellspacing="0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama Pengelola</th>
                            <th>No Telpon Pengelola</th>
                            <th>Nama Lapangan</th>
                            <th>Kategori</th>
                            <th>No Lapangan</th>
                            <th>Jenis Lapangan</th>
                            <th>Waktu Lapangan</th>
                            <th>Alamat</th>
                            <th>Harga Sewa Perjam</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status Booking</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                         <td>{{ $item->lapangan->pengelola->nama_lengkap }}</td>
                         <td>{{ $item->lapangan->pengelola->no_telpon }}</td>
                         <td>{{ $item->lapangan->nama_lapangan }}</td>
                         <td>{{ $item->lapangan->kategori }}</td>
                         <td>{{ $item->lapangan->no_lapangan }}</td>
                         <td>{{ $item->lapangan->jenis_lapangan }}</td>
                         <td>{{ $item->lapangan->waktu_lapangan }}</td>
                         <td>{{ $item->lapangan->alamat }}</td>
                         <td>{{'Rp. '.number_format($item->total_pembayaran,2,',','.') }}</td>
                         <td>
                             <img src="{{ Storage::url($item->bukti_pembayaran) }}" alt="" width="150px" class="img-thumbnail">
                         </td>
                         <td>{{ $item->status }}</td>
                         <td>
                           @if ($item->status === 'Pending')
                            Tunggu Konfrimasi Dari Pengelola
                           @elseif ($item->status == 'Dikembalikan')
                           Lapangan Telah Dikembalikan
                           @else
                            <form action="{{ route('pengembalian-lapangan', $item->id) }}" method="POST">
                            @csrf

                            <button class="btn btn-sm btn-secondary" type="submit">
                                Pengembalian
                            </button>
                            </form>

                           <a href="{{ route('halama-input-rate.customer', $item->id) }}" class="btn btn-sm btn-primary">Rate Lapangan</a>
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
