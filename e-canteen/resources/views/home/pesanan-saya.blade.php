@extends('layouts.app')

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home.index') }}">Beranda</a>
                        <span>Pesanan Saya</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="text-left">Keterangan</th>
                                <th>Dipesan Pada</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanans as $pesanan)
                            <tr>
                                <td class="text-left">
                                    {!! nl2br($pesanan->keterangan ?? '-') !!}
                                </td>
                                <td class="shoping__cart__total">
                                    Rp. {{
                                    number_format($pesanan->total_harga,
                                    2,',','.') }}
                                </td>
                                <td class="shoping__cart__total">
                                    {{ $pesanan->dipesan_pada }}
                                </td>
                                <td>
                                    @if ($pesanan->status == 0)
                                    <span class="badge badge-warning">Sedang diproses</span>
                                    @elseif($pesanan->status == 1)
                                    <span class="badge badge-primary">Siap diambil</span>
                                    @elseif($pesanan->status == 2)
                                    <span class="badge badge-success">Sudah dibayar</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('home.pesanan-saya-detail', $pesanan) }}"
                                        class="btn primary-btn">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection