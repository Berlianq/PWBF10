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
                        <span>Detail Pesanan Saya</span>
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
                                <th class="text-left">Makanan</th>
                                <th>Jumlah/Quantitas</th>
                                <th>Harga Beli</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan->pesananDetails as $detail)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{ asset('storage/'.$detail->food->image) }}" alt="" class="img-thumbnail"
                                        width="100">
                                    <h5>{{ $detail->food->name }}</h5>
                                </td>
                                <td class="shoping__cart__total">
                                    {{ $detail->jumlah }}
                                </td>
                                <td>
                                    {{
                                    number_format($detail->harga_beli,
                                    2,',','.') }}
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