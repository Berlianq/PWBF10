@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-7">

        <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm justify-content-between">
            <div class="lh-1">
                <h1 class="h6 mb-0 text-white lh-1">Detail Makanan / Minuman</h1>
            </div>
            <div>
                <a href="{{ route('foods.index') }}" class="btn btn-outline-danger px-3">Kembali</a>
            </div>
        </div>


        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $food->image) }}" alt="" class="img-thumbnail d-block w-100">
                </div>
                <div class="col-md-6">
                    <table class="table table-striped table-bordered table-sm">
                        <tr>
                            <td class="fw-bold">Nama</td>
                            <td>{{ $food->name }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Stock</td>
                            <td>{{ $food->stock }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Harga</td>
                            <td>Rp. {{ number_format($food->price, 2,',','.') }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Kategori</td>
                            <td>{{ $food->category }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold"></td>
                            <td>
                                <div class="d-block">
                                    <a href="{{ route('foods.edit', $food->id) }}" class="badge text-bg-info">Edit</a>
                                    <form action="{{ route('foods.destroy', $food->id) }}" method="post"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="badge text-bg-danger border-0">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div>
            {!! nl2br($food->description) !!}
        </div>
    </div>
</div>
@endsection