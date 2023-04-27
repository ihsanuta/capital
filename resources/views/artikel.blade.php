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
    <a href="/artikel" class="nav-link text-secondary">
    <svg class="bi d-block mx-auto mb-1" width="24" height="0"><use xlink:href="#artikel"/></svg>
    Artikel
    </a>
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
@auth
<div class="row align-items-md-stretch">
    <div class="col-md-8">
    <div class="h-100 p-5 text-bg-dark rounded-3">
        <h2>{{$data->judul}}</h2>
        <div id="timer"></div>
        {{$data->konten}}
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
    <div id="msg_withdraw" ></div>
	</div>
    </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
    function incTimer() {
        var currentMinutes = Math.floor(totalSecs / 60);
        var currentSeconds = totalSecs % 60;
        if(currentSeconds <= 9) currentSeconds = "0" + currentSeconds;
        if(currentMinutes <= 9) currentMinutes = "0" + currentMinutes;
        totalSecs++;
        const myTimeout = setTimeout('incTimer()', 1000);
        if(currentSeconds < 16) {
            $("#timer").text(currentMinutes + ":" + currentSeconds);
        }else{
            clearTimeout(myTimeout);
            $("#timer").text("");

            if({{$data->get_point}}){
                $.ajax({
                type:'GET',
                url:"{{ route('user.point',['artikel_id'=>$data->id,'id'=>auth()->user()->id]) }}",
                success:function(data){
                    console.log(data)
                    $("#point-user").text(data.point);
                    $("#point-konversi-user").text('Rp. ' + data.point * 0.002);
                }
                });
            }
        }
    }

    totalSecs = 0;
    $(document).ready(function() {
        if({{$data->get_point}}){
            incTimer();
        }
    });

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
@endauth
@endsection