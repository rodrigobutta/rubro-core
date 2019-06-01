    <base href="{{url('/')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="google-site-verification" content="" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle or config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    <script src="{{ mix('js/common.js') }}"></script>
    <script src="{{ mix('js/app.js') }}" defer22></script>


    @isset($item)

        <meta name="description" content="{{$item->cover->description or 'Viamonte 1549 - (1055) Tel: 5382-9200'}}">

        <meta property="og:title" content="{{$item->cover->title}} | Consejo Profesional de Ciencia Económicas"/>
        <meta property="og:url" content="{{$item->getLink()['href']}}"/>
        <meta property="og:description" content="{{$item->cover->description or 'Viamonte 1549 - (1055) Tel: 5382-9200'}}"/>            
        <meta property="og:image" content="{!! (isset($item->cover->image) && $item->cover->image != '') ? URL::to(Resizer::widen(1920,$item->cover->image)) : "/images/og-default.jpg" !!}"/>
        
    @else

        <meta name="description" content="">

        <meta property="og:title" content=""/>
        <meta property="og:url" content="http://www.consejo.org.ar/"/>
        <meta property="og:description" content="Viamonte 1549 - (1055) Tel: 5382-9200"/>
        <meta property="og:image" content=""/>

    @endisset



    @if(env('GOOGLE_ANALYTICS_ID','')!='')
        <!-- Google Analytics -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            
            ga('create','{{env('GOOGLE_ANALYTICS_ID', '')}}', 'auto');
            ga('send', 'pageview');
        </script>
        <!-- End Google Analytics -->
    @endif            




    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/components.css') }}" rel="stylesheet">