<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','job_id','status'];

    public function user()
    {
        return $this->belongsTo(User::class);   
    }
    
    public function sidejob(){
        return $this->belongsTo(SideJob::class,'job_id');
    }
}
