@extends('layouts.app')

@section('title', 'About')

@section('content')

<style>
    .form-control {
        margin: 0 auto;
        width: 25%;
        display: inline-block;
        margin-right: 10px;
    }

    .form-customize {
        padding: 5px;
    }

    .form-customize .btn {
        height: 37px;
        margin-bottom: 3px;
    }

    /* .form-customize {
        height: 37px;
        margin-bottom: 3px;
    } */

    @media only screen and (max-width: 768px) {
        .form-control {
            margin: 0 auto 10px auto;
            width: 100%;
            display: block;
        }

        .form-customize {
            /* background-color: salmon; */
            padding: 10px;
        }
    }

    .table {
        max-width: 70%;
    }

    .table td:nth-child(1) {
        width: 190px;
    }

    .table td:nth-child(2) {
        width: 10px;
    }
</style>

<div class="container">
    <div class="title-list text-center mb-4">
        <h2 class="">Tentang Aplikasi</h2>
        <p>Isi ID Donasi dan Email anda untuk mengecek status donasi.</p>
        <form action="" method="post">
            <div class="row">
                <div class="form-customize">
                    <label for="donasi_id" class="form-label">ID Donasi</label>
                    <input type="text" class="form-control" id="donasi_id" name="donasi_id">
                    <label for="email" class="form-label">Email/No HP</label>
                    <input type="text" class="form-control" id="email" name="email">
                    <button type="button" name="search" class="btn btn-primary"><i class="fa fa-search"
                            aria-hidden="true"></i> Cari</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container-xxl mx-auto p-0  position-relative header-2-2">
        <div class="row" style="justify-content: center;">
            <table class="table">
                <tr>
                    <td>ID Donasi</td>
                    <td>:</td>
                    <td>DMD001</td>
                </tr>
                <tr>
                    <td>Program</td>
                    <td>:</td>
                    <td>Test</td>
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
        </div>
    </div>
</div>
</section>
@stop
@push('addon-script')
@endpush