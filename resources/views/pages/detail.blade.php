@extends('layouts.app')

@section('title', 'Detail')

@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v14.0"
    nonce="5Q9zR5ZF"></script>
<style>
    /* .parent {
        height: 100vh;
    } */
    @media screen and (min-width: 1000px) {
        .mobileShow {
            display: none
        }
    }

    .parent>.row {
        display: flex;
        align-items: center;
        height: 100%;
    }

    .col img {
        height: 100px;
        width: 100%;
        cursor: pointer;
        transition: transform 1s;
        object-fit: cover;
    }

    .col label {
        overflow: hidden;
        position: relative;
    }

    .imgbgchk:checked+label>.tick_container {
        opacity: 1;
    }

    /*         aNIMATION */
    .imgbgchk:checked+label>img {
        transform: scale(1.25);
        opacity: 0.3;
    }

    .tick_container {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        cursor: pointer;
        text-align: center;
    }

    .tick {
        background-color: #4CAF50;
        color: white;
        font-size: 16px;
        padding: 6px 12px;
        height: 40px;
        width: 40px;
        border-radius: 100%;
    }

    .img-custom {
        width: 100% !important;
        min-height: 400px;
        max-height: 400px;
        /* background-size: cover; */
    }

    /* .img-custom img {
        background-size: auto;
    } */

    .thumbnails {
        display: flex;
        margin: 1rem auto 0;
        padding: 0;
        justify-content: center;
    }

    .thumbnail {
        width: 70px;
        height: 70px;
        overflow: hidden;
        list-style: none;
        margin: 0 0.2rem;
        cursor: pointer;
        opacity: 0.3;
    }

    .thumbnail img {
        width: 100%;
        height: auto;
    }

    .thumbnail.is-active {
        opacity: 1;
    }

    .dana p {
        margin-bottom: 2px !important;
    }

    /* .thumb-custom {
        max-width: 300px;
        max-height: 300px;
    } */
</style>

