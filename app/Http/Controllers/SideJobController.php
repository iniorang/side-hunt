<?php

namespace App\Http\Controllers;

use App\Models\SideJob;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SideJobController extends Controller
{
    //Tampilkan semua pekerjaan
    public function index(): View
    {
        $sidejob = SideJob::where('pembuat',auth()->id())->paginate(10);

        return view('pekerjaan.list', compact('sidejob'));
    }

    //Tampilan form tambah kerja sampingan
    public function create(): View
    {
        return view('pekerjaan.add');
    }

    //Cara memasukan inputan kerja sampingan ke database
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|min:5',
            'deskripsi' => 'required|min:10'
        ]);
        $today = Carbon::now();

        SideJob::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal_buat' => $today->toDateString(),
            'pembuat' => auth()->id()
        ]);
        return redirect()->route('sidejob.index')->with(['success' => 'Data berhasil tersimpan']);
    }

    //Tampilan lihat data pekerjaan sesuai id
    public function show(string $id): View
    {
        //Cari data sesuai id
        $sidejob = SideJob::findorfail($id);

        //Kirimkan ke view ini
        return view('pekerjaan.detail', compact('sidejob'));
    }

    //Tampilan untuk form edit 
    public function edit(string $id): View
    {
        $sidejob = SideJob::findorfail($id);

        return view('pekerjaan.edit', compact('sidejob'));
    }

    //Cara code untuk ubah data
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|min:5',
            'deskripsi' => 'required|min:10'
        ]);
        $sidejob = SideJob::findorfail($id);
        $sidejob->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('sidejob.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id): RedirectResponse
    {
        $sidejob = SideJob::findorfail($id);

        $sidejob->delete();

        return redirect()->route('sidejob.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
