<?php

namespace App\Http\Controllers\Pengelola;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_login = Auth::user();
        $id_pengelola = $user_login->pengelola->id;

        $items = Booking::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola);
        })->with(['customer'])
        ->get();

        return view('pages.pengelola.transaksi-booking.index', [
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_login = Auth::user();
        $id_pengelola = $user_login->pengelola->id;

        $item = Booking::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola);
        })
        ->with(['customer'])
        ->find($id);


        return view('pages.pengelola.transaksi-booking.edit', [
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
        $user_login = Auth::user();
        $id_pengelola = $user_login->pengelola->id;

        $item = Booking::whereHas('lapangan', function($q) use($id_pengelola){
            return $q->where('pengelola_id', $id_pengelola);
        })
        ->with(['customer'])
        ->find($id);


        $item->status = $request->status;


        $item->update();

        return redirect()->route('bookingan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
