<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilterController extends Controller
{
    public function byfutsal(Request $request){
        $user = Auth::user();
        $id_pengelola = $user->pengelola->id;

        $items = Lapangan::whereHas('pengelola', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola);
        })->where('kategori', 'futsal')
        ->get();


        return view('pages.pengelola.lapangan.byfutlsa', [
            'items' => $items
        ]);
    }

    public function bybulutangkis(Request $request){
        $user = Auth::user();
        $id_pengelola = $user->pengelola->id;

        $items = Lapangan::whereHas('pengelola', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola);
        })->where('kategori', 'bulu tangkis')
        ->get();


        return view('pages.pengelola.lapangan.byfutlsa', [
            'items' => $items
        ]);
    }

    public function bybasket(Request $request){
        $user = Auth::user();
        $id_pengelola = $user->pengelola->id;

        $items = Lapangan::whereHas('pengelola', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola);
        })->where('kategori', 'basket')
        ->get();


        return view('pages.pengelola.lapangan.byfutlsa', [
            'items' => $items
        ]);
    }

    public function byrate(Request $request){
        $user = Auth::user();
        $id_pengelola = $user->pengelola->id;

        $items = Lapangan::whereHas('pengelola', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola);
        })->orderBy('rating', 'DESC')
        ->get();


        return view('pages.pengelola.lapangan.byfutlsa', [
            'items' => $items
        ]);
    }
}
