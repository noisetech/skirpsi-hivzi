<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengelola extends Model
{
    protected $table = 'pengelola';

    protected $fillable = [
        'user_id', 'nama_lengkap', 'no_telpon', 'rekening', 'no_rekening'
    ];



    public function lapangan(){
        return $this->hasMany(Lapangan::class, 'pengelola_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
