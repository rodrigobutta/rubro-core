<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include ('master.head')

</head>
<body class="is-public">

    @include ('master.header')

    <div id="app">

         {{--@if(isset($item) && $item->slug == 'home') sólo mostramos alertas en la home --}}
            @foreach(activeAlerts() as $a)

                <section class="home-alert js-home-alert" data-id="{{$a->id}}" style="display:none">
                    <div class="container">
                        
                        @if(isset($a->link) && $a->link!='')
                        <a href="{{$a->link}}" target="{{$a->target}}">
                        @endif
                        
                            <div class="home-alert__wrapper">
                                <div class="home-alert__description">
                                    <img src="./images/icons/alert.svg" alt="" class="home-alert__icon">
                                    <p class="home-alert__text"><strong class="home-alert__text__highlighted">{{$a->title or ''}}</strong> <span class="home-alert__text__text">{{$a->description or ''}}</span></p>
                                </div>
                                <button class="home-alert__close-btn js-home-alert-close-btn"><img src="./images/icons/close.svg" alt="Cerrar" class="home-alert__close-btn__icon"></button>
                            </div>
                        
                        @if(isset($a->link) && $a->link!='')
                        </a>
                        @endif
                    
                    </div>
                </section>

            @endforeach
        {{-- @endif             --}}


        {{-- si hay item es que es un llamado desde folder, y si es fixed quiere decir que viene de algun lado fijo y tengo que saltear titulo  --}}
        {{-- @if($item && isset($isFixed) && !$isFixed) --}}
        @if(isset($item) && $item->slug != 'home')
            <div class="container">
                <div class="section-breadcrumb">
                    <h1 class="section-breadcrumb__title">{{$item->name or 'no es un folder'}}</h1>
                    <nav class="section-breadcrumb__nav">
                        @foreach($item->breadcrumb() as $i)
                            <a href="{{$i->getLink()['href']}}" class="section-breadcrumb__item">{{$i->name}}</a>
                        @endforeach
                        <span class="section-breadcrumb__item active">{{$item->name or 'no es un folder'}}</span>
                    </nav>
                </div>
            </div>
        @endif

        <main>
            @yield('content')
        </main>

    </div>

    @include('master.footer')


    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY', '000000000')}}&callback=mapsInitialize" defer></script>

    <script>
        function triggerAnalyticsEvent(campaign, slot, action) {
            if(ga !== undefined) {
                ga('send', {
                    'hitType': 'event',
                    'eventCategory': campaign,
                    'eventLabel': slot,
                    'eventAction': action,
                    'nonInteraction': action !== 'click'
                });
            }
        }
    </script>

    @stack('end_scripts')
</body>
</html>
