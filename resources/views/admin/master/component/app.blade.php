<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!-- Scripts -->
        {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
        <script src="{{ mix('js/common.js') }}"></script>
        <script src="{{ mix('js/admin.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link href="{{ mix('css/admin.css') }}" rel="stylesheet"> {{-- TODO. OJO ACA QUE EL BASE ADMIN INFLUYE EN LOS COMPONENTES. Eventualmente tendremos que separarlo --}}

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
        </script>

    </head>
    <body class="@yield('bodyclass')">

        @yield('content')

    </body>
</html>

@yield('js')