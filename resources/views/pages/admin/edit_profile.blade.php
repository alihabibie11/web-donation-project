@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
<style>
    .input-group img {
        width: 26px;
    }
</style>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Profile</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Profile</li>
            <li class="breadcrumb-item active">Edit Profile</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Profile {{ $item->title }}
                <div class="float-end"><a href="{{ route('admin.profile') }}" class="btn btn-primary">
                        < Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.update', $item->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $item->email }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">No HP</label>
                                <input type="text" name="no_hp" class="form-control" value="{{ $item->no_hp }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="{{ $item->alamat }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Provinsi</label>
                                <input type="text" name="provinsi" class="form-control" value="{{ $item->provinsi }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kabupaten</label>
                                <input type="text" name="kabupaten" class="form-control" value="{{ $item->kabupaten }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" value="{{ $item->kecamatan }}"
                                    required>
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
                        @if ($item->photo_url !== null)
                        <div class="h-100 text-center mb-3">
                            <img class="img-thumbnail" width="400" src="{{ Storage::url($item->photo_url) }}" alt="">
                        </div>
                        @endif
                        <input type="hidden" name="photo_old" value="{{ $item->photo_url }}">
                        <div class="input-group mb-3">
                            <input type="file" name="photo_url" class="form-control" id="inputGroupFile02">
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