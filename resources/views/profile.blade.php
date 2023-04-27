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
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle text-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	<svg class="bi d-block mx-auto mb-1" width="24" height="0"><use xlink:href="#artikel"/></svg>
	Artikel
	</a>
	<ul class="dropdown-menu">
		@foreach ($artikels as $d)
		<li><a class="dropdown-item" href="#">Action</a></li>
		@endforeach
	</ul>
</li>
<li>
    <a href="/profile" class="nav-link text-secondary">
    <svg class="bi d-block mx-auto mb-1" width="24" height="0"><use xlink:href="#profile"/></svg>
    Profile
    </a>
</li>
<li>
    <a href="/logout" class="nav-link text-secondary">
    <svg class="bi d-block mx-auto mb-1" width="24" height="0"><use xlink:href="#logout"/></svg>
    Logout
    </a>
</li>
</ul>
@endsection
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
<div class="row align-items-md-stretch">
	@auth
    <div class="col-md-8">
    <div class="h-100 p-5 text-bg-dark rounded-3">
        <h2>Selamat Datang {{auth()->user()->name}}</h2>
		<div class="row mb-3">
			<div class="col-4">Email</div>
			<div class="col-8">{{auth()->user()->email}}</div>
		</div>
		<div class="row mb-3">
			<div class="col-4">No HP</div>
			<div class="col-8">{{auth()->user()->hp}}</div>
		</div>
		<div class="row mb-3">
			<div class="col-4">No KTP</div>
			<div class="col-8">{{auth()->user()->ktp}}</div>
		</div>
		<div class="row mb-3">
			<div class="col-4">Kota</div>
			<div class="col-8">{{auth()->user()->kota}}</div>
		</div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
    <h3>INFORMASI POINT</h3>
	<div class="row mb-3">
		<div class="col-6">Point :</div>
		<div class="col-6" id="point-user">{{auth()->user()->point}}</div>
	</div>
	<div class="row mb-3">
		<div class="col-6">Konversi Point :</div>
		<div class="col-6" id="point-konversi-user">Rp. {{auth()->user()->point * 0.002}}</div>
	</div>
	<div class="row mb-3">
		<div class="col-6">Point Expired Date :</div>
		<div class="col-6">{{auth()->user()->kota}}</div>
	</div>
	<div class="row">
	<button type="button" id="withdraw" class="btn btn-dark">Withdraw</button>
	</div>
    </div>
    </div>
	@endauth
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
	$("#withdraw").click(function(){
        $.ajax({
        type:'GET',
        url:"{{ route('user.withdraw') }}",
        success:function(data){
            $("#msg_withdraw").text(data);
			if(data == "success"){
                $("#point-user").text("0");
                $("#point-konversi-user").text('Rp. 0');
            }
        }
        });
    });
</script>

@endsection