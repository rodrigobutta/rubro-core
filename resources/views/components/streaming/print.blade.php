<section class="component component-streaming  home-streaming js-home-streaming {{ gg($fields->visible)==1?'visible':'hidden' }}" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->title))

        <section class="home-streaming js-home-streaming">
            <div class="container">
                <div class="home-streaming__wrapper">
                    <div class="home-streaming__text-wrapper">
                        <div class="home-streaming__description">
                            @if(has($fields->label))
                            <small class="home-streaming__live">{{ $fields->label or '' }}</small>
                            @endif
                            <h3 class="home-streaming__title">{{ $fields->title or '' }}</h3>
                            <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="home-streaming__link">
                                <span class="home-streaming__link__text">{{$fields->cta or ''}}</span>
                                <span class="home-streaming__link__arrow"></span>
                            </a>
                        </div>
                        <a href="{{$fields->subscribelink or ''}}" target="{{ gg($fields->blank2)==1?'_blank':'_self' }}" class="home-streaming__subscribe d-none d-md-inline-block">
                            <span class="home-streaming__subscribe__icon"></span>
                            <span class="home-streaming__subscribe__text">Suscribite a nuestro canal</span>
                        </a>
                    </div>
                    <div class="home-streaming__video">
                        <iframe id="ytplayer" class="home-streaming__video__player" type="text/html"src="https://www.youtube.com/embed/{{ $fields->video or '000000'}}?autoplay=0" frameborder="0"></iframe>
                    </div>
                    <a href="{{$fields->subscribelink or ''}}" target="{{ gg($fields->blank2)==1?'_blank':'_self' }}" class="home-streaming__subscribe d-md-none">
                        <span class="home-streaming__subscribe__icon"></span>
                        <span class="home-streaming__subscribe__text">Suscribite a nuestro canal</span>
                    </a>
                </div>
            </div>
        </section>

    @else

        <section class="home-streaming js-home-streaming">
            <div class="container">
                <div class="home-streaming__wrapper">
                    <div class="home-streaming__text-wrapper">
                        <div class="home-streaming__description">
                            <small class="home-streaming__live">En vivo</small>
                            <h3 class="home-streaming__title">Ciclo de Actualizacion en Contabilidad y Auditoria</h3>
                            <a href="#" class="home-streaming__link">
                                <span class="home-streaming__link__text">Enviar pregunta ahora</span>
                                <span class="home-streaming__link__arrow"></span>
                            </a>
                        </div>
                        <a href="#" class="home-streaming__subscribe d-none d-md-inline-block">
                            <span class="home-streaming__subscribe__icon"></span>
                            <span class="home-streaming__subscribe__text">Suscribite a nuestro canal</span>
                        </a>
                    </div>
                    <div class="home-streaming__video">
                        <iframe id="ytplayer" class="home-streaming__video__player" type="text/html"src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=0" frameborder="0"></iframe>
                    </div>
                    <a href="#" class="home-streaming__subscribe d-md-none">
                        <span class="home-streaming__subscribe__icon"></span>
                        <span class="home-streaming__subscribe__text">Suscribite a nuestro canal</span>
                    </a>
                </div>
            </div>
        </section>


    @endif


</section>
