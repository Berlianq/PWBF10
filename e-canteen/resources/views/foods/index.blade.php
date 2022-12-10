@extends('layouts.dashboard')

@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Makanan & Minuman</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('foods.create') }}" class="btn btn-sm btn-outline-primary">Tambah</a>
        </div>
    </div>
</div>

<div class="my-3">
    <form action="" method="get">
        <label for="q" class="form-label">Cari</label>
        <input type="text" class="form-control" id="q" name="q" value="{{ request('q') }}">
    </form>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Stock</th>
                <th scope="col">Harga</th>
                <th scope="col">Kategori</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($foods as $food)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ asset('storage/' . $food->image) }}" alt="" width="100" class="img-thumbnail">
                </td>
                <td>{{ $food->name }}</td>
                <td>{{ $food->stock }}</td>
                <td>Rp. {{ number_format($food->price, 2,',','.') }}</td>
                <td>{{ $food->category }}</td>
                <td>
                    <div class="d-block">
                        <a href="{{ route('foods.edit', $food->id) }}" class="badge text-bg-info">Edit</a>
                        <a href="{{ route('foods.show', $food->id) }}" class="badge text-bg-dark">Detail</a>
                        <form action="{{ route('foods.destroy', $food->id) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="badge text-bg-danger border-0">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="py-3">
        {{ $foods->links() }}
    </div>
</div>
@endsection