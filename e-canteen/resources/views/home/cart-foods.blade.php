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
                        <span>Keranjang Belanja Anda</span>
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
                                <th class="shoping__product">Produk</th>
                                <th>Harga</th>
                                <th>Banyak</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $food)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{ asset('storage/'.$food->image) }}" alt="" class="img-thumbnail"
                                        width="200">
                                    <h5>{{ $food->name }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    <p>Rp. {{ number_format($food->price, 2,',','.') }}</p>
                                </td>
                                <td class="shoping__cart__quantity">
                                    <form action="{{ route('cart.add', $food) }}" method="post" class="quantity">
                                        @csrf
                                        <div class="pro-qty">
                                            <input type="text" value="{{ session('cart')[$food->id]['quantity'] }}">
                                        </div>
                                        <button type="submit" class="primary-btn btn btn-sm">Update Banyak</button>
                                    </form>
                                </td>
                                <td class="shoping__cart__total">
                                    <p>
                                        Rp. {{ number_format($food->price * session('cart')[$food->id]['quantity'],
                                        2,',','.')
                                        }}
                                    </p>
                                </td>
                                <td class="shoping__cart__item__close">
                                    <form action="{{ route('cart.remove', $food) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-light">
                                            <span class="icon_close"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ route('home.foods') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="col-lg-6">

            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Total Keranjang Belanja</h5>
                    <ul>
                        <li>Total <span>Rp. {{ number_format($total,
                                2,',','.')}}</span></li>
                    </ul>
                    <form action="{{ route('home.pesan') }}" method="post">
                        @csrf
                        <div class="mb-2">
                            <label for="description">Keterangan</label>
                            <textarea name="description" id="description" cols="30" rows="5"
                                class="form-control"></textarea>
                        </div>
                        <button class="btn w-100 primary-btn">Pesan Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection