<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $table = 'booking';

    protected $fillable = [
        'customer_id', 'lapangan_id', 'tanggal_transaksi', 'lama_waktu_main', 'keterangan_waktu_main', 'total_pembayaran', 'bukti_pembayaran', 'status'
    ];


    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function lapangan(){
        return $this->belongsTo(Lapangan::class, 'lapangan_id', 'id');
    }
}
