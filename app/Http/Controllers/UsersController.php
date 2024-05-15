<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelamar;

class UsersController extends Controller
{
    public function pelamaran(){
        $user = auth()->user();
        $lamaran = Pelamar::with('sidejob')->where("user_id", $user->id)->get();
    
        return view('users.lamaran', compact('lamaran'));
    }
}
