<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RateLapangan extends Model
{
    use SoftDeletes;

    protected $table = 'rate_lapangan';

    protected $fillable = [
        'user_id', 'lapangan_id', 'rate'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function lapangan(){
        return $this->belongsTo(Lapangan::class, 'lapangan_id', 'id');
    }
}
