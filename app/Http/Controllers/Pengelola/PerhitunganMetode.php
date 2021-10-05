<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Lapangan;
use App\RateLapangan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerhitunganMetode extends Controller
{
    public function perhitungan(Request $request){
        $user = Auth::user();
        $id_pengelola = $user->pengelola->id;
        $id_user = RateLapangan::with('user')->where('user_id', 2)->first();
        $id_user2 = RateLapangan::with('user')->where('user_id', 3)->first();


        // awal inputan u1 lapangan 1

        // bagian rating lapangan 1
        $total_inputan_u1_l1 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [1]);
        })->whereHas('user', function($q){
            return $q->where('user_id', 2);
        })->whereNotNull('rate')->count('rate');



        $jumlah_inputan_nilai_rating_u1_l1 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [1]);;
        })->whereHas('user', function($q){
            return $q->where('user_id', 2);
        })->sum('rate');

        $inputan_rating_u1_lapangan1 =  $jumlah_inputan_nilai_rating_u1_l1/ $total_inputan_u1_l1;

        $hasil_rating_lapangan1_u1 = $inputan_rating_u1_lapangan1;

        // ahkir bagian rating u1 lapangan 1

        // awal bagian u2 lapangan 1
        $total_inputan_u2_l1 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [1]);
        })->whereHas('user', function($q){
            return $q->where('user_id', 3);
        })->take(2)->whereNotNull('rate')->count('rate');



        $jumlah_inputan_nilai_rating_u2_l1 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [1]);;
        })->whereHas('user', function($q){
            return $q->where('user_id', 3);
        })->sum('rate');

        $inputan_rating_u2_lapangan1 =  $jumlah_inputan_nilai_rating_u2_l1/ $total_inputan_u2_l1;

        $hasil_rating_lapangan1_u2 = $inputan_rating_u2_lapangan1;

        // dd($hasil_rating_lapangan1_u2);

        // akhir u2 lapangan1

