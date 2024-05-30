<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::where('pembuat_id', auth()->id())
        ->orWhere('pekerja_id', auth()->id())
        ->paginate(10);

        return view('users.transaksi', compact('transaksi'));
    }
}
