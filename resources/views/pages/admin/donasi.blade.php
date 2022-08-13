@extends('layouts.admin')

@section('title', 'Donasi')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Donasi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Donasi</li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
                <div class="float-end">
                    <a href="{{ route('admin.report', 'donasi') }}" class="btn btn-danger"><i
                            class="fa-solid fa-file-pdf"></i> Export PDF</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode Donasi</th>
                            <th>Nama</th>
                            <th>Keterangan / Do'a</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Bank</th>
                            <th>Program</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->kode_donasi }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->doa }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->bank }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <form action="#" method="post" style="display: inline-block;">
                                @csrf
                                {{-- @method('delete') --}}
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button>
                            </form>
                            <a href="{{ route('admin.program.edit', $item->id) }}" class="btn btn-sm btn-warning"><i
                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="{{ route('admin.program.show', $item->id) }}" class="btn btn-sm btn-success"><i
                                    class="fa fa-info-circle" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Empty</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</main>

@stop