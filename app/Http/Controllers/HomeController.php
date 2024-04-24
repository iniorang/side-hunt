<?php

namespace App\Http\Controllers;

use App\Models\SideJob;
use Illuminate\Http\Request;

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

        // return view('pekerjaan.list', compact('sidejob'));

        return view('home',compact('sidejob'));
    }

    public function show($id) : View {
        
    }
}
