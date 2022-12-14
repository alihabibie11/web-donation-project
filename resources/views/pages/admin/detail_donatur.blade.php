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
        <h1 class="mt-4">Donatur</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Donatur</li>
            <li class="breadcrumb-item active">Detail Donatur</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-info"></i>
                Detail Donatur
                <div class="float-end">
                    <a href="{{ route('admin.donatur.index') }}" class="btn btn-primary">
                        < Kembali </a>
                            <a href="{{ route('admin.donatur.edit', $item->id) }}" class="btn btn-warning">
                                <i class="fas fa-pencil"></i>
                                Edit
                            </a>
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
                                <td>Nama Donatur</td>
                                <td>:</td>
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>
                                <td>TTL</td>
                                <td>:</td>
                                <td>{{ $item->tgl_lahir }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $item->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td>{{ $item->kecamatan }}</td>
                            </tr>
                            <tr>
                                <td>Kabupaten</td>
                                <td>:</td>
                                <td>{{ $item->kabupaten }}</td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td>{{ $item->provinsi }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $item->email }}</td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td>{{ $item->no_hp }}</td>
                            </tr>
                            <tr>
                                <td>Sosmed</td>
                                <td>:</td>
                                <td>
                                    @if (!empty($res))
                                    <img src="{{ asset('assets/images/icon/fb.png') }}" class="mb-1" alt=""> : {{
                                    $res->facebook }}
                                    <br>
                                    <img src="{{ asset('assets/images/icon/ig.png') }}" class="mb-1" alt=""> : {{
                                    $res->instagram }}
                                    <br>
                                    <img src="{{ asset('assets/images/icon/tw.png') }}" class="mb-1" alt=""> : {{
                                    $res->twitter }}
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <h4>Riwayat Donasi</h4>
                        <table class="table">
                            <tr>
                                <th>Nama Program</th>
                                <th>Jenis</th>
                                <th>Jumlah Donasi</th>
                                <th>Waktu</th>
                                <th>Info</th>
                            </tr>
                            @forelse ($donated as $dt)
                            <tr>
                                <td>{{ $dt->program->title }}</td>
                                <td>{{ $dt->program->jenis }}</td>
                                <td>{{ number_format($dt->jumlah) }}</td>
                                <td>{{ $dt->created_at->diffForHumans() }}</td>
                                <td><a href="{{ route('program.show', $dt->program_id) }}"
                                        class="btn btn-sm btn-primary">Detail</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">Tidak ada riwayat donasi</td>
                            </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop
@push('prepend-script')
@endpush