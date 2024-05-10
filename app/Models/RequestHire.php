<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestHire extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    public function user()
    {
        return $this->belongsToMany(User::class,'user_id','job_id');    
    }

    public function sidejob()
    {
        return $this->belongsTo(SideJob::class,'tim_id');    
    }
}
