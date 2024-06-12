<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'kode';

    protected $casts = [
        'kode' => 'string'
    ];

    protected $fillable = [
        'kode','pembuat_id','pekerja_id','jumlah','dibuat'
    ];

    public function pembuat(){
        return $this->belongsTo(User::class);
    }

    public function pekerja(){
        return $this->belongsTo(User::class);
    }
}
