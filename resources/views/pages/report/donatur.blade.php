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
    <table class="table1" id="table">
        <thead>
            <tr>
                <th style="width: 5px;">No</th>
                <th>Name</th>
                <th>Email</th>
                <th>No HP</th>
                <th style="width: 90px">Asal</th>
                <th style="width: 30px">Jumlah Donasi</th>
                <th>Daftar Sejak</th>
            </tr>
        </thead>
        @php
        $no = 1;
        @endphp
        @forelse ($items as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td style="width: 140px;">{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->no_hp }}</td>
            <td>{{ $item->alamat .' '. $item->kecamatan }}</td>
            <td>{{ getTotalDonation($item->id) }}</td>
            <td style="width: 125px;">{{ $item->created_at }}</td>
            {{-- <td>{{ number_format($item->) }}</td> --}}
        </tr>
        @empty
        <td colspan="6" class="text-center">Empty</td>
        @endforelse
        </tr>
    </table>

</body>

</html>