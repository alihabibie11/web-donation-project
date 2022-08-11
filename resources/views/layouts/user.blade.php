<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - User</title>
    @include('includes.admin.style')
</head>

<body class="sb-nav-fixed">
    <!-- nav -->
    @include('includes.admin.navbar')
    <div id="layoutSidenav">
        <!-- sidebar -->
        @include('includes.user.sidebar')
        <div id="layoutSidenav_content">
            @yield('content')
            @include('includes.admin.footer')
        </div>
    </div>
    @stack('prepend-script')
    @include('includes.admin.script')
    @stack('addon-script')
</body>