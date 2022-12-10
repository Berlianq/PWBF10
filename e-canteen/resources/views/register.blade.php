@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body p-4">
                <h2 class="mb-4">Daftarkan akun anda disini</h2>

                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                        @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email">
                        @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputPassword2">Ulangi Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword2"
                            name="password_confirmation">
                    </div>
                    <button type="submit" class="w-100 site-btn mb-3">Daftar</button>
                    <p>Sudah mempunyai akun?, <a href="{{ route('auth.login') }}" class="text-primary">silahkan
                            login disini</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection