<?php

namespace App\Http\Controllers\Customer;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Lapangan;
use App\RateLapangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LapanganController extends Controller
{
    public function semua_lapangan(Request $request){


        $items = Lapangan::with(['pengelola'])->get();

        return view('pages.customer.lapangan.index', [
            'items' => $items
    ]);
    }

    public function data_bookingan_customer(Request $request){
        $id_customer = Auth::user()->customer->id;


        $items = Booking::whereHas('customer', function($q) use($id_customer){
            return $q->where('customer_id', $id_customer);
        })->with(['lapangan'])
        ->get();

        return view('pages.customer.bookingan.index', [
            'items' => $items
        ]);
    }

    public function halaman_input_tambahan_booking(Request $request, $id){
        $item = Lapangan::with(['pengelola'])->find($id);

        return view('pages.customer.lapangan.checkout', [
            'item' => $item
        ]);
    }

    public function proses_booking(Request $request, $id){
        $lapangan = Lapangan::with(['pengelola'])->find($id);

        $id_lapangan = $lapangan->id;

        $id_customer = Auth::user()->customer->id;

        $booking = new Booking();
        $booking->customer_id = $id_customer;
        $booking->lapangan_id = $id_lapangan;
        $booking->tanggal_transaksi = Carbon::now();
        $booking->lama_waktu_main = $request->lama_waktu_main;
        $booking->keterangan_waktu_main = $request->keterangan_waktu_main;
        $booking->total_pembayaran =
        $request->lama_waktu_main * $lapangan->harga_sewa_perjam;
        if($request->file('bukti_pembayaran')){
            $booking['bukti_pembayaran'] =$request->file('bukti_pembayaran')
            ->store('assets/gambar', 'public');
        }
        $booking->status = 'Pending';

        $booking->save();

        Lapangan::where('id', $id_lapangan)->update([
            'status_ketersediaan' => 'Tidak Tersedia'
        ]);

        return redirect()->route('databookingan.csutomer');
    }

    public function rate_lapangan(Request $request, $id){

        $booking = Booking::with(['lapangan'])->find($id);


        return view('pages.customer.lapangan.inputrating', [
            'booking' => $booking
        ]);
    }


    public function input_rate(Request $request, $id){
        $data_lapangan = Booking::with('lapangan')->find($id);

        $user = Auth::user()->id;
        $id_lapangan = $data_lapangan->lapangan->id;



        $data = new RateLapangan();
        $data->user_id = $user;
        $data->lapangan_id = $id_lapangan;
        $data->rate = $request->rate;
        $data->save();

        if (empty($request->rate)) {

        } else {
            $data_rate = RateLapangan::where('lapangan_id', $id_lapangan)->sum('rate');
            $jumlah_inputan_rate_yang_tidak_kosong = RateLapangan::with('lapangan', 'user')->where('lapangan_id', $id_lapangan)->whereNotNull('rate')->count();




            $kalkulasi = $data_rate / $jumlah_inputan_rate_yang_tidak_kosong;

            $data_lapangan = Lapangan::where('id', $id_lapangan)->update([
                'rating' => $kalkulasi
            ]);
        }


        return redirect()->route('databookingan.csutomer');

    }

    public function pengembalian(Request $request, $id){
        $user = Auth::user();
        $id_customer = $user->customer->id;
        $booking = Booking::whereHas('customer', function($q) use($id_customer){
            return $q->where('customer_id', $id_customer);
        })->with(['lapangan'])->find($id);


       $booking->where('id', $booking->id)->update([
        'status' => 'Dikembalikan'
    ]);

    Lapangan::with(['booking'])->where('id', $booking->lapangan_id)->update([
        'status_ketersediaan' => 'Tersedia'
    ]);

    return redirect()->route('databookingan.csutomer');

    }


}