<div class="container">
    <div class="container-xxl mx-auto p-0  position-relative header-2-2">
        <div class="row mb-4">
            <div class="col-lg-8">
                <div class="title text-center">
                    <h2 class="">{{ $program->title }}</h2>
                    <p> <i class="fa fa-pencil-square-o"></i> Dibuat oleh : {{ $program->donatur->name ?? 'Unknown' }} |
                        <i class="fa fa-clock-o "></i>
                        {{$program->created_at->isoFormat('dddd, D MMMM Y')}} | <i class="fa fa-eye"></i>
                        Dilihat : {{ $program->viewed ?? 0 }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <section id="cover-image" class="h-100 w-100 bg-white" style="box-sizing: border-box">
                <section id="main-carousel" class="splide" aria-label="My Awesome Gallery">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @if ($program->photo_program)
                            <li class="splide__slide img-custom text-center">
                                <img src="{{ $program->photo_program ? Storage::url($program->photo_program) : url('assets/images/cat1.jpeg') }}"
                                    class="rounded" alt="">
                            </li>
                            @endif
                        </ul>
                    </div>
                </section>
                <ul id="thumbnails" class="thumbnails">
                    @if ($program->photo_program)
                    <li class="thumbnail">
                        <img src="{{ $program->photo_program ? Storage::url($program->photo_program) : url('assets/images/cat1.jpg') }}"
                            alt="">
                    </li>
                    @endif
                </ul>
                {{-- <div class="img-wrapper text-center">
                    <img src="https://source.unsplash.com/random" class="img-custom" alt="">
                </div> --}}
                <div class="container mt-5">
                    <div class="row">
                        <h3 class="mb-3">Detail Program</h3>
                        {!! $program->detail !!}
                        {{-- <ul class="nav nav-tabs" id="myTab" role="tablist"> --}}
                            {{-- <li class=" nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Detail
                                    Program</button>
                            </li> --}}
                            {{-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Berita
                                    Program</button>
                            </li> --}}
                            {{-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                    type="button" role="tab" aria-controls="contact"
                                    aria-selected="false">Donatur</button>
                            </li> --}}
                            {{-- </ul> --}}
                        {{-- <div class="tab-content" id="myTabContent"> --}}
                            {{-- <div class=" tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                {!! $program->detail !!}
                            </div> --}}
                            {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                profile...
                            </div> --}}
                            {{-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                contact...
                            </div> --}}
                            {{-- </div> --}}
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-header">
                    <h4>Informasi Program</h4>
                </div>
                <div class="card-body">
                    <p style="text-align: left;">{{$program->ringkasan}}</p>
                    <div class="dana">
                        <table class="table">
                            <tr>
                                <td style="text-align: left">Dana Terkumpul</td>
                                <td style="text-align: right">
                                    {{$program->dana_terkumpul ? 'RP. ' . number_format($program->dana_terkumpul) :
                                    '-'}}
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left">Target</td>
                                <td style="text-align: right">
                                    {{$program->target ? 'RP. ' . number_format($program->target) :
                                    '-'}}
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left">Sampai Tanggal</td>
                                <td style="text-align: right">{{ $program->created_at->isoFormat('dddd, D MMMM Y'); }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="progress mt-3" style="height: 19px">
                        <div class="progress-bar main_color" role="progressbar" style="width: {{$dana_terkumpul}};"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$dana_terkumpul}} Terkumpul</div>
                    </div>
                    <div class="row">
                        <small style="text-align: right">20 Hari lagi</small>
                    </div>
                    <div class="text-center">
                        <button data-bs-toggle="modal" data-bs-target="#donasi_modal" class="btn btn-success"
                            style="margin-top: 30px; height: 40pxl width: 70%; background-color: #27c499; border: 0;"><b>Klik
                                untuk Sedekah</b></button>
                    </div>
                </div>
            </div>
            <div class="card text-center mt-5">
                <div class="card-header">
                    <h4>Bagikan Program Ini</h4>
                </div>
                <div class="card-body">
                    @php
                    $my_url = Request::url();
                    $wa_url = $my_url . '%0a%0a' . $program->ringkasan;
                    @endphp
                    <p style="text-align: left;">Bagikan program ini ke teman-teman di sosial media agar mereka bisa
                        membantu program ini terwujud.</p>
                    <div class="share-wrapper text-center">
                        <ul class="list-group list-group-horizontal" style="justify-content: center;">
                            <li class="list-group-item no_border">
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$my_url}}"><img
                                        src="{{ asset('assets/images/icon/fb.png') }}" alt=""></a>
                            </li>
                            <li class="list-group-item no_border">
                                <a target="_blank"
                                    href="https://telegram.me/share/url?url={{$my_url}}&text={{$program->ringkasan}}"><img
                                        src="{{ asset('assets/images/icon/tg.png') }}" alt=""></a>
                            </li>
                            <li class="list-group-item no_border">
                                <a href="whatsapp://send?text={{$wa_url}}"><img
                                        src="{{ asset('assets/images/icon/wa.png') }}" alt=""></a>
                            </li>
                            <li class="list-group-item no_border">
                                <a href="https://twitter.com/intent/tweet?text={{$wa_url}}" target="_blank"><img
                                        src="{{ asset('assets/images/icon/tw.png') }}" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card text-center mt-5">
                <div class="card-header">
                    <h4>Orang yang sudah donasi</h4>
                </div>
                <div class="card-body">
                    <p style="text-align: left;">Berikut adalah orang-orang yang sudah berdonasi untuk program ini.</p>
                    <div class="share-wrapper text-center">
                        <ul class="list-group list-group-horizontal" style="justify-content: center; flex-wrap: wrap;">
                            @forelse ($donated as $dn)
                            <li class="list-group-item no_border" style="padding: 0.5rem 0.3rem;">
                                <a><img data-bs-toggle="tooltip" data-bs-placement="top" title="{{$dn->nama}}"
                                        src="https://ui-avatars.com/api/?name={{$dn->nama}}&background=random" alt=""
                                        class="rounded-circle" width="40"></a>
                            </li>
                            @empty
                            <p class="text-center">Jadilah yang pertama untuk donasi.</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="donasi_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Donasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add_donation') }}" method="POST">
                        @csrf
                        <input type="hidden" name="program_id" value="{{ $program->id }}">
                        @if ($user === false)
                        <div class="card p-3">
                            <h5>Isi Identitas</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">* Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" required>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                                                name="hamba_allah">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Hamba Allah
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">* No HP/WA</label>
                                        <input type="text" class="form-control" name="no_hp" id="exampleInputPassword1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword2" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" name="alamat"
                                            id="exampleInputPassword2">
                                    </div>
                                </div>
                            </div>
                            <div class="form-text"><a href="{{ route('login') }}">Login</a> atau <a
                                    href="{{ route('register') }}">Daftar</a> untuk bisa memonitor
                                riwayat donasi dan mencoba fitur-fitur lainnya.
                            </div>
                        </div>
                        @else
                        <div class="card p-3">
                            <h5>Identitas Pendonasi</h5>
                            <table class="table">
                                <div class="row">
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ auth()->user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. HP/WA</td>
                                        <td>:</td>
                                        <td>{{ auth()->user()->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{ auth()->user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{ auth()->user()->alamat }}</td>
                                    </tr>
                            </table>
                        </div>
                        @endif

                        <div class="card p-3 mt-3">
                            <h5>Detail Donasi</h5>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="jml_donasi" class="form-label">Jumlah Donasi</label>
                                    <input type="number" name="jumlah" class="form-control" id="jml_donasi" min="10000"
                                        required oninvalid="this.setCustomValidity('Minimal donasi sebesar 10.000')"
                                        oninput="this.setCustomValidity('')">
                                </div>
                                <div>
                                    <a href="#">
                                        <p class="float-end"><span class="fa fa-info-circle"></span> <small>Cara
                                                melakukan
                                                donasi</small></p>
                                    </a>
                                </div>
                                {{-- <div class="container parent">
                                    <div class="row">
                                        <label class="form-label">Metode Pembayaran</label>
                                        <div class='col text-center'>
                                            <input type="radio" name="imgbackground" id="img1" class="d-none imgbgchk"
                                                value="">
                                            <label for="img1">
                                                <img src="https://dummyimage.com/600x400/000/fff" alt="Image 1">
                                                <div class="tick_container">
                                                    <div class="tick"><i class="fa fa-check"></i></div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class='col text-center'>
                                            <input type="radio" name="imgbackground" id="img2" class="d-none imgbgchk"
                                                value="">
                                            <label for="img2">
                                                <img src="https://dummyimage.com/600x400/000/fff" alt="Image 2">
                                                <div class="tick_container">
                                                    <div class="tick"><i class="fa fa-check"></i></div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class='col text-center'>
                                            <input type="radio" name="imgbackground" id="img3" class="d-none imgbgchk"
                                                value="">
                                            <label for="img3">
                                                <img src="https://dummyimage.com/600x400/000/fff" alt="Image 3">
                                                <div class="tick_container">
                                                    <div class="tick"><i class="fa fa-check"></i></div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class='col text-center'>
                                            <input type="radio" name="imgbackground" id="img4" class="d-none imgbgchk"
                                                value="">
                                            <label for="img4">
                                                <img src="https://dummyimage.com/600x400/000/fff" alt="Image 4">
                                                <div class="tick_container">
                                                    <div class="tick"><i class="fa fa-check"></i></div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="doa" class="form-label">Pesan / Do'a</label>
                                    <textarea name="doa" id="doa" cols="30" rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" style="width: 100%"><b>Donasi</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @stop

    @push('addon-script')
    <script>
        // User-defined function to share some message on WhatsApp 
	// function share() { 
	//     // collet the user input 
	//    var message = '{{$program->ringkasan}}'; 
    //             // JavaScript function to open URL in new window 
	//     window.open( "whatsapp://send?text=" + message, '_blank'); 
	// }
        var splide = new Splide( '#main-carousel', {
  pagination: false
} );

var thumbnails = document.getElementsByClassName( 'thumbnail' );
var current;

for ( var i = 0; i < thumbnails.length; i++ ) {
  initThumbnail( thumbnails[ i ], i );
}

function initThumbnail( thumbnail, index ) {
  thumbnail.addEventListener( 'click', function () {
    splide.go( index );
  } );
}

splide.on( 'mounted move', function () {
  var thumbnail = thumbnails[ splide.index ];

  if ( thumbnail ) {
    if ( current ) {
      current.classList.remove( 'is-active' );
    }

    thumbnail.classList.add( 'is-active' );
    current = thumbnail;
  }
} );

splide.mount();
    </script>
    @endpush