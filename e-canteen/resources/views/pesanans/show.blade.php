@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8">

        <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm justify-content-between">
            <div class="lh-1">
                <h1 class="h6 mb-0 text-white lh-1">Detail Pesanan</h1>
            </div>
            <div>
                <a href="{{ route('pesanans.index') }}" class="btn btn-outline-danger px-3">Kembali</a>
            </div>
        </div>


        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="row">
                <div class="col">
                    <table class="table table-striped table-bordered table-sm">
                        <tr>
                            <td class="fw-bold">Nama Pemesan</td>
                            <td>{{ $pesanan->user->name }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Keterangan</td>
                            <td>{!! nl2br($pesanan->keterangan ?? '-') !!}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Dipesan Pada</td>
                            <td>{{ $pesanan->dipesan_pada . ' / ' .
                                Illuminate\Support\Carbon::parse($pesanan->dipesan_pada)->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Pesanan</td>
                            <td>
                                @foreach ($pesanan->pesananDetails as $detail)
                                <div class="card mb-1">
                                    <div class="card-body p-1">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="{{ asset('storage/'.$detail->food->image) }}" alt=""
                                                    class="img-thumbnail w-100">
                                            </div>
                                            <div class="col-sm-9 p-2">
                                                <a href="{{ route('foods.show', $detail->food->id) }}"
                                                    class="d-block mb-1 fw-bold">{{
                                                    $detail->food->name }}</a>
                                                <span class="d-block">Jumlah/Quantitas: {{ $detail->jumlah }}</span>
                                                <span class="d-block">Harga Beli: {{
                                                    number_format($detail->harga_beli,
                                                    2,',','.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Status</td>
                            <td> @if ($pesanan->status == 0)
                                <span class="badge text-bg-warning">Sedang diproses</span>
                                @elseif($pesanan->status == 1)
                                <span class="badge text-bg-primary">Siap diambil</span>
                                @elseif($pesanan->status == 2)
                                <span class="badge text-bg-success">Sudah dibayar</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold"></td>
                            <td>
                                <div class="d-block">
                                    {{-- <a href="{{ route('pesanans.edit', $pesanan->id) }}"
                                        class="badge text-bg-info">Edit</a> --}}
                                    <form action="{{ route('pesanans.destroy', $pesanan->id) }}" method="post"
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
    </div>
</div>
@endsection