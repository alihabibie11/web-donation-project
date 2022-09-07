@extends('layouts.admin')

@section('title', 'Program')

@section('content')
<style>
    .input-group img {
        width: 26px;
    }
</style>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Program</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Program</li>
            <li class="breadcrumb-item active">Edit Program</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Program {{ $item->title }}
                <div class="float-end"><a href="{{ route('admin.program.index') }}" class="btn btn-primary">
                        < Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.program.update', $item->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Judul Program</label>
                                <input type="text" name="title" class="form-control" value="{{ $item->title }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Jenis Program</label>
                                <select name="jenis" class="form-select">
                                    <option>Open this select menu</option>
                                    @foreach ($jenis as $j)
                                    <option value="{{$j}}" @selected($j==$item->jenis)>{{$j}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="publish_status" class="form-select">
                                    <option value="">--Pilih--</option>
                                    <option value="active" {{$item->publish_status == 'active' ? 'selected' :
                                        ''}}>Active</option>
                                    <option value="draft" {{$item->publish_status == 'draft' ? 'selected' : ''}}>Draft
                                    </option>
                                    <option value="inactive" {{$item->publish_status == 'inactive' ? 'selected' :
                                        ''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Ringkasan</label>
                                <textarea name="ringkasan" class="form-control"
                                    rows="4">{{ $item->ringkasan }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-1">
                                <label class="form-label">Target</label>
                                <input type="number" name="target" class="form-control" value="{{ $item->target }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deadline</label>
                                <input type="date" name="deadline" class="form-control" value="{{ $item->deadline }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <label class="form-label">Detail Program</label>
                    <textarea name="detail">{{ $item->detail }}</textarea>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="location" class="form-control" rows="5"
                                    required>{{ $item->location }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Sosial Media Link</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1"><img
                                        src="{{ asset('assets/images/icon/fb.png') }}" alt=""></span>
                                <input type="text" class="form-control" name="fb" aria-label="Username"
                                    aria-describedby="basic-addon1" value="{{ $res->facebook }}">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1"><img
                                        src="{{ asset('assets/images/icon/ig.png') }}" alt=""></span>
                                <input type="text" name="ig" class="form-control" value="{{ $res->instagram }}"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1"><img
                                        src="{{ asset('assets/images/icon/tw.png') }}" alt=""></span>
                                <input type="text" name="tw" class="form-control" value="{{ $res->twitter }}"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label">Photo</label>
                        @if ($item->photo_program !== null)
                        <div class="h-100 text-center mb-3">
                            <img class="img-thumbnail" width="400" src="{{ Storage::url($item->photo_program) }}"
                                alt="">
                        </div>
                        @endif
                        <input type="hidden" name="photo_old" value="{{ $item->photo_program }}">
                        <div class="input-group mb-3">
                            <input type="file" name="photo_program" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary py-2">Simpan</button>
                    </div>
                </form>
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