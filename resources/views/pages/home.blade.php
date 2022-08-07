@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section id="program_donasi" class="h-100 w-100 bg-white" style="box-sizing: border-box">

    <div class="content-2-2 container-xxl mx-auto p-0 position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="text-center title-text">
            <h1 class="text-title">Program Donasi Yang Sedang Berjalan</h1>
            <p class="text-caption" style="margin-left: 3rem; margin-right: 3rem">
                Anda bisa berdonasi untuk kegiatan-kegiatan ini
            </p>
        </div>

        <style>
            a .btn {
                transition: ease-in 1s !important;
            }

            .splide__arrow--next {
                right: -1em !important;
            }

            .splide__arrow--prev {
                left: -2em !important;
            }
        </style>

        <div class="grid-padding text-center">
            <div class="row">
                <div class="splide" role="group" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @forelse ($program as $prg)
                            <li class="splide__slide">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ $prg->photo_program ? Storage::url($prg->photo_program) : url('assets/images/cat1.jpeg') }}"
                                        class="img_slide rounded card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $prg->title }}</h5>
                                        <p class="card-text">{{ $prg->ringkasan }}</p>
                                        <a href="{{ route('detail', $prg->id) }}"
                                            class="btn btn-primary main_color">Detail</a>
                                    </div>
                                </div>
                            </li>
                            @empty
                            <h3 class="text-center">Kosong</h3>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="h-100 w-100 bg-white" id="why_us" style="box-sizing: border-box">

    <div class="content-2-2 container-xxl mx-auto p-0  position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="text-center title-text">
            <h1 class="text-title">3 Keys Benefit</h1>
            <p class="text-caption" style="margin-left: 3rem; margin-right: 3rem">
                You can easily manage your business with a powerful tools
            </p>
        </div>

        <div class="grid-padding text-center">
            <div class="row">
                <div class="col-lg-4 column">
                    <div class="icon">
                        <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-5.png"
                            alt="" />
                    </div>
                    <h3 class="icon-title">Easy to Operate</h3>
                    <p class="icon-caption">
                        This can easily help you to<br />
                        grow up your business fast
                    </p>
                </div>
                <div class="col-lg-4 column">
                    <div class="icon">
                        <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-6.png"
                            alt="" />
                    </div>
                    <h3 class="icon-title">Real-Time Analytic</h3>
                    <p class="icon-caption">
                        With real-time analytics, you<br />
                        can check data in real time
                    </p>
                </div>
                <div class="col-lg-4 column">
                    <div class="icon">
                        <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-7.png"
                            alt="" />
                    </div>
                    <h3 class="icon-title">Very Full Secured</h3>
                    <p class="icon-caption">
                        With real-time analytics, we<br />
                        will guarantee your data
                    </p>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="h-100 w-100 bg-white" id="testimoni" style="box-sizing: border-box">

    <div class="content-2-2 container-xxl mx-auto p-0  position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="text-center title-text">
            <h1 class="text-title">Testimoni</h1>
            <p class="text-caption" style="margin-left: 3rem; margin-right: 3rem">
                Berikut testimoni dari pengguna yang menggunakan program donasi
            </p>
        </div>

        <div class="grid-padding text-center">
            <div class="row">
                <div class="col-lg-4 column">
                    <div class="icon">
                        <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-5.png"
                            alt="" />
                    </div>
                    <h3 class="icon-title">Easy to Operate</h3>
                    <p class="icon-caption">
                        This can easily help you to<br />
                        grow up your business fast
                    </p>
                </div>
                <div class="col-lg-4 column">
                    <div class="icon">
                        <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-6.png"
                            alt="" />
                    </div>
                    <h3 class="icon-title">Real-Time Analytic</h3>
                    <p class="icon-caption">
                        With real-time analytics, you<br />
                        can check data in real time
                    </p>
                </div>
                <div class="col-lg-4 column">
                    <div class="icon">
                        <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-7.png"
                            alt="" />
                    </div>
                    <h3 class="icon-title">Very Full Secured</h3>
                    <p class="icon-caption">
                        With real-time analytics, we<br />
                        will guarantee your data
                    </p>
                </div>
            </div>
        </div>

        <div class="card-block">
            <div class="card">
                <div class="d-flex flex-lg-row flex-column align-items-center">
                    <div class="me-lg-3">
                        <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-1%20(1).png"
                            alt="" />
                    </div>
                    <div class="flex-grow-1 text-lg-start text-center card-text">
                        <h3 class="card-title">
                            Fast Business Management in 30 minutes
                        </h3>
                        <p class="card-caption">
                            Our tools for business analysis helps an organization
                            understand<br class="d-none d-lg-block" />
                            market or business development.
                        </p>
                    </div>
                    <div class="card-btn-space">
                        <button class="btn btn-card text-white">Buy Now</button>
                        <button class="btn btn-outline">Demo Version</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@stop