<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Pelamar;

class UsersController extends Controller
{
    public function pelamaran(){
        $user = auth()->user();
        $lamaran = Pelamar::with('sidejob')->where("user_id", $user->id)->get();
    
        return view('users.lamaran', compact('lamaran'));
    }
    
    public function show($id){
        $user = User::findorfail($id);
        return view('users.profile', compact('user'));
    }

    public
}
