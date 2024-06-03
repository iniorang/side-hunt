<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\SideJob;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sidejob = SideJob::latest()->paginate(10);
        $peta = SideJob::all();

        // return view('pekerjaan.list', compact('sidejob'));

        return view('home',compact('sidejob','peta'));
    }

    public function show(string $id): View
    {
        //Cari data sesuai id
        $sidejob = SideJob::findorfail($id);
        $pelamar = Pelamar::where('job_id', $sidejob->id)->paginate(10);
        
        //Kirimkan ke view ini
        return view('pekerjaan.detail', compact('sidejob','pelamar'));
    }
}
