@extends('layouts.app')

@section('title', 'List Program')

@section('content')


<div class="container">
    <div class="title-list text-center mb-4">
        <h2 class="">List Program Donasi</h2>
        <p>Program donasi yang masih berjalan</p>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <button id="ongoing_btn" class="btn btn-primary mb-3 btn_left" type="button">Masih Berjalan</button>
            </div>
            <div class="col-lg-6">
                <button id="finished_btn" class="btn btn-success btn_right" type="button">Sudah Selesai</button>
            </div>
        </div>
    </div>
    <div id="ongoing_donation" class="row row-cols-1 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 g-4 mt-4">
        @forelse ($program as $prg)
        <a href="{{ route('detail', $prg->id) }}" class="big_hv no_url_style">
            <div class="card h-100">
                <img src="{{ $prg->photo_program ? Storage::url($prg->photo_program) : url('assets/images/cat1.jpeg') }}"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $prg->title }}</h5>
                    <p class="card-text">{{ $prg->ringkasan }}</p>
                </div>
                <div class="category-field p-3">
                    <span class="badge bg-{{$prg->jenis == 'zakat' ? 'success' : 'primary'}}">{{ $prg->jenis }}</span>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{ $prg->created_at->diffForHumans() }}</small>
                </div>
            </div>
        </a>
        @empty
        <div class="container">
            <h3 class="text-center">Tidak ada Program donasi.</h3>
        </div>
        @endforelse
    </div>
    <div id="finished_donation" class="row row-cols-1 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 g-4 mt-4"
        style="display: none;">
        @forelse ($program_done as $prg)
        <a href="{{ route('detail', $prg->id) }}" class="big_hv no_url_style">
            <div class="card h-100">
                <img src="{{ $prg->photo_program ? Storage::url($prg->photo_program) : url('assets/images/cat1.jpeg') }}"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $prg->title }}</h5>
                    <p class="card-text">{{ $prg->ringkasan }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{ $prg->created_at->diffForHumans() }}</small>
                </div>
            </div>
        </a>
        @empty
        <div class="container">
            <h3 class="text-center">Tidak ada Program donasi.</h3>
        </div>
        @endforelse
    </div>

</div>
</div>
</section>
@stop
@push('addon-script')
<script>
    $('#finished_btn').click(function () {
        $('#ongoing_donation').hide();
        $('#finished_donation').toggle();
        $('#finished_btn').attr('disabled','disabled');
        $('#ongoing_btn').removeAttr('disabled');
    })
    $('#ongoing_btn').click(function () {
        $('#finished_donation').hide();
        $('#ongoing_donation').show();
        $('#ongoing_btn').attr('disabled','disabled');
        $('#finished_btn').removeAttr('disabled');
        })
</script>
@endpush