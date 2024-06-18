<?php

namespace App\Http\Controllers;

use App\Models\SideJob;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Pelamar;
use Illuminate\Support\Facades\Auth;

class SideJobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    //Tampilkan semua pekerjaan
    public function index(): JsonResponse
    {
        // $sidejob = SideJob::where('pembuat', auth()->id())->paginate(10);

        // return view('pekerjaan.list', compact('sidejob'));
        $sidejobs = SideJob::where('pembuat', auth()->id())->paginate(10);
        return response()->json($sidejobs);
    }

    //Tampilan form tambah kerja sampingan
    public function create(): View
    {
        return view('pekerjaan.add');
    }

    //Cara memasukan inputan kerja sampingan ke database
    public function store(Request $request): JsonResponse
    {
        // dd($request->all());

        $request->validate([
            'nama' => 'required|min:5',
            'deskripsi' => 'required|min:10',
            'alamat' => 'required',
            'koordinat' => 'required',
            'min_gaji' => 'required|numeric',
            'max_gaji' => 'required|numeric',
            'max_pekerja' => 'required|numeric',
        ]);
        $today = Carbon::now();

        $sideJob = SideJob::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal_buat' => $today->toDateString(),
            'alamat' => $request->alamat,
            'koordinat' => $request->koordinat,
            'min_gaji' => $request->min_gaji,
            'max_gaji' => $request->max_gaji,
            'max_pekerja' => $request->max_pekerja,
            'jumlah_pelamar_diterima' => '0',
            'pembuat' => auth()->id()
        ]);
        return response()->json(['success' => 'Data berhasil tersimpan', 'sideJob' => $sideJob], 201);
        // return redirect()->route('sidejob.index')->with(['success' => 'Data berhasil tersimpan']);
    }

    //Tampilan lihat data pekerjaan sesuai id
    public function show(string $id): JsonResponse
    {
        //Cari data sesuai id
        $sidejob = SideJob::findorfail($id);
        $pelamar = Pelamar::where('job_id', $sidejob->id)->paginate(10);
        
        //Kirimkan ke view ini
        // return view('pekerjaan.detail', compact('sidejob','pelamar'));
        return response()->json(['sidejob' => $sidejob, 'pelamar' => $pelamar]);
    }

    //Tampilan untuk form edit 
    public function edit(string $id): View
    {
        $sidejob = SideJob::findorfail($id);
        $pelamar = Pelamar::where('job_id', $sidejob->id)->paginate(10);

        return view('pekerjaan.edit', compact('sidejob'));
    }

    //Cara code untuk ubah data
    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'nama' => 'required|min:5',
            'deskripsi' => 'required|min:10',
            'alamat' => 'required',
            'koordinat' => 'required',
            'min_gaji' => 'required|numeric',
            'max_gaji' => 'required|numeric',
            'max_pekerja' => 'required|numeric',
        ]);
        $sidejob = SideJob::findorfail($id);
        $sidejob->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'koordinat' => $request->koordinat,
            'min_gaji' => $request->min_gaji,
            'max_gaji' => $request->max_gaji,
            'max_pekerja' => $request->max_pekerja,
            'jumlah_pelamar_diterima' => '0',
            'pembuat' => auth()->id()
        ]);
        return response()->json(['success' => 'Data berhasil diubah', 'sideJob' => $sidejob]);
        // return redirect()->route('sidejob.index')->with(['success' => 'Data berhasil diubah']);
    }

    //Metode untuk menghapus data di database
    public function destroy(Request $request): JsonResponse
    {
        // $sidejob = SideJob::findorfail($id);

        // $sidejob->delete();

        // return redirect()->route('sidejob.index')->with(['success' => 'Data berhasil dihapus']);

        $cari = $request->input('cari');
        $hasil = SideJob::where('nama', 'like', "%" . $cari . "%")->paginate(30);

        return response()->json($hasil);
    }

    //Metode untuk mencari data
    public function cari(Request $request)
    {
        // $cari = $request->input('cari');
        // $hasil = SideJob::where('nama', 'like', "%" . $cari . "%")->paginate(30);

        // return view('pekerjaan.hasil', compact('hasil'));

        $cari = $request->input('cari');
        $hasil = SideJob::where('nama', 'like', "%" . $cari . "%")->paginate(30);

        return response()->json($hasil);
    }

    public function buatPermintaan(Request $request,SideJob $sidejob): RedirectResponse
    {
        Pelamar::create([
            'user_id' => auth()->id(),
            'job_id' => $sidejob->id,
            'status' => 'tunda'
        ]);

        return redirect()->back();
    }

    public function terima(Pelamar $pelamar)
    {
        $pelamar->update(['status'=>'diterima']);
        return redirect()->back();
    }

    public function tolak(Pelamar $pelamar)
    {
        $pelamar->update(['status'=>'ditolak']);
        return redirect()->back();
    }


}
