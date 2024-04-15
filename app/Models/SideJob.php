<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
        'pembuat',
        'tanggal_buat'
    ];

    public function punya(){
        return $this->belongsTo('App\User');
    }
}
