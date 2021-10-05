@extends('layouts.customer')

@section('title', 'Rating Lapangan')

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
            <form action="{{ route('proses-input-rate-lapangan', $booking->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="">Rating Lapangn</label>
                    <input type="text" name="rate" class="form-control" placeholder="Masukan Rating Lapangan 1-5" value="{{ old('rate') }}">
                </div>


                <button class="btn btn-block btn-primary" type="submit">
                    Peroses input rate
                </button>
            </form>
        </div>
    </div>
  </div>
@endsection
