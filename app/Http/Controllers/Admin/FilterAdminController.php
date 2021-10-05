<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class FilterAdminController extends Controller
{
    public function byfutsaladmin(){
        $items = Lapangan::all()->where('kategori', 'futsal');

        return view('pages.admin.lapangan.byfutsal', [
            'items' => $items
        ]);
    }

    public function bybulu_tangkis(){
        $items = Lapangan::all()->where('kategori', 'bulu tangkis');

        return view('pages.admin.lapangan.byfutsal', [
            'items' => $items
        ]);
    }

    public function bybasket(){
        $items = Lapangan::all()->where('kategori', 'basket');

        return view('pages.admin.lapangan.byfutsal', [
            'items' => $items
        ]);
    }

    public function byrate(){


        $items = Lapangan::orderBy('rating', 'ASC')->get();

        return view('pages.admin.lapangan.byfutsal', [
            'items' => $items
        ]);
    }
}
