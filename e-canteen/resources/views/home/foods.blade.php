@extends('layouts.app')

@section('content')
<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="" method="GET">
                            <input type="text" placeholder="What do yo u need?" name="q" value="{{ request('q') }}">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home.index') }}">Beranda</a>
                        <span>Makanan & Minuman</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Kategori</h4>
                        <ul>
                            @foreach ($categories as $category)
                            <li><a
                                    href="{{ route('home.foods', ['q' => request('q'), 'category' => $category->category]) }}">{{
                                    $category->category }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{ $foods->total() }}</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <a href="{{ route('home.foods') }}" class="m-0 p-0 px-1 btn btn-outline-danger">Clear
                                Filter</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($foods as $food)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/'.$food->image) }}">
                                <ul class="product__item__pic__hover">
                                    <form action="{{ route('cart.add', $food) }}" method="post" class="quantity"
                                        id="addToCart{{ $loop->index }}">
                                        @csrf
                                    </form>
                                    <li><a href="#"
                                            onclick="document.getElementById('addToCart{{ $loop->index }}').submit()"><i
                                                class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{ route('home.food-detail', $food) }}">{{ $food->name }}</a></h6>
                                <h5>Rp. {{ number_format($food->price, 2,',','.') }}</h5>
                                <p class="mt-2 fw-bold">{{ $food->category }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div>
                    {{ $foods->links() }}
                </div>
                {{-- <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div> --}}
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

@endsection