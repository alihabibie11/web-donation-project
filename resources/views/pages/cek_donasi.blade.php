@extends('layouts.app')

@section('title', 'Cek Donasi')

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
        <h2 class="">Cek Donasi</h2>
        <p>Isi Kode Donasi dan Email anda untuk mengecek status donasi.</p>
        <div class="row">
            <div class="form-customize">
                <label for="donasi_id" class="form-label">Kode Donasi</label>
                <input type="text" class="form-control" id="donasi_id" name="donasi_id">
                <label for="email" class="form-label">Email/No HP</label>
                <input type="text" class="form-control" id="email" name="email">
                <button id="search" name="search" class="btn btn-primary"><i class="fa fa-search"
                        aria-hidden="true"></i> Cari</button>
            </div>
        </div>
    </div>

    <div class="container-xxl mx-auto p-0  position-relative header-2-2">
        <div class="row" style="justify-content: center;">
            <div id="detail_donasi" class="text-center">

            </div>
        </div>
    </div>
</div>
</section>
@stop
@push('addon-script')
<script>
    $('#search').click(function() {
    var id = $('#donasi_id').val();
    var email = $('#email').val();

    $.get('/cari_donasi?id='+ id + '&email=' + email, function (res) {
        $('#detail_donasi').html(res);
    })
    
})
</script>
@endpush