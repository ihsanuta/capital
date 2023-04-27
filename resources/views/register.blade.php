<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('menu')
<ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
<li>
    <a href="/" class="nav-link text-secondary">
    <svg class="bi d-block mx-auto mb-1" width="24" height="0"><use xlink:href="#"/></svg>
    Home
    </a>
</li>
<li>
    <a href="register" class="nav-link text-white">
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
    <div class="col-md-12">
    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
    <form class="w-px-500 p-3 p-md-3" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="jeniskelamin" id="pria" value="pria" checked>
            <label class="form-check-label" for="pria">
                Pria
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="jeniskelamin" value="wanita" id="wanita">
            <label class="form-check-label" for="wanita">
                Wanita
            </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="ktp" class="form-label">No KTP</label>
            <input type="text" class="form-control @error('ktp') is-invalid @enderror" name="ktp" id="ktp" placeholder="xxxx xxxx xxxx xxxx">
            @error('ktp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="hp" class="form-label">No HP</label>
            <input type="text" class="form-control @error('hp') is-invalid @enderror" id="hp" name="hp" placeholder="xxxx xxxx xxxxx">
            @error('hp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ktp" class="form-label">Email</label>
            <input type="email" class="form-control @error('ktp') is-invalid @enderror" id="ktp" name="email" placeholder="xxxx xxxx xxxx xxxx">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  placeholder="xxxx xxxx xxxx xxxx">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="konfirmasi_password" name="password_confirmation"  placeholder="xxxx xxxx xxxx xxxx">
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota"  placeholder="Nama Kota">
            @error('kota')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="referral" class="form-label">Kode Referral</label>
            <input type="text" class="form-control" id="referral" name="kode_referral" placeholder="Kode Refferal">
        </div>
        <button class="w-100 btn btn-lg btn-dark" type="submit">Register</button>
</form>
    </div>
    </div>
</div>

@endsection