// awal inputan u1 lapangan 2

        // bagian rating lapangan 2
        $total_inputan_u1_l2 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [2]);
        })->whereHas('user', function($q){
            return $q->where('user_id', 2);
        })->take(2)->whereNotNull('rate')->count('rate');



        $jumlah_inputan_nilai_rating_u1_l2 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [2]);;
        })->whereHas('user', function($q){
            return $q->where('user_id', 2);
        })->sum('rate');

        $inputan_rating_u1_lapangan2 =  $jumlah_inputan_nilai_rating_u1_l2/ $total_inputan_u1_l2;

        $hasil_rating_lapangan2_u1 = $inputan_rating_u1_lapangan2;

        $total_inputan_u2_l2 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [2]);
        })->whereHas('user', function($q){
            return $q->where('user_id', 3);
        })->take(2)->whereNotNull('rate')->count('rate');



        $jumlah_inputan_nilai_rating_u2_l2 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [2]);;
        })->whereHas('user', function($q){
            return $q->where('user_id', 3);
        })->whereNotNull('rate')->first();

        $inputan_rating_u2_lapangan2 =  $jumlah_inputan_nilai_rating_u2_l2;

        $hasil_rating_lapangan2_u2 = $inputan_rating_u2_lapangan2;
        // ahkir bagian rating u2 lapangan 2


        // awal bagian u1 lapangan3
        $total_inputan_u1_l3 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [3]);
        })->whereHas('user', function($q){
            return $q->where('user_id', 2);
        })->take(2)->whereNotNull('rate')->count('rate');



        $jumlah_inputan_nilai_rating_u1_l3 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [3]);;
        })->whereHas('user', function($q){
            return $q->where('user_id', 2);
        })->sum('rate');

        $inputan_rating_u1_lapangan3 =  $jumlah_inputan_nilai_rating_u1_l3/ $total_inputan_u1_l3;

        $hasil_rating_lapangan3_u1 = $inputan_rating_u1_lapangan3;
        // akhir u1 lapangan3


        // awal bagian u2 lapangan3
        $total_inputan_u2_l3 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [3]);
        })->whereHas('user', function($q){
            return $q->where('user_id', 3);
        })->whereNotNull('rate')->count('rate');

        $jumlah_inputan_nilai_rating_u2_l3 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [3]);;
        })->whereHas('user', function($q){
            return $q->where('user_id', 3);
        })->whereNotNull('rate')->first();

        $inputan_rating_u2_lapangan3 =  $jumlah_inputan_nilai_rating_u2_l3->rate;

        // dd($hasil_rating_lapangan3_u2);

        $hasil_rating_lapangan3_u2 = $inputan_rating_u2_lapangan3;


        // 4 u1

        $total_inputan_u1_l4_not_null = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [4]);
        })->whereHas('user', function($q){
            return $q->where('user_id', 2);
        })->whereNotNull('rate')->count('rate');






        $jumlah_inputan_nilai_rating_u1_l4 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [4]);;
        })->whereHas('user', function($q){
            return $q->where('user_id', 2);
        })->whereNotNull('rate')->first();

        $inputan_rating_u1_lapangan4 =  $jumlah_inputan_nilai_rating_u1_l4;


        $hasil_rating_lapangan4_ui = $inputan_rating_u1_lapangan4;

        // akhir 4


        // 4 u2
        $total_inputan_u2_l4 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [4]);
        })->whereHas('user', function($q){
            return $q->where('user_id', 3);
        })->whereNull('rate')->count('rate');



        if($total_inputan_u2_l4 == 0){
            $jumlah_inputan_nilai_rating_u2_l4 = RateLapangan::whereHas('lapangan', function($q) use($id_pengelola){
                return $q->where('pengelola_id', $id_pengelola)->whereIn('lapangan_id', [4]);;
            })->whereHas('user', function($q){
                return $q->where('user_id', 3);
            })->whereNotNull('rate')->first('rate');


            $inputan_rating_u2_lapangan4 =  $jumlah_inputan_nilai_rating_u2_l4 ;

            $hasil_rating_lapangan4_u2 = $inputan_rating_u2_lapangan4;

        }



        // untuk mencari rata rata c1
        $total_c1 =  $hasil_rating_lapangan1_u1 + $hasil_rating_lapangan2_u1 + $hasil_rating_lapangan3_u1 + $hasil_rating_lapangan4_ui;
        $pembagi = $hasil_rating_lapangan1_u1/$hasil_rating_lapangan1_u1 + $hasil_rating_lapangan2_u1/$hasil_rating_lapangan2_u1 + $hasil_rating_lapangan3_u1/ $hasil_rating_lapangan3_u1;

        $rata_rata_c1 = $total_c1/$pembagi;


        // untuk mencari rata rata c2
        $total_c2 =  $hasil_rating_lapangan1_u2 + $hasil_rating_lapangan2_u2 + $hasil_rating_lapangan3_u2 + $hasil_rating_lapangan4_u2;

        $pembagic2 = $hasil_rating_lapangan1_u2/$hasil_rating_lapangan1_u2 + $hasil_rating_lapangan3_u2/$hasil_rating_lapangan3_u2;

        $rata_rata_c2 = $total_c2/ $pembagic2;


        // tahap bagian untuk mencari similarity
        $bagian_penyebut1 = ($hasil_rating_lapangan1_u1 - $rata_rata_c1) + ($hasil_rating_lapangan2_u1 - $rata_rata_c1);
        $bagian_penyebut2 =  ($hasil_rating_lapangan1_u2 - $rata_rata_c2);
        $bagian_penyebut3 = ($hasil_rating_lapangan2_u2 - $rata_rata_c2);

        $bagian_pembagi1 = ($hasil_rating_lapangan1_u1 - $rata_rata_c1)  + pow($hasil_rating_lapangan1_u2 - $rata_rata_c2, 2);
        $bagian_pembagi2 =  ($hasil_rating_lapangan1_u1 - $rata_rata_c2) + pow($hasil_rating_lapangan1_u2 - $rata_rata_c1 , 2);



        // 0.75 dibagi 1,375
        $penyjumlahan_penyebut =  $bagian_penyebut1 + $bagian_penyebut2 * $bagian_penyebut3;
        $penjumlahan_pembagian = $bagian_pembagi1 * $bagian_pembagi2;


        // hasil perhitungan similarity
        $hasil_similarity = number_format($penyjumlahan_penyebut/ $penjumlahan_pembagian, 2);

        // dd($hasil_similarity);


        // hasil perdiksi

      if($hasil_rating_lapangan2_u2 == null){
          $hasil_perdisiki = $hasil_rating_lapangan1_u2 * $hasil_similarity / $hasil_similarity;
      }












        return view('pages.pengelola.lapangan.metode', [
            'id_user' => $id_user,
            'id_user2' => $id_user2,

            // inputan customer 1 lapangan 1
            'hasil_rating_lapangan_1_u1' =>  $hasil_rating_lapangan1_u1,
            // inputan customer1 lapangan 2
            'hasil_rating_lapangan1_u2' => $hasil_rating_lapangan1_u2,

            // inputan customer2 lapangan1
            'hasil_rating_lapangan2_u1' => $hasil_rating_lapangan2_u1,

            // inputan customer2 lapangan2
            'hasil_rating_lapangan2_u2' => $hasil_rating_lapangan2_u2,

            // inputan customer1 lapangan3
            'hasil_rating_lapangan3_u1' => $hasil_rating_lapangan3_u1,

            // inputan customer2 lapangan3
            'hasil_rating_lapangan3_u2' => $hasil_rating_lapangan3_u2,

            // inputan customer1 lapangan4
            'hasil_rating_lapangan4_ui' => $hasil_rating_lapangan4_ui,

            // // inputan customer 2 lapangan 4
            'hasil_rating_lapangan4_u2' => $hasil_rating_lapangan4_u2,

            'rata_rata_c1' => $rata_rata_c1,
            'rata_rata_c2' => $rata_rata_c2,
            'hasil_similarity' => $hasil_similarity,
            'hasil_perdisiki' => $hasil_perdisiki

        ]);

    }
}
