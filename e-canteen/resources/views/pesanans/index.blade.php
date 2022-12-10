@extends('layouts.dashboard')

@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pesanan</h1>
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
                <th scope="col">Dipesan oleh</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Dipesan pada</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanans as $pesanan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pesanan->user->name }}</td>
                <td>{{ substr($pesanan->keterangan, 0, 40) }}</td>
                <td>{{ $pesanan->dipesan_pada }}</td>
                <td>
                    @if ($pesanan->status == 0)
                    <span class="badge text-bg-warning">Sedang diproses</span>
                    @elseif($pesanan->status == 1)
                    <span class="badge text-bg-primary">Siap diambil</span>
                    @elseif($pesanan->status == 2)
                    <span class="badge text-bg-success">Sudah dibayar</span>
                    @endif
                </td>
                <td>
                    <div class="d-block">
                        <a href="{{ route('pesanans.show', $pesanan->id) }}" class="badge text-bg-dark">Detail</a>
                        @if($pesanan->status != 2)
                        <form action="{{ route('pesanans.update-status', $pesanan->id) }}" method="post"
                            class="d-inline-block">
                            @csrf
                            @method('put')
                            <button class="badge text-bg-info border-0">
                                @if ($pesanan->status == 0)
                                Siap diambil
                                @elseif($pesanan->status == 1)
                                Siap dibayar
                                @endif
                            </button>
                        </form>
                        @endif
                        <form action="{{ route('pesanans.destroy', $pesanan->id) }}" method="post"
                            class="d-inline-block">
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
        {{ $pesanans->links() }}
    </div>
</div>
@endsection