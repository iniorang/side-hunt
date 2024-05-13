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
        'gaji'
    ];

    public function pembuat(){
        return $this->belongsTo(User::class);
    }
    
    public function pelamar(){
        return $this->belongsToMany(SideJob::class, 'pelamars', 'user_id', 'job_id');
    }

}
