@extends('layouts.app')

@section('title', 'List Program')

@section('content')


<div class="container">
    <div class="title-list text-center mb-4">
        <h2 class="">List Program Donasi</h2>
        <p>Program donasi yang masih berjalan</p>
        <hr>
        <div class="row g-3 align-items-center">
            <div class="col-lg-7">
                <label for="" style="float: left !important;">Cari Program</label>
                <form action="#" method="GET">
                    <input type="text" placeholder="Cari Program..." name="search_program"
                        value="{{ isset($_GET['search_program']) && $_GET['search_program'] != '' ? $_GET['search_program'] : '' }}"
                        id="search_program" class="form-control">
            </div>
            <div class="col-lg-3">
                <label for="" style="float: left !important;">Kategori</label>
                <select name="category" class="form-control">
                    <option value="all">Semua</option>
                    <option value="zakat" {{ isset($_GET['category']) && $_GET['category']=='zakat' ? 'selected' : ''
                        }}>Zakat</option>
                    <option value="infaq" {{ isset($_GET['category']) && $_GET['category']=='infaq' ? 'selected' : ''
                        }}>Infaq</option>
                    <option value="sedekah" {{ isset($_GET['category']) && $_GET['category']=='sedekah' ? 'selected'
                        : '' }}>Sedekah</option>
                    <option value="umum" {{ isset($_GET['umum']) && $_GET['umum']=='umum' ? 'selected' : '' }}>
                        Umum</option>
                </select>
            </div>
            <div class="col-lg-2">
                <button type="submit" class="btn btn-success mt-4" style="width: 100%"><i class="fa fa-search"
                        aria-hidden="true"></i>
                    Cari</button>
            </div>
        </div>
        </form>
    </div>
    <div class="row mt-2">
        <div class="col-lg-3">
            <button id="all_btn" class="btn btn-primary mb-3 btn_left" type="button">Semua Program</button>
        </div>
        <div class="col-lg-3">
            <button id="ongoing_btn" class="btn btn-info mb-3 btn_left" type="button">Masih Berjalan</button>
        </div>
        <div class="col-lg-3">
            <button id="finished_btn" class="btn btn-success btn_right" type="button">Sudah Selesai</button>
        </div>
    </div>
    <div id="all_donation" class="row row-cols-1 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 g-4 mt-4">
        @php
        $program_all = $program->get();
        @endphp
        @forelse ($program_all as $all)
        <a href="{{ route('detail', $all->id) }}" class="big_hv no_url_style">
            <div class="card h-100">
                <img src="{{ $all->photo_program ? Storage::url($all->photo_program) : url('assets/images/cat1.jpeg') }}"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $all->title }}</h5>
                    <p class="card-text">{{ $all->ringkasan }}</p>
                </div>
                <div class="category-field p-3">
                    <span class="badge bg-{{$all->jenis == 'zakat' ? 'success' : 'primary'}}">{{ $all->jenis }}</span>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{ $all->created_at->diffForHumans() }}</small>
                </div>
            </div>
        </a>
        @empty
        <div class="container">
            <h3 class="text-center">Tidak ada Program donasi.</h3>
        </div>
        @endforelse
    </div>
    <div id="ongoing_donation" class="row row-cols-1 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 g-4 mt-4">
        @php
        $program_on = $program->where('status', '!=', 'SELESAI')->get();
        @endphp
        @forelse ($program_on as $prg)
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
        @php
        $program_done = $program->where('status', '=', 'SELESAI')->get();
        @endphp
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
</div>
</section>
@stop
@push('addon-script')
<script>
    $( document ).ready(function() {
        $('#all_btn').attr('disabled', 'disabled')
    });
    $('#all_btn').click(function () {
        $('#ongoing_donation').hide();
        $('#finished_donation').hide();
        $('#all_donation').toggle();
        $('#all_btn').attr('disabled','disabled');
        $('#ongoing_btn').removeAttr('disabled');
    })
    $('#finished_btn').click(function () {
        $('#ongoing_donation').hide();
        $('#all_donation').hide();
        $('#finished_donation').toggle();
        $('#finished_btn').attr('disabled','disabled');     
        $('#ongoing_btn').removeAttr('disabled');
        $('#all_btn').removeAttr('disabled');
    })
    $('#ongoing_btn').click(function () {
        $('#finished_donation').hide();
        $('#all_donation').hide();
        $('#ongoing_donation').show();
        $('#ongoing_btn').attr('disabled','disabled');
        $('#finished_btn').removeAttr('disabled');
        $('#all_btn').removeAttr('disabled');
        })
</script>
@endpush