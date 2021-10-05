<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lapangan extends Model
{
    use SoftDeletes;

    protected $table = 'lapangan';

    protected $fillable = [
        'pengelola_id ', 'nama_lapangan', 'kategori', 'gambar', 'no_lapangan', 'jenis_lapangan',
        'waktu_lapangan', 'harga_sewa_perjam', 'alamat', 'status_ketersediaan', 'rating'
    ];

    public function pengelola(){
        return $this->belongsTo(Pengelola::class, 'pengelola_id', 'id');
    }

    public function rate_lapangan(){
        return $this->hasMany(RateLapangan::class, 'lapangan_id', 'id');
    }

    public function booking(){
        return $this->hasMany(Booking::class, 'lapangan_id', 'id');
    }



}
