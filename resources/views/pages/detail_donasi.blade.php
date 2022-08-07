@extends('layouts.app')

@section('title', 'Detail Donasi')

@section('content')

<style>
    /* .parent {
        height: 100vh;
    } */

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
                    <h2 class="">Ringkasan Donasi</h2>
                    <h4 class="">Terima kasih!</h4>
                    <p>Berikut ringkasan donasi anda</p>
                </div>

                <table class="table">
                    <tr>
                        <td>ID Donasi</td>
                        <td>:</td>
                        <td>DMD001</td>
                    </tr>
                    <tr>
                        <td>Program</td>
                        <td>:</td>
                        <td>{{ $detail }}</td>
                    </tr>
                    <tr>
                        <td>Metode Pembayaran</td>
                        <td>:</td>
                        <td>Transfer BCA</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>Menunggu</td>
                    </tr>
                    <tr>
                        <td>Nominal Donasi</td>
                        <td>:</td>
                        <td>Rp. 200.000.000</td>
                    </tr>
                    <tr>
                        <td>Kode Unik</td>
                        <td>:</td>
                        <td>Rp. 290</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>:</td>
                        <td>Rp. 20.000.290</td>
                    </tr>
                </table>
                <p>Mohon untuk tidak membulatkan transfer anda.</p>
                <p>Kami berharap anda mentransfer sebelum <b>Sabtu, 22 September 2022 17.15 WIB</b></p>

                <div class="card mt-2">
                    <div class="card-header">
                        <h4>Silahkan Transfer Ke :</h4>
                    </div>
                    <div class="card-body">
                        <p style="text-align: left;">BANK CENTRAL ASIA (BCA)</p>
                        <p style="text-align: left;">Tangerang</p>
                        <p style="text-align: left;">No. Rekening <b>150020069</b></p>
                        <p style="text-align: left;">Atas nama <b>Habibie</b></p>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-header">
                        <h4>Catatan</h4>
                    </div>
                    <div class="card-body">
                        <p>Jika anda merasa telah mentransfer uang donasi ke rekening di atas, akan tetapi status donasi
                            masih menunggu atau expired silahkan menghubungi Admin Progam ini :</p>
                        <table class="table">
                            <tr>
                                <td>No. HP / WA</td>
                                <td>:</td>
                                <td>083893238789</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>habibie@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Telegram</td>
                                <td>:</td>
                                <td>@habibie11</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop