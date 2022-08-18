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
            <li class="breadcrumb-item active">Buat Program Baru</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Buat Program Baru
                <div class="float-end"><a href="{{ route('admin.program.index') }}" class="btn btn-primary">
                        < Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.program.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Judul Program</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Jenis Program</label>
                                <select name="jenis" class="form-select">
                                    <option selected>Open this select menu</option>
                                    <option value="zakat">Zakat</option>
                                    <option value="infaq">Infaq</option>
                                    <option value="sedekah">Sedekah</option>
                                    <option value="umum">Umum</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Ringkasan</label>
                                <textarea name="ringkasan" class="form-control" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-1">
                                <label class="form-label">Target</label>
                                <input type="number" name="target" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deadline</label>
                                <input type="date" name="deadline" class="form-control">
                            </div>
                        </div>
                    </div>
                    <label class="form-label">Detail Program</label>
                    <textarea name="detail"></textarea>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="location" class="form-control" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Sosial Media Link</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1"><img
                                        src="{{ asset('assets/images/icon/fb.png') }}" alt=""></span>
                                <input type="text" class="form-control" name="fb" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1"><img
                                        src="{{ asset('assets/images/icon/ig.png') }}" alt=""></span>
                                <input type="text" name="ig" class="form-control" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1"><img
                                        src="{{ asset('assets/images/icon/tw.png') }}" alt=""></span>
                                <input type="text" name="tw" class="form-control" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label">Featured Photo</label>
                        <div class="input-group mb-3">
                            <input type="file" name="photo[]" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="photo[]" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="photo[]" class="form-control" id="inputGroupFile02">
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