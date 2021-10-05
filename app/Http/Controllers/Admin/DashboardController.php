<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Lapangan;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $lapangan = Lapangan::all()->count();

        $booking = Booking::all()->count();

        $user = User::all()->count();


        return view('pages.admin.dashboad-admin', [
            'lapangan' => $lapangan,
            'booking' => $booking,
            'user' => $user
        ]);
    }
}
