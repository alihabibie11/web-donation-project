@extends('layouts.admin')

@section('title', 'Program')

@section('content')
<style>
    .h-100 {
        display: flex;
        justify-content: center;
        align-content: center;
        flex-wrap: wrap;
        flex-direction: row;
        background-color: wheat;
        padding: 10px;
    }

    img {
        border-radius: 10px !important;
    }
</style>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Program</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Program</li>
            <li class="breadcrumb-item active">Detail Program</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-info"></i>
                Detail {{ $item->title }}
                <div class="float-end">
                    <a href="{{ route('admin.program.index') }}" class="btn btn-primary">
                        < Kembali </a>
                            <a href="{{ route('admin.program.edit', $item->id) }}" class="btn btn-warning">
                                <i class="fas fa-pencil"></i>
                                Edit
                            </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 text-center">
                        <div class="h-100">
                            <img class="img-fluid img-custom" src="{{ Storage::url($item->photo_program) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <table class="table">
                            <tr>
                                <td>Nama Program</td>
                                <td>:</td>
                                <td>{{ $item->title }}</td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td>:</td>
                                <td>{{ $item->jenis }}</td>
                            </tr>
                            <tr>
                                <td>Target</td>
                                <td>:</td>
                                <td>Rp. {{ number_format($item->target) }}</td>
                            </tr>
                            <tr>
                                <td>Dana Terkumpul</td>
                                <td>:</td>
                                <td>Rp. {{ $item->dana_terkumpul ? $item->dana_terkumpul : '-' }}</td>
                            </tr>
                            <tr>
                                <td>Deadline</td>
                                <td>:</td>
                                <td>{{ $item->deadline }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                            <tr>
                                <td>Lokasi</td>
                                <td>:</td>
                                <td>{{ $item->location }}</td>
                            </tr>
                            <tr>
                                <td>Sosmed</td>
                                <td>:</td>
                                <td>
                                    <img src="{{ asset('assets/images/icon/fb.png') }}" class="mb-1" alt=""> : {{
                                    $res->facebook }}
                                    <br>
                                    <img src="{{ asset('assets/images/icon/ig.png') }}" class="mb-1" alt=""> : {{
                                    $res->instagram }}
                                    <br>
                                    <img src="{{ asset('assets/images/icon/tw.png') }}" class="mb-1" alt=""> : {{
                                    $res->twitter }}
                                </td>
                            </tr>
                            <tr>
                                <td>Ringkasan</td>
                                <td>:</td>
                                <td>{{ $item->ringkasan }}</td>
                            </tr>
                            <tr>
                                <td>Detail</td>
                                <td>:</td>
                                <td>{!! $item->detail !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop
@push('prepend-script')
<script>
    CKEDITOR.replace( 'detail' );
</script>
@endpush