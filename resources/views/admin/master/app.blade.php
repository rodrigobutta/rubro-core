<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{url('/')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->    
    <script src="{{ mix('js/common.js') }}"></script>
    <script src="{{ mix('js/admin.js') }}"></script>
    <script src="/js/templates.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->    
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">

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
    
    <div id="page-container" class="sidebar-inverse side-scroll main-content-boxed side-trans-enabled {!! getUserConfig('sidebar-locked')==1?'sidebar-o':'' !!} {!! getUserConfig('tree-locked')==1?'side-overlay-o':'' !!}">

        @auth

            @include('admin.master.floatbar')

            @include('admin.master.sidebar')

            @include('admin.master.header')

        @endauth

        @yield('content')

        @if(Route::currentRouteName() != 'login')

            @include('admin.master.footer')

        @endif

    </div>
    <!-- END Page Container -->

    @if (session('success'))
        <script>
            $.notify({
                message: ' {{ session('success') }}',
            },{
                type: 'success',
                placement: { from: 'top', align: 'center'}
            });
        </script>   
    @endif
    @if (session('warning'))
        <script>
            $.notify({
                message: ' {{ session('warning') }}',
            },{
                type: 'warning',
                placement: { from: 'top', align: 'center'}
            });
        </script>   
    @endif
    @if (session('danger'))
        <script>
            $.notify({
                message: ' {{ session('danger') }}',
            },{
                type: 'danger',
                placement: { from: 'top', align: 'center'}
            });
        </script>   
    @endif

</body>
</html>

@yield('js')