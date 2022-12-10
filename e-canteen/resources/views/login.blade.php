@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body p-4">
                <h2 class="mb-4">Silahkan Login</h2>

                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
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
                    </div>
                    <button type="submit" class="w-100 site-btn mb-3">Submit</button>
                    <p>Belum mempunyai akun?, <a href="{{ route('auth.register') }}" class="text-primary">silahkan
                            daftar disini</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection