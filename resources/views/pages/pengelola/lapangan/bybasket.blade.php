@extends('layouts.pengelola')

@section('title', 'Filter By Basket')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row mb-2">
                    <div class="col-sm-6 mt-3">
                        <a href="{{ route('lapangan-pengelola.create') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-sm fa-plus-circle"> Tambah Data</i></a>
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
                                <th>Nama Lapangan</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>No Lapangan</th>
                                <th>Jenis Lapangan</th>
                                <th>Waktu Lapangan</th>
                                <th>Harga Sewa Perjam</th>
                                <th>Rating Lapangan</th>
                                <th>Alamat</th>
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
                                    <td>{{ $item->nama_lapangan }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->gambar) }}" alt="" width="150px"
                                            class="img-thumbnail">
                                    </td>
                                    <td>{{ $item->no_lapangan }}</td>
                                    <td>{{ $item->jenis_lapangan }}</td>
                                    <td>{{ $item->waktu_lapangan }}</td>
                                    <td>{{ $item->harga_sewa_perjam }}</td>
                                    <td>{{ number_format($item->rating, 2) }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->status_ketersediaan }}</td>
                                    <td>{{ $item->pengelola->rekening }}</td>
                                    <td>{{ $item->pengelola->no_rekening }}</td>
                                    <td>
                                        <a href="{{ route('lapangan-pengelola.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-sm fa-edit"></i>
                                        </a>

                                        <form action="{{ route('lapangan-pengelola.destroy', $item->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                <i class="fas fa-sm fa-trash-alt"></i>
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
        $(document).ready(function() {
            $('#dataTable').DataTable();
        })
    </script>
@endpush
