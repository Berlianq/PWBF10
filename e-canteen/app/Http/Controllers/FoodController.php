<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index()
    {
        return view('foods.index', [
            "title" => "Data Makanan / Minuman",
            "foods" => Food::filters(request(['q']))->paginate(5)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('foods.create', [
            "title" => "Tambah Data Makanan / Minuman Baru",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => "required",
            'description' => "required|max:3000",
            'stock' => 'required|min:0|numeric',
            'price' => "required|min:0|numeric",
            'category' => "required|string|max:30",
            "image" => "required|image|file|max:5120",
        ]);

        Food::create(array_merge($validatedData, [
            "image" => $request->file('image')->store("food-images"),
        ]));

        return redirect()
            ->route('foods.index')
            ->with('success', 'Data Makanan / Minuman baru berhasil ditambahkan.');
    }

    public function show(Food $food)
    {
        return view('foods.show', [
            "title" => "Detail Data Makanan / Minuman",
            "food" => $food
        ]);
    }

    public function edit(Food $food)
    {
        return view('foods.edit', [
            "title" => "Edit Data Makanan / Minuman",
            "food" => $food,
        ]);
    }

    public function update(Request $request, Food $food)
    {
        $validatedData = $request->validate([
            'name' => "required",
            'description' => "required|max:3000",
            'stock' => 'required|min:0|numeric',
            'price' => "required|min:0|numeric",
            'category' => "required|string|max:30",
            "image" => "sometimes|required|image|file|max:5120|nullable",
        ]);

        $food->update(array_merge($validatedData, [
            "image" => $this->uploadOrReturnDefault("image", $food->image, 'food-images'),
        ]));

        return redirect()->route('foods.index')->with('success', 'Data Makanan / Minuman berhasil diubah.');
    }

    public function destroy(Food $food)
    {
        Storage::delete($food->image);
        $food->delete();
        return redirect()->route('foods.index')->with('success', 'Data Makanan / Minuman berhasil dihapus.');
    }
}
