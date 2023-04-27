<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('menu')
<ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
<li>
    <a href="/" class="nav-link text-white">
    <svg class="bi d-block mx-auto mb-1" width="24" height="0"><use xlink:href="#"/></svg>
    Home
    </a>
</li>
<li>
    <a href="register" class="nav-link text-secondary">
    <svg class="bi d-block mx-auto mb-1" width="24" height="0"><use xlink:href="#register"/></svg>
    Register
    </a>
</li>
</ul>
@endsection
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
<div class="row align-items-md-stretch">
    <div class="col-md-8">
    <div class="h-100 p-5 text-bg-dark rounded-3">
        <h2>Space Iklan</h2>
    </div>
    </div>
    <div class="col-md-4">
    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
    <form class="w-px-500 p-3 p-md-3" action="{{ route('user.signin') }}" method="post" enctype="multipart/form-data">
    @csrf
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <div class="form-floating">
            <input type="text" class="form-control @error('hp') is-invalid @enderror" id="floatingInput" name="hp" placeholder="08xxx xxxx xxxx">
            <label for="floatingInput">No HP</label>
            @error('hp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        </div>
        <button class="w-100 btn btn-lg btn-dark" type="submit">Sign in</button>
    </form>
    </div>
    </div>
</div>
@endsection