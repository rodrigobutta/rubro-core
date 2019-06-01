@extends('master.app')

@section('content')
    <div class="container">
        <div class="section-breadcrumb">
            <h1 class="section-breadcrumb__title">
            @if ($results->total())
            {{$results->total()}} 
            @endif
            Resultado{{$results->total() !== 1 ? 's' : ''}} para "{{$q}}"</h1>
            <nav class="section-breadcrumb__nav">
                <a href="/" class="section-breadcrumb__item">Inicio</a>
                <span class="section-breadcrumb__item active">Resultados de búsqueda</span>
            </nav>
        </div>
    </div>

    <div class="results container">
        @if ($results->total())
            <div class="row">
                <div class="col-sm-12">
                    <div class="holder holder-main">
                        @if ($results->total() > $results->perPage())
                            <p class="results__displayed">Mostrando {{ $results->firstItem() }} a {{ $results->lastItem() }}</p>
                        @endif

                        @foreach ($results as $result)
                            <div class="result">
                                <div class="result__title">
                                    <h3 class="result__title__text"><span class="result__title__text__span">{{ $result->name }}</span></h3>
                                    <a href="/{{ $result->url }}" class="result__title__link">
                                        <span class="result__title__link__text">Ver más</span>
                                        <i class="result__title__link__arrow"></i>
                                    </a>
                                </div>
                                @if($result->cover->description)
                                    <blockquote class="result__description">{{ $result->cover->description }}</blockquote>
                                @endif
                                <p class="result__breadcrumb">@foreach ($result->breadcrumb() as $breadcrumb_item)
                                @if(!$loop->last)
                                    <span class="result__breadcrumb__item">{{$breadcrumb_item->name}}</span>
                                    <span class="result__breadcrumb__separator">|</span>
                                @else
                                    <span class="result__breadcrumb__item result__breadcrumb__item--active">{{$breadcrumb_item->name}}</span>
                                @endif
                                @endforeach</p>
                            </div>
                        @endforeach

                        {{$results->links()}}
                    </div>
                </div>
                
            </div>
        @else
        <div class="results__no-result">
            <div class="results__no-result__wrapper">
                <h3 class="results__no-result__title">¡Uy, perdón!</h3>
                <p class="results__no-result__text">No pudimos encontrar ningún resultado para tu búsqueda.</p>
                <a href="/" class="results__no-result__link">
                    <span class="results__no-result__link__arrow"></span>
                    <span class="results__no-result__link__text">Volver</span>
                </a>
            </div>
            <img src="/images/no-results.png" alt="" class="results__no-result__image" />
        </div>
        @endif
    </div>

    <script>$('.js-sticky').stick_in_parent();</script>
@endsection