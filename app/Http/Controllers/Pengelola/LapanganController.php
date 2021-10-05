<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Lapangan;
use App\RateLapangan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_login = Auth::user();
        $pengelola_id = $user_login->pengelola->id;

        $items = Lapangan::with(['pengelola'])->where('pengelola_id', $pengelola_id)->get();

        return view('pages.pengelola.lapangan.index', [
            'items' => $items
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pengelola.lapangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $pengelola_id = $user->pengelola->id;

        $data = new Lapangan();
        $data->pengelola_id = $pengelola_id;
        $data->nama_lapangan = $request->nama_lapangan;
        $data->kategori = $request->kategori;

        if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('assets/gambar', 'public');

        }

        $data->no_lapangan = $request->no_lapangan;
        $data->jenis_lapangan = $request->jenis_lapangan;
        $data->waktu_lapangan = $request->waktu_lapangan;
        $data->harga_sewa_perjam = $request->harga_sewa_perjam;
        $data->alamat = $request->alamat;
        $data['status_ketersediaan'] = 'Tersedia';
        $data->save();

        return redirect()->route('lapangan-pengelola.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    //     // user pertama
    //    $l1_user_2 =  RateLapangan::where('user_id', '2')->select('rate')->whereNotNull('rate')->skip(0)->take(2)->get();
    //    $keseluruhan_nilai_rate_inputan_user_2 = RateLapangan::where('user_id', '2')->select('rate')->whereNotNull('rate')->sum('rate');
    //    $jumlah_inputan_rating = RateLapangan::where('user_id', '2')->count('rate');

    //    $rata_rata = $keseluruhan_nilai_rate_inputan_user_2/$jumlah_inputan_rating;

    //    dd($l1_user_2);

    // $lapangan = Lapangan::with(['rate_lapangan'])->find($id);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Lapangan::with(['pengelola'])->find($id);

        return view('pages.pengelola.lapangan.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user  = Auth::user();
        $id_pengelola = $user->pengelola->id;

        // dd($id_pengelola);

        $data = Lapangan::find($id);

        $data->pengelola_id  = $id_pengelola;
        $data->nama_lapangan = $request->nama_lapangan;
        $data->kategori = $request->kategori;

        if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('assets/gambar', 'public');

        }

        $data->no_lapangan = $request->no_lapangan;
        $data->jenis_lapangan = $request->jenis_lapangan;
        $data->waktu_lapangan = $request->waktu_lapangan;
        $data->harga_sewa_perjam = $request->harga_sewa_perjam;
        $data->alamat = $request->alamat;
        $data->status_ketersediaan = $request->status_ketersediaan;


        $data->update();

        return redirect()->route('lapangan-pengelola.index')->with('status', 'Data berhasi diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Lapangan::find($id);

        $item->delete();

        return redirect()->route('lapangan-pengelola.index')->with('status', 'Data berhasil dihapus');

    }
}
