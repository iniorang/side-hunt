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
        'tanggal_buat'
    ];
}
