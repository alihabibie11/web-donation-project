<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
</head>
<style>
    html {
        font-family: sans-serif;
    }

    .title {
        text-align: center;
    }

    .date-title {
        margin-left: 2px;
        font-size: 13px;
    }

    /*design table 1*/
    .table1 {
        color: #232323;
        border-collapse: collapse;
    }

    .table1,
    th,
    td {
        border: 1px solid #999;
        padding: 5px 5px;
        font-size: 13px
    }
</style>

<body>
    <h1 class="title">LAPORAN {{ strtoupper($title) }}</h1>
    <p class="date-title">Tanggal : {{ $date }}</p>
    <table class="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Donasi</th>
                <th>Nama Pendonasi</th>
                <th>Jumlah</th>
                <th>Via</th>
                <th>Program</th>
                <th>Waktu</th>
            </tr>
        </thead>
        @php
        $no = 1;
        @endphp
        @forelse ($items as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{$item->kode_donasi}}</td>
            <td>{{$item->nama}}</td>
            <td>Rp. {{ $item->jumlah ? number_format($item->jumlah) : '-' }}</td>
            <td>Midtrans</td>
            <td>{{$item->title}}</td>
            <td>{{ date('d/m/Y', strtotime($item->created_at))}}</td>
            @empty
            <td colspan="7" class="text-center">Empty</td>
            @endforelse
        </tr>
    </table>

</body>

</html>