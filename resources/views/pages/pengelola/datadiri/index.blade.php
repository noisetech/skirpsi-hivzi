@extends('layouts.pengelola')

@section('title', 'Lapangan')

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
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    @foreach ($items as $item)
                        <div class="row">
                            {{-- <div class="col-md-4 ml-4 mt-3">
                        <img src="{{ Storage::url($item->gambar) }}" alt="" width="200" height="200" class="rounded-left">
                    </div> --}}
                            <div class="col-lg-4 mt-4">
                                <table cellspacing="0" width="100%">
                                    <tr>
                                        <th>Nama Lengkap:</th>
                                        <td>{{ $item->nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <th>No Telpon:</th>
                                        <td>{{ $item->no_telpon }}</td>
                                    </tr>
                                    <tr>
                                        <th>Rekening:</th>
                                        <td>{{ $item->rekening }}</td>
                                    </tr>
                                    <tr>
                                        <th>No Rekening:</th>
                                        <td>{{ $item->no_rekening }}</td>
                                    </tr>

                                    <tr>
                                        <td><a href="{{ route('datadiripengelola.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning mt-2">Ubah Data</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
