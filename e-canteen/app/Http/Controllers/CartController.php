<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Food $food)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$food->id])) {
            $cart[$food->id]['quantity']++;
        } else {
            $cart[$food->id] = [
                "name" => $food->name,
                "quantity" => request('quantity') ?? 1,
                "price" => $food->price,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil masuk keranjang!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Keranjang berhasil diperbarui');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request, Food $food)
    {
        if ($food->id) {
            $cart = session()->get('cart');
            if (isset($cart[$food->id])) {
                unset($cart[$food->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Produk dikeranjang berhasil dihapus');
        }

        return redirect()->back();
    }
}
