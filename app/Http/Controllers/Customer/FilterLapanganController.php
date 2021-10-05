<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Lapangan;
use Illuminate\Http\Request;

class FilterLapanganController extends Controller
{
    public function byfutsalcustomer(Request $request){
        $items = Lapangan::with(['pengelola'])->where('kategori', 'futsal')->get();

        return view('pages.customer.lapangan.byfutsal', [
            'items' => $items
        ]);
    }

    public function bybulutangkiscustomer(Request $request){
        $items = Lapangan::with(['pengelola'])->where('kategori', 'bulu tangkis')->get();

        return view('pages.customer.lapangan.bybulutangkis', [
            'items' => $items
        ]);
    }

    public function bybasketcustomer(Request $request){
        $items = Lapangan::with(['pengelola'])->where('kategori', 'basket')->get();

        return view('pages.customer.lapangan.bybasket', [
            'items' => $items
        ]);
    }


    public function byratecustomer(Request $request){
        $items = Lapangan::with(['pengelola'])->orderBy('rating', 'DESC')->get();

        return view('pages.customer.lapangan.byrate', [
            'items' => $items
        ]);
    }

    public function byharga_sewa(Request $request){
        $items = Lapangan::with(['pengelola'])->orderBy('harga_sewa_perjam', 'ASC')->get();

        return view('pages.customer.lapangan.byharga', [
            'items' => $items
        ]);
    }
}
