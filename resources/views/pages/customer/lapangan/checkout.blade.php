@extends('layouts.customer')

@section('title', 'Chekout Lapangan')

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
            <form action="{{ route('proses-booking', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">Keterangan Jam Main</label>
                    <input type="text" name="keterangan_waktu_main" class="form-control" placeholder="Keteerangan Waktu Main" value="{{ old('keterangan_waktu_main') }}">
                </div>

                <div class="form-group">
                    <label for="">Lama Waktu Main</label>
                    <input type="text" name="lama_waktu_main" class="form-control" placeholder="Lama Waktu Main" value="{{ old('lama_waktu_main') }}">
                </div>

                <div class="form-group">
                    <label for="">Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" class="form-control-file">
                </div>

                <button class="btn btn-block btn-primary">
                    Booking
                </button>
            </form>
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
