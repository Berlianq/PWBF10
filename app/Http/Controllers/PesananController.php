<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
{
    public function index()
    {
        return view('pesanans.index', [
            "title" => "Data Pesanan Pelanggan",
            "pesanans" => Pesanan::filters(request(['q']))->paginate(5)->withQueryString()
        ]);
    }

    public function updateStatus(Pesanan $pesanan)
    {
        if ($pesanan->status == 0) {
            $pesanan->status = 1;
        } else if ($pesanan->status == 1) {
            $pesanan->status = 2;
        }

        $pesanan->save();
        return redirect()->back()->with('success', 'Status pesanan berhasil diubah.');
    }

    public function show(Pesanan $pesanan)
    {
        $pesanan->load(['user', 'pesananDetails', 'pesananDetails.food']);
        return view('pesanans.show', [
            "title" => "Detail Pesanan",
            "pesanan" => $pesanan
        ]);
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();
        return redirect()->route('pesanans.index')->with('success', 'Data pesanan berhasil dihapus.');
    }
}
