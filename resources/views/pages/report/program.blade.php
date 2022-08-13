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
                <th>Nama Program</th>
                <th>Jenis</th>
                <th>Target</th>
                <th>Dana Terkumpul</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Dibuat pada</th>
            </tr>
        </thead>
        @php
        $no = 1;
        @endphp
        @forelse ($program as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->jenis}}</td>
            <td>Rp. {{ number_format($item->target) }}</td>
            <td>Rp. {{ $item->dana_terkumpul ? number_format($item->dana_terkumpul) : '-' }}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->deadline ? date('d/m/Y', strtotime($item->deadline)) : '-'}}</td>
            <td>{{ date('d/m/Y', strtotime($item->created_at))}}</td>
            @empty
            <td colspan="6" class="text-center">Empty</td>
            @endforelse
        </tr>
    </table>

</body>

</html>