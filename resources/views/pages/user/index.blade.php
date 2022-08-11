@extends('layouts.user')

@section('title', 'User Dashboard')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <style>
            .text-count {
                font-size: 44px;
                font-weight: 600;
                letter-spacing: 3px;
            }

            .card-header {
                font-weight: 500;
            }
        </style>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-header">
                        Total Dana Terkumpul / Berhasil Masuk
                    </div>
                    <div class="card-body">
                        <div class="text-card float-end">
                            <div class="text-count">Rp. {{ number_format(100000) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-header">
                        Total Program
                    </div>
                    <div class="card-body">
                        <div class="text-card float-end">
                            <div class="text-count">{{ '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-header">
                        Program Selesai
                    </div>
                    <div class="card-body">
                        <div class="text-card float-end">
                            <div class="text-count">{{ '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-header">
                        Program Dibatalkan
                    </div>
                    <div class="card-body">
                        <div class="text-card float-end">
                            <div class="text-count">{{ '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .card.cst.mb-4 {
                min-height: 333px;
            }
        </style>
        <div class="row">
            <div class="col-xl-6">
                <div class="card cst mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Donasi Terbaru
                    </div>
                    <div class="card-body">
                        <table class="table stripped">
                            <tr>
                                <td>Waktu</td>
                                <td>Nama</td>
                                <td>Jumlah</td>
                                <td>Program</td>
                            </tr>
                            {{-- @forelse ($donation as $dn)
                            <tr>
                                <td>{{ date('d/m/Y H:i:s', strtotime($dn->created_at))}}</td>
                                <td>{{$dn->nama}}</td>
                                <td>Rp {{number_format($dn->jumlah)}}</td>
                                <td>{{$dn->program->title}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">Empty</td>
                            </tr>
                            @endforelse --}}
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop