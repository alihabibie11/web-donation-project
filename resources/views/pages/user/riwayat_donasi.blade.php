@extends('layouts.user')

@section('title', 'Riwayat Donasi')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Riwayat Donasi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Riwayat Donasi</li>
        </ol>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me"></i>
                Daftar Riwayat Donasi
                <div class="float-end"><a href="{{ route('admin.program.create') }}" class="btn btn-primary"><i
                            class="fa-solid fa-file-pdf"></i> Export
                        PDF</a></div>
            </div>
            <div class="card-body">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Program</th>
                            <th>Jenis</th>
                            <th>Jumlah Donasi</th>
                            <th>Target Donasi</th>
                            <th>Dana yang sudah terkumpul</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @php
                    $no = 1;
                    @endphp
                    @forelse ($donated as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->program->title}}</td>
                        <td>{{$item->program->jenis}}</td>
                        <td>Rp. {{number_format($item->jumlah)}}</td>
                        <td>Rp. {{ $item->program->target ? number_format($item->program->target) : '-' }}</td>
                        <td>Rp. {{ $item->program->dana_terkumpul ? number_format($item->program->dana_terkumpul) : '-'
                            }}</td>
                        <td>{{ date('d/m/Y h:i:s', strtotime($item->created_at))}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="{{ route('detail_donasi', $item->id) }}" class="btn btn-sm btn-success"><i
                                    class="fa fa-info-circle" aria-hidden="true"></i></a>
                        </td>
                        @empty
                        <td colspan="8" class="text-center">Empty</td>
                        @endforelse
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>

@push('addon-script')
<script>
    $(document).ready( function () {
    $('#table').DataTable();
} );
</script>
@endpush
@stop