<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'title' => "Beranda"
        ]);
    }

    public function foods()
    {
        return view('home.foods', [
            'title' => "Daftar Makanan & Minuman",
            "foods" => Food::filters(request(['q', 'category']))->paginate(5)->withQueryString(),
            'categories' => DB::table('foods')->select('category')->distinct()->get()
        ]);
    }

    public function food(Food $food)
    {
        return view('home.food-detail', [
            'title' => "Detail Makanan & Minuman",
            "food" => $food
        ]);
    }

    public function pesananSaya()
    {
        $pesananSaya = Pesanan::with('pesananDetails')->where('user_id', auth()->id())->get();
        $pesananSaya->map(function ($pesanan) {
            $total = 0;
            foreach ($pesanan->pesananDetails as $detail) {
                $total += $detail->harga_beli * $detail->jumlah;
            }
            $pesanan->total_harga = $total;
        });

        return view('home.pesanan-saya', [
            'title' => "Pesanan Makanan & Minuman Saya",
            "pesanans" => $pesananSaya,
        ]);
    }

    public function pesananDetailSaya(Pesanan $pesanan)
    {
        $pesanan->load(['user', 'pesananDetails', 'pesananDetails.food']);
        return view('home.pesanan-saya-detail', [
            'title' => "Detail Pesanan Makanan & Minuman Saya",
            "pesanan" => $pesanan,
        ]);
    }

    public function cartFoods()
    {
        $cart = session('cart', []);

        $ids = array_keys($cart);

        $foods = Food::query()->whereIn('id', $ids)->get();
        $total = 0;
        foreach ($foods as $food) {
            $total += $food->price * $cart[$food->id]['quantity'];
        }

        return view('home.cart-foods', [
            'title' => "Keranjang Makanan & Minuman Kamu",
            "foods" => $foods,
            'total' => $total
        ]);
    }

    public function pesan()
    {
        $cart = session('cart', []);

        if (!is_array($cart) || count($cart) <= 0) {
            return redirect()->back()->with('failed', 'Anda belum memiliki keranjang makanan');
        }

        $ids = array_keys($cart);

        $foods = Food::query()->whereIn('id', $ids)->get();

        $pesanan = Pesanan::create([
            'user_id' => auth()->id(),
            'keterangan' => request('description'),
            'dipesan_pada' => now(),
            'status' => 0
        ]);

        foreach ($foods as $food) {
            PesananDetail::create([
                "pesanan_id" => $pesanan->id,
                "food_id" => $food->id,
                "jumlah" => $cart[$food->id]['quantity'],
                "harga_beli" => $food->price
            ]);
        }

        session()->forget('cart');
        session()->put('cart', []);
        return redirect()->route('home.foods')->with('success', 'Pesanan anda berhasil diproses, Silahkan ambil pesanan di kantin kami!');
    }
}
