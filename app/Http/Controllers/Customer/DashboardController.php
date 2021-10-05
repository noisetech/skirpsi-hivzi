<?php

namespace App\Http\Controllers\Customer;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard_customer(){

        $user = Auth::user();
        $id_customer = $user->customer->id;

        $lapangan_tersedia = Lapangan::with(['pengelola'])->where('status_ketersediaan', 'Tersedia')->count();

        $booking_dikembalikan = Booking::whereHas('customer', function($q) use($id_customer){
            return $q->where('customer_id', $id_customer);
        })->whereIn('status', ['Dikembalikan'])->count();

        $booking_pending = Booking::whereHas('customer', function($q) use($id_customer){
            return $q->where('customer_id', $id_customer);
        })->whereIn('status', ['Pending'])->count();

        $booking_success = Booking::whereHas('customer', function($q) use($id_customer){
            return $q->where('customer_id', $id_customer);
        })->whereIn('status', ['Success'])->count();



        return view('pages.customer.dashboad-customer', [
            'lapangan_tersedia' => $lapangan_tersedia,
            'booking_dikembalikan' => $booking_dikembalikan,
            'booking_pending' => $booking_pending,
            'booking_success' => $booking_success
        ]);
    }
}
