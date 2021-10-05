@extends('layouts.admin')

@section('title', 'Lapangan')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-5">

    <a href="{{ route('byfutsaladmin') }}" class="btn btn-sm btn-primary mb-4">By Futsal</a>
    <a href="{{ route('bybulutangkisadmin') }}" class="btn btn-sm btn-warning mb-4 text-white">By Bulu Tangkis</a>
    <a href="{{ route('bybasketadmin') }}" class="btn btn-sm btn-secondary mb-4 text-white">By Basket</a>
    <a href="{{ route('byrateadmin') }}" class="btn btn-sm btn-danger mb-4 text-white">By Rate</a>
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
                            <th>Nama Pengelola</th>
                            <th>No Telpon Pengelola</th>
                            <th>Nama Lapangan</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>No Lapangan</th>
                            <th>Jenis Lapangan</th>
                            <th>Waktu Lapangan</th>
                            <th>Alamat</th>
                            <th>Harga Sewa Perjam</th>
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
                            <td>{{ $item->harga_sewa_perjam }}</td>
                            <td>
                                <a href="{{ route('lapangan-admin.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('lapangan-admin.destroy', $item->id) }}" method="POST" style="display: inline-block">
                                    @csrf

                                    <button class="btn btn-sm btn-danger" type="submit">
                                        Hapus
                                    </button>
                                </form>
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
