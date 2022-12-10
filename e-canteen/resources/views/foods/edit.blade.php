@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-7">

        <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm justify-content-between">
            <div class="lh-1">
                <h1 class="h6 mb-0 text-white lh-1">Tambah Data Makanan / Minuman</h1>
            </div>
            <div>
                <a href="{{ route('foods.index') }}" class="btn btn-outline-danger px-3">Kembali</a>
            </div>
        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <form action="{{ route('foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $food->name) }}">
                    @error('name')
                    <small class="text-danger mt-2 d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock"
                        value="{{ old('stock', $food->stock) }}">
                    @error('stock')
                    <small class="text-danger mt-2 d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price"
                        value="{{ old('price', $food->price) }}">
                    @error('price')
                    <small class="text-danger mt-2 d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="category" name="category"
                        value="{{ old('category', $food->category) }}">
                    @error('category')
                    <small class="text-danger mt-2 d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    @if ($food->image)
                    <img src="{{ asset('storage/' . $food->image) }}" alt="" class="img-thumbnail mb-2 d-block">
                    @endif
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="image" name="image"
                        value="{{ old('image', $food->image) }}">
                    @error('image')
                    <small class="text-danger mt-2 d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Keterangan</label>
                    <textarea name="description" class="form-control" id="description" cols="30"
                        rows="10">{{ old('description', $food->description) }}</textarea>
                    @error('description')
                    <small class="text-danger mt-2 d-block">{{ $message }}</small>
                    @enderror
                </div>


                <button type="submit" class="mt-4 btn px-3 btn-primary py-2 d-block">Edit</button>
            </form>

        </div>
    </div>
</div>
@endsection