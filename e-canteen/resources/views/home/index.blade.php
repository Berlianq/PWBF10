@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-10 mx-auto">
        <h1 class="text-center mb-2">Selamat Datang di <strong>E-Canteen</strong></h1>
        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique architecto repellat
            necessitatibus sunt,
            temporibus sint illo alias obcaecati eligendi, ullam aspernatur quaerat aliquid hic dicta adipisci? Porro,
            sint repudiandae. Quam molestias quisquam atque. Fuga recusandae ut hic alias quasi omnis nam distinctio.
            Repellat nisi reprehenderit tenetur quisquam ullam nam optio.</p>
        <div class="d-flex align-items-center justify-content-center mt-4">
            <a href="{{ route('home.foods') }}" class="btn btn-outline-primary btn-lg">Lihat Makanan Kami</a>
        </div>
    </div>
</div>
@endsection