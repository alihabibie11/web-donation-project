@extends('layouts.admin')

@section('title', 'Program')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Program</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Program</li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Daftar Program
                <div class="float-end"><a href="{{ route('admin.program.create') }}" class="btn btn-primary">+ Buat
                        Program Baru</a></div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Judul</th>
                            <th>Ringkasan</th>
                            <th>Jenis</th>
                            <th>Target</th>
                            <th>Dana Terkumpul</th>
                            <th>Status</th>
                            <th>Dibuat pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @forelse ($data as $item)
                    <tr>
                        <td class="text-center"><img width="100" class="thumbnail"
                                src="{{ Storage::url($item->photo_program) }}" alt="">
                        </td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->ringkasan}}</td>
                        <td>{{$item->jenis}}</td>
                        <td>Rp. {{ number_format($item->target) }}</td>
                        <td>Rp. {{ $item->dana_terkumpul ? $item->dana_terkumpul : '-' }}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <form action="{{ route('admin.program.destroy', $item->id) }}" method="post"
                                style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button>
                            </form>
                            <a href="{{ route('admin.program.edit', $item->id) }}" class="btn btn-sm btn-warning"><i
                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="{{ route('admin.program.show', $item->id) }}" class="btn btn-sm btn-success"><i
                                    class="fa fa-info-circle" aria-hidden="true"></i></a>
                        </td>
                        @empty
                        <td colspan="6" class="text-center">Empty</td>
                        @endforelse
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>

@stop