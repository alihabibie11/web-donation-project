@extends('layouts.admin')

@section('title', 'Profile')

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
        <h1 class="mt-4">Profile</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Profile</li>
            <li class="breadcrumb-item active">Detail Profile</li>
        </ol>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-info"></i>
                Detail {{ $item->name }}
                <div class="float-end">
                    <a href="{{ route('admin.profile') }}" class="btn btn-primary">
                        < Kembali </a>
                            <a href="{{ route('admin.profile.edit', $item->id) }}" class="btn btn-warning">
                                <i class="fas fa-pencil"></i>
                                Edit
                            </a>
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#edit-photo-modal">
                                <i class="fa-solid fa-file-image"></i>
                                Ubah Foto
                            </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 text-center">
                        <div class="h-100">
                            <img class="img-fluid img-custom" src="{{ Storage::url($item->photo_url) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <table class="table">
                            <tr>
                                <td>Nama Profile</td>
                                <td>:</td>
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td>{{ $item->no_hp }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $item->email }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $item->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td>{{ $item->provinsi }}</td>
                            </tr>
                            <tr>
                                <td>Kabupaten</td>
                                <td>:</td>
                                <td>{{ $item->kabupaten }}</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td>{{ $item->kecamatan }}</td>
                            </tr>
                            <tr>
                                <td>Sosmed</td>
                                <td>:</td>
                                <td>
                                    @if (!empty($res))
                                    <img src="{{ asset('assets/images/icon/fb.png') }}" class="mb-1" alt=""> : {{
                                    $res->facebook ?? '' }}
                                    <br>
                                    <img src="{{ asset('assets/images/icon/ig.png') }}" class="mb-1" alt=""> : {{
                                    $res->instagram ?? '' }}
                                    <br>
                                    <img src="{{ asset('assets/images/icon/tw.png') }}" class="mb-1" alt=""> : {{
                                    $res->twitter ?? '' }}
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit-photo-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="staticBackdropLabel">Donasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <img class="img-fluid img-custom" src="{{ Storage::url($item->photo_url) }}" alt="">
                                {{-- <img class="img-fluid img-custom" src="" alt=""> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop
@push('prepend-script')
@endpush