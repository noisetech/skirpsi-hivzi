<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $table = 'customer';

    protected $fillable = [
        'user_id', 'nama_lengkap', 'no_telpon'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
