@extends('layouts.admin')

@section('title', 'Donatur')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Donatur</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Donatur</li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
                <div class="float-end">
                    <a href="{{ route('admin.report', 'donatur') }}" class="btn btn-danger"><i
                            class="fa-solid fa-file-pdf"></i> Export PDF</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Asal</th>
                            <th>Daftar Sejak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->alamat .' '. $item->kecamatan }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <form action="{{ route('admin.donatur.destroy', $item->id) }}" method="post"
                                style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button>
                            </form>
                            <a href="{{ route('admin.donatur.edit', $item->id) }}" class="btn btn-sm btn-warning"><i
                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="{{ route('admin.donatur.show', $item->id) }}" class="btn btn-sm btn-success"><i
                                    class="fa fa-info-circle" aria-hidden="true"></i></a>
                        </td>
                        </td>
                    </tr>
                    @empty
                    <td colspan="6">Empty</td>
                    @endforelse
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>

@stop