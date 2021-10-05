<?php

namespace App\Http\Controllers\Pengelola;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashbaord_pengelola(){
        $user = Auth::user();
        $id_pengelola = $user->pengelola->id;

        $lapangan = Lapangan::whereHas('pengelola', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola);
        })->count();

        $booking_pending = Booking::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola);
        })->where('status', 'Pending')->count();

        $booking_success = Booking::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola);
        })->where('status', 'Success')->count();

        $booking_dikembalikan = Booking::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola);
        })->where('status', 'Dikembalikan')->count();


        // dd($booking_pending);
        return view('pages.pengelola.dashboad-pengelola', [
            'lapangan' => $lapangan,
            'booking_pending' => $booking_pending,
            'booking_success' => $booking_success,
            'booking_dikembalikan' => $booking_dikembalikan
        ]);
    }
}
