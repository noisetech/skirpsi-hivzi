@extends('layouts.customer')

@section('title', 'Data Lapangan')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row mb-2">
            <div class="col-sm-6 mt-3">


            <a href="{{ route('byfutsalcustomer') }}" class="btn btn-sm btn-secondary">Futsal</a>
            <a href="{{ route('bybulutangkiscustomer') }}" class="btn btn-sm btn-danger">Bulu Tangkis</a>
            <a href="{{ route('bybasketcustomer') }}" class="btn btn-sm btn-warning">Basket</a>
            <a href="{{ route('byratecustomer') }}" class="btn btn-sm btn-primary">Rate</a>
            <a href="{{ route('byharga_sewa') }}" class="btn btn-sm btn-primary">Harga Sewa</a>
            </div><!-- /.col -->

        </div><!-- /.row
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
                            <th>Gambar</th>
                            <th>No Lapangan</th>
                            <th>Jenis Lapangan</th>
                            <th>Waktu Lapangan</th>
                            <th>Alamat</th>
                            <th>Rating Lapangan</th>
                            <th>Harga Sewa Perjam</th>
                            <th>Status Ketersediaan</th>
                            <th>Rekening Pembayaran</th>
                            <th>No Rekening Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                         <td>{{ $item->pengelola->nama_lengkap }}</td>
                         <td>{{ $item->pengelola->no_telpon }}</td>
                         <td>{{ $item->nama_lapangan }}</td>
                         <td>{{ $item->kategori }}</td>
                         <td>
                             <img src="{{ Storage::url($item->gambar) }}" alt="" width="150px" class="img-thumbnail">
                         </td>
                         <td>{{ $item->no_lapangan }}</td>
                         <td>{{ $item->jenis_lapangan }}</td>
                         <td>{{ $item->waktu_lapangan }}</td>
                         <td>{{ $item->alamat }}</td>
                         <td>{{ $item->rating }}</td>
                         <td>{{'Rp. '.number_format($item->harga_sewa_perjam,2,',','.') }}</td>
                         <td>{{ $item->status_ketersediaan }}</td>
                         <td>{{ $item->pengelola->rekening }}</td>
                         <td>{{ $item->pengelola->no_rekening }}</td>
                         <td>
                         @if ($item->status_ketersediaan == 'Tidak Tersedia')
                            Sudah dibooking orang lain
                         @else
                         <a href="{{ route('halaman-input-tambahan', $item->id) }}" class="btn btn-sm btn-primary">
                            Order
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
