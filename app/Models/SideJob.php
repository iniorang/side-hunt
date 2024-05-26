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
        'tanggal_buat',
        'alamat',
        'gaji',
        'jumlah_max_pekerja',
        'jumlah_pelamar_diterima'
    ];

    public function pembuat(){
        return $this->belongsTo(User::class,'pembuat');
    }
    
    public function pelamar(){
        return $this->belongsToMany(SideJob::class, 'pelamars', 'user_id', 'job_id');
    }

}
