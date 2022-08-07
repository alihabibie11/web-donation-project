<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
</head>

@stack('prepend-style')
@include('includes.style')
@stack('addon-style')

</head>

<body>
    <section class="h-100 w-100 bg-white" style="box-sizing: border-box">
        <div class="container-xxl mx-auto p-0  position-relative header-2-2" style="font-family: 'Poppins', sans-serif">

            {{-- paling nanti kalo pindah page lain ngga pake header ya --}}
            @include('includes.navbar')
            @if (isset($header))
            @include('includes.header')
            @endif

        </div>
    </section>
    <section class="h-100 w-100 bg-white" style="box-sizing: border-box">

        @yield('content')
        @include('includes.footer')

    </section>

    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>