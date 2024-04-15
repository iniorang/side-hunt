<?php

namespace App\Http\Controllers;
use App\Models\SideJob;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use Illuminate\Http\Request;

class SideJobController extends Controller
{
    public function index() : View {
        $sidejob = SideJob::latest()->paginate(10);

        return view('sidejobtest', compact('sidejob'));
    }

    public function create() : View {
        return view('tambahkerjasampingan');
    }

    public function store(Request $request): RedirectResponse{
        $request->validate([
            'nama' => 'required|min:5',
            'deskripsi' => 'required|min:10'
        ]);
        $today = Carbon::now();

        SideJob::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal_buat' => $today->toDateString(),
        ]);
        return redirect()->route('sidejob.index')->with(['success'=>'Data berhasil tersimpan']);
    }
}
