<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Pelamar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //Untuk non-admin
    public function pelamaran()
    {
        $user = auth()->user();
        $lamaran = Pelamar::with('sidejob')->where("user_id", $user->id)->get();

        return view('users.lamaran', compact('lamaran'));
    }

    public function show($id)
    {
        $user = User::findorfail($id);
        return view('users.profile', compact('user'));
    }
    
    
    //Untuk admin
    public function showAdmin($id)
    {
        $user = User::findorfail($id);
        return view('admin.users.profile', compact('user'));
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'alamat' => ['required', 'string', 'max:255'],
            'telpon' => ['required', 'string', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'alamat' => $request['alamat'],
            'telpon' => $request['telpon'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->back()->with(['success' => 'User berhasil tersimpan']);
    }

    public function edit(string $id): View
    {
        $user = User::findorfail($id);

        return view('admin.users.edit', compact('user'));
    }

    //Cara code untuk ubah data
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'alamat' => ['required', 'string', 'max:255'],
            'telpon' => ['required', 'string', 'numeric'],
            // 'password' => ['string', 'min:8'],
        ]);
        $user = User::findorfail($id);
        $user->update([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'alamat' => $request['alamat'],
            'telpon' => $request['telpon'],
            // 'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('admin.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->back()->with(['success' => 'Data berhasil dihapus']);
    }
}
