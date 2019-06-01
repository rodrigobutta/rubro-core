<section class="component component-home-section--6 section section--6 section--bg" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->titlea1))

        <div class="container">
            <div class="home-title">
                <h2 class="home-title__text"><span class="home-title__text__span">Nuestros</span> <strong class="home-title__text__span home-title__text__span--bold">Servicios</strong></h2>
                <a href="/servicios" class="home-title__link">
                    <span class="home-title__link__text">Conocé todos los Servicios</span>
                    <span class="home-title__link__arrow"></span>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="home-services-row">
                <div class="home-services-col home-services-col--1">
                    <section class="home-main-news">
                        <h4 class="home-main-news__subtitle">{{ $fields->appendixa or '' }}</h4>
                        <h3 class="home-main-news__title">{{ $fields->titlea or '' }}</h3>
                        <a href="{{ getLink($fields->linka1) }}" target="{{ gg($fields->blanka1)==1?'_blank':'_self' }}" class="home-main-news__link">
                            <div class="home-main-news__link__img" style="background-image: url('{{Resizer::widen(900,gg($fields->imagea1,''))}}')"></div>
                            <div class="home-main-news__link__description">
                                <h5 class="home-main-news__link__title">{{ $fields->titlea1 or '' }}</h5>
                                <p class="home-main-news__link__text">{{ $fields->descriptiona1 or '' }}</p>
                            </div>
                        </a>
                        <a href="{{ getLink($fields->linka2) }}" target="{{ gg($fields->blanka2)==1?'_blank':'_self' }}" class="home-main-news__link">
                            <div class="home-main-news__link__img" style="background-image: url('{{Resizer::widen(900,gg($fields->imagea2,''))}}')"></div>
                            <div class="home-main-news__link__description">
                                <h5 class="home-main-news__link__title">{{ $fields->titlea2 or '' }}</h5>
                                <p class="home-main-news__link__text">{{ $fields->descriptiona2 or '' }}</p>
                            </div>
                        </a>
                        <a href="{{ getLink($fields->linka) }}" target="{{ gg($fields->blanka)==1?'_blank':'_self' }}" class="home-main-news__cta">
                            <span class="home-main-news__cta__text">{{ $fields->ctaa or '' }}</span>
                            <span class="home-main-news__cta__arrow"></span>
                        </a>
                    </section>
                </div>
                <div class="home-services-col home-services-col--2">
                    <section class="home-main-news">
                        <h4 class="home-main-news__subtitle">{{ $fields->appendixb or '' }}</h4>
                        <h3 class="home-main-news__title">{{ $fields->titleb or '' }}</h3>
                        <a href="{{ getLink($fields->linkb1) }}" target="{{ gg($fields->blankb1)==1?'_blank':'_self' }}" class="home-main-news__link">
                            <div class="home-main-news__link__img" style="background-image: url('{{Resizer::widen(900,gg($fields->imageb1,''))}}')"></div>
                            <div class="home-main-news__link__description">
                                <h5 class="home-main-news__link__title">{{ $fields->titleb1 or '' }}</h5>
                                <p class="home-main-news__link__text">{{ $fields->descriptionb1 or '' }}</p>
                            </div>
                        </a>
                        <a href="{{ getLink($fields->linkb2) }}" target="{{ gg($fields->blankb2)==1?'_blank':'_self' }}" class="home-main-news__link">
                            <div class="home-main-news__link__img" style="background-image: url('{{Resizer::widen(900,gg($fields->imageb2,''))}}')"></div>
                            <div class="home-main-news__link__description">
                                <h5 class="home-main-news__link__title">{{ $fields->titleb2 or '' }}</h5>
                                <p class="home-main-news__link__text">{{ $fields->descriptionb2 or '' }}</p>
                            </div>
                        </a>
                        <a href="{{ getLink($fields->linkb) }}" target="{{ gg($fields->blankb)==1?'_blank':'_self' }}" class="home-main-news__cta">
                            <span class="home-main-news__cta__text">{{ $fields->ctab or '' }}</span>
                            <span class="home-main-news__cta__arrow"></span>
                        </a>
                    </section>
                </div>
                <div class="home-services-col home-services-col--3">
                    <section class="home-related-news">
                        <h3 class="home-related-news__title">{{ $fields->titlec or '' }}</h3>
                        <ul class="home-related-news__list">

                            @isset($fields->folders)

                                @php($items = fieldObjectsOfArray($fields->folders,\App\Folder::class) )

                                @foreach($items as $key => $i)
                                    <li class="home-related-news__item">
                                        <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="home-related-news__link">
                                            <div class="home-related-news__item__img" style="background-image: url('{{Resizer::widen(900,$i->cover->image)}}')"></div>
                                            <div class="home-related-news__item__description">
                                                <h5 class="home-related-news__item__subtitle">{{$i->parent->cover->title}}</h5>
                                                <h4 class="home-related-news__item__title">{{$i->cover->title}}</h4>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach

                            @endisset

                        </ul>
                    </section>
                </div>
            </div>
        </div>
        <div class="container services-slider-wrapper">
            <div class="home-btn-t-landscape js-services-slider">

                @foreach($fields->list as $i)

                    <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="home-btn-t-landscape__btn">
                        <span class="home-btn-t-landscape__btn__text">{!! field($i->fields->name) !!}</span>
                    </a>

                @endforeach

            </div>
        </div>

        @if(has($fields->adimage1) && has($fields->adimage2))
        <div class="container">
            <div class="row home-banner-row">
                <div class="col-sm-6">
                    <div class="banner banner--home-2">
                        <a href="{{ getLink($fields->adlink1) }}" target="{{ gg($fields->adblank1)==1?'_blank':'_self' }}" rel="nofollow">
                            <img src="{{Resizer::widen(535,gg($fields->adimage1,''))}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="banner banner--home-3">
                        <a href="{{ getLink($fields->adlink2) }}" target="{{ gg($fields->adblank2)==1?'_blank':'_self' }}" rel="nofollow">
                            <img src="{{Resizer::widen(535,gg($fields->adimage2,''))}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif




    @else

        <div class="container">
            <div class="home-title">
                <h2 class="home-title__text"><span class="home-title__text__span">Nuestros</span> <strong class="home-title__text__span home-title__text__span--bold">Servicios</strong></h2>
                <a href="#" class="home-title__link">
                    <span class="home-title__link__text">Conocé todos los Servicios</span>
                    <span class="home-title__link__arrow"></span>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="home-services-row">
                <div class="home-services-col home-services-col--1">
                    <section class="home-main-news">
                        <h4 class="home-main-news__subtitle">Edicion</h4>
                        <h3 class="home-main-news__title">Nuevas publicaciones</h3>
                        <a href="#" class="home-main-news__link">
                            <div class="home-main-news__link__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                            <div class="home-main-news__link__description">
                                <h5 class="home-main-news__link__title">Ley 27.430 Reforma Tributaria</h5>
                                <p class="home-main-news__link__text">Precio matriculado: $168 Disponible a partir del 28/2</p>
                            </div>
                        </a>
                        <a href="#" class="home-main-news__link">
                            <div class="home-main-news__link__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                            <div class="home-main-news__link__description">
                                <h5 class="home-main-news__link__title">Ley 27.430 Reforma Tributaria</h5>
                                <p class="home-main-news__link__text">Precio matriculado: $168 Disponible a partir del 28/2</p>
                            </div>
                        </a>
                        <a href="#" class="home-main-news__cta">
                            <span class="home-main-news__cta__text">Ver mas</span>
                            <span class="home-main-news__cta__arrow"></span>
                        </a>
                    </section>
                </div>
                <div class="home-services-col home-services-col--2">
                    <section class="home-main-news">
                        <h4 class="home-main-news__subtitle">Turismo</h4>
                        <h3 class="home-main-news__title">Viaja con el Consejo</h3>
                        <a href="#" class="home-main-news__link">
                            <div class="home-main-news__link__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                            <div class="home-main-news__link__description">
                                <h5 class="home-main-news__link__title">Todos Viajamos</h5>
                                <p class="home-main-news__link__text">Precio matriculado: $168 Disponible a partir del 28/2</p>
                            </div>
                        </a>
                        <a href="#" class="home-main-news__link">
                            <div class="home-main-news__link__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                            <div class="home-main-news__link__description">
                                <h5 class="home-main-news__link__title">Turismo Internacional</h5>
                                <p class="home-main-news__link__text">Precio matriculado: $168 Disponible a partir del 28/2</p>
                            </div>
                        </a>
                        <a href="#" class="home-main-news__cta">
                            <span class="home-main-news__cta__text">Ver mas</span>
                            <span class="home-main-news__cta__arrow"></span>
                        </a>
                    </section>
                </div>
                <div class="home-services-col home-services-col--3">
                    <section class="home-related-news">
                        <h3 class="home-related-news__title">Noticias Relacionadas</h3>
                        <ul class="home-related-news__list">
                            <li class="home-related-news__item">
                                <a href="#" class="home-related-news__link">
                                    <div class="home-related-news__item__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                                    <div class="home-related-news__item__description">
                                        <h5 class="home-related-news__item__subtitle">Cultura</h5>
                                        <h4 class="home-related-news__item__title">Homenaje en el Día Internacional de la Mujer</h4>
                                    </div>
                                </a>
                            </li>
                            <li class="home-related-news__item">
                                <a href="#" class="home-related-news__link">
                                    <div class="home-related-news__item__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                                    <div class="home-related-news__item__description">
                                        <h5 class="home-related-news__item__subtitle">Cultura</h5>
                                        <h4 class="home-related-news__item__title">Homenaje en el Día Internacional de la Mujer</h4>
                                    </div>
                                </a>
                            </li>
                            <li class="home-related-news__item">
                                <a href="#" class="home-related-news__link">
                                    <div class="home-related-news__item__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                                    <div class="home-related-news__item__description">
                                        <h5 class="home-related-news__item__subtitle">Cultura</h5>
                                        <h4 class="home-related-news__item__title">Homenaje en el Día Internacional de la Mujer</h4>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
        <div class="container services-slider-wrapper">
            <div class="home-btn-t-landscape js-services-slider">
                <a href="#" target="_blank" class="home-btn-t-landscape__btn">
                    <span class="home-btn-t-landscape__btn__text">Circulo de Empleo</span>
                </a>
                <a href="#" target="_blank" class="home-btn-t-landscape__btn">
                    <span class="home-btn-t-landscape__btn__text">Circulo de Beneficios</span>
                </a>
                <a href="#" target="_blank" class="home-btn-t-landscape__btn">
                    <span class="home-btn-t-landscape__btn__text">Trivia</span>
                </a>
                <a href="#" target="_blank" class="home-btn-t-landscape__btn">
                    <span class="home-btn-t-landscape__btn__text">Cultura</span>
                </a>
                <a href="#" target="_blank" class="home-btn-t-landscape__btn">
                    <span class="home-btn-t-landscape__btn__text">Deportes</span>
                </a>
                <a href="#" target="_blank" class="home-btn-t-landscape__btn">
                    <span class="home-btn-t-landscape__btn__text">Tramites de Documentacion</span>
                </a>
                <a href="#" target="_blank" class="home-btn-t-landscape__btn">
                    <span class="home-btn-t-landscape__btn__text">Salud</span>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="row home-banner-row">
                <div class="col-sm-6">
                    <div class="banner banner--home-2">
                        <img src="http://via.placeholder.com/535x105?text=Banner+Publicidad" alt="">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="banner banner--home-3">
                        <img src="http://via.placeholder.com/535x105?text=Banner+Publicidad" alt="">
                    </div>
                </div>
            </div>
        </div>

    @endif


</section>