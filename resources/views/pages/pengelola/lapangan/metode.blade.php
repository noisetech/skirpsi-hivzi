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
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center table-bordered table-hover" width="100%" cellspacing="0" id="dataTable">
                        <tr>
                            <th>User</th>
                            <th>Lapangan 1</th>
                            <th>Lapangan 2</th>
                            <th>Lapangan 3</th>
                            <th>Lapangan 4</th>
                            <th>Rata Rata</th>
                        </tr>
                         <tr>
                            <td>{{ $id_user->user->customer->nama_lengkap }}</td>
                            <td>{{ $hasil_rating_lapangan_1_u1 }}</td>
                            <td>{{ $hasil_rating_lapangan2_u1 }}</td>
                            <td>{{ $hasil_rating_lapangan3_u1 }}</td>
                            <td>
                                {{ $hasil_rating_lapangan4_ui }}
                            </td>
                            <td>{{ $rata_rata_c1 }}</td>
                        </tr>
                         <tr>
                            <td>{{ $id_user2->user->customer->nama_lengkap }}</td>
                            <td>{{ $hasil_rating_lapangan1_u2 }}</td>
                            <td>{{ $hasil_rating_lapangan2_u2 }}</td>
                            <td>{{ $hasil_rating_lapangan3_u2 }}</td>
                            <td>
                                {{ $hasil_rating_lapangan4_u2 }}
                            </td>
                            <td>{{ $rata_rata_c2 }}</td>
                        <tr>
                            <td>Hasil Similarity</td>
                            <td colspan="5" class="text-center">{{ $hasil_similarity }}</td>
                        </tr>

                        <tr>
                            <td>Hasil Prediksi</td>
                            <td colspan="5" class="text-center">{{ $hasil_perdisiki }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


