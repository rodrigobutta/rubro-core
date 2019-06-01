<section class="component component-home-section--4 section section--4" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->link))



        <div class="container">
            <div class="home-title">
                <h2 class="home-title__text"><span class="home-title__text__span">Próximas</span> <strong class="home-title__text__span home-title__text__span--bold">Actividades</strong></h2>
                <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="home-title__link">
                    <span class="home-title__link__text">{{$fields->cta or ''}}</span>
                    <span class="home-title__link__arrow"></span>
                </a>
            </div>
            <section class="home-card-1ptd-4td">
                <div class="home-card-1ptd-4td__wrapper">
                    <a href="{{ getLink($fields->link1) }}" target="{{ gg($fields->blank1)==1?'_blank':'_self' }}"  class="home-card-1ptd-4td__card home-card-1ptd-4td__card--highlighted" style="background-image: url('{{Resizer::widen(900,gg($fields->image1,''))}}');">
                        <div class="home-card-1ptd-4td__card__top">
                            <h4 class="home-card-1ptd-4td__card__subtitle">{{ $fields->appendix1 or '' }}</h4>
                            <h3 class="home-card-1ptd-4td__card__title">{!! field($fields->title1) !!}</h3>
                        </div>
                        <div class="home-card-1ptd-4td__card__bottom">
                            <p class="home-card-1ptd-4td__card__text">{!! field($fields->subtitle1) !!}</p>
                        </div>
                    </a>
                </div>
                <div class="home-card-1ptd-4td__wrapper">
                    <a href="{{ getLink($fields->link2) }}" target="{{ gg($fields->blank2)==1?'_blank':'_self' }}"  class="home-card-1ptd-4td__card">
                        <div class="home-card-1ptd-4td__card__top">
                            <h4 class="home-card-1ptd-4td__card__subtitle">{{ $fields->appendix2 or '' }}</h4>
                            <h3 class="home-card-1ptd-4td__card__title">{!! field($fields->title2) !!}</h3>
                        </div>
                        <div class="home-card-1ptd-4td__card__bottom">
                            <p class="home-card-1ptd-4td__card__text">{!! field($fields->subtitle2) !!}</p>
                            <span class="home-card-1ptd-4td__card__arrow"></span>
                        </div>
                    </a>
                    <a href="{{ getLink($fields->link3) }}" target="{{ gg($fields->blank3)==1?'_blank':'_self' }}"  class="home-card-1ptd-4td__card">
                        <div class="home-card-1ptd-4td__card__top">
                            <h4 class="home-card-1ptd-4td__card__subtitle">{{ $fields->appendix3 or '' }}</h4>
                            <h3 class="home-card-1ptd-4td__card__title">{!! field($fields->title3) !!}</h3>
                        </div>
                        <div class="home-card-1ptd-4td__card__bottom">
                            <p class="home-card-1ptd-4td__card__text">{!! field($fields->subtitle3) !!}</p>
                            <span class="home-card-1ptd-4td__card__arrow"></span>
                        </div>
                    </a>
                    <a href="{{ getLink($fields->link4) }}" target="{{ gg($fields->blank4)==1?'_blank':'_self' }}" class="home-card-1ptd-4td__card">
                        <div class="home-card-1ptd-4td__card__top">
                            <h4 class="home-card-1ptd-4td__card__subtitle">{{ $fields->appendix4 or '' }}</h4>
                            <h3 class="home-card-1ptd-4td__card__title">{!! field($fields->title4) !!}</h3>
                        </div>
                        <div class="home-card-1ptd-4td__card__bottom">
                            <p class="home-card-1ptd-4td__card__text">{!! field($fields->subtitle4) !!}</p>
                            <span class="home-card-1ptd-4td__card__arrow"></span>
                        </div>
                    </a>
                    <a href="{{ getLink($fields->link5) }}" target="{{ gg($fields->blank5)==1?'_blank':'_self' }}" class="home-card-1ptd-4td__card">
                        <div class="home-card-1ptd-4td__card__top">
                            <h4 class="home-card-1ptd-4td__card__subtitle">{{ $fields->appendix5 or '' }}</h4>
                            <h3 class="home-card-1ptd-4td__card__title">{!! field($fields->title5) !!}</h3>
                        </div>
                        <div class="home-card-1ptd-4td__card__bottom">
                            <p class="home-card-1ptd-4td__card__text">{!! field($fields->subtitle5) !!}</p>
                            <span class="home-card-1ptd-4td__card__arrow"></span>
                        </div>
                    </a>
                </div>
            </section>
            <section class="home-events">

                @isset($fields->list)
                    @foreach($fields->list as $i)

                        <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="home-events__link">
                            <div class="home-events__date">
                                <span class="home-events__date__text">{{$i->fields->day or ''}}</span>
                                <span class="home-events__date__number">{{$i->fields->date or ''}}</span>
                            </div>
                            <span class="home-events__link__text">{{$i->fields->name or ''}}</span>
                        </a>

                    @endforeach
                @endif

            </section>

            {{-- @if(has($fields->adimage1))
            <div class="banner banner--home-1">
                <a href="{{ getLink($fields->adlink1) }}" target="{{ gg($fields->adblank1)==1?'_blank':'_self' }}" rel="nofollow">
                    <img src="{{Resizer::widen(535,gg($fields->adimage1,''))}}" alt="">
                </a>
            </div>
            @endif --}}

        </div>




    @else


        <div class="container">
             <div class="home-title">
                 <h2 class="home-title__text"><span class="home-title__text__span">Próximas</span> <strong class="home-title__text__span home-title__text__span--bold">Actividades</strong></h2>
                 <a href="#" class="home-title__link">
                     <span class="home-title__link__text">Conocé nuestras actividades</span>
                     <span class="home-title__link__arrow"></span>
                 </a>
             </div>
             <section class="home-card-1ptd-4td">
                 <div class="home-card-1ptd-4td__wrapper">
                     <a href="#" class="home-card-1ptd-4td__card home-card-1ptd-4td__card--highlighted" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');">
                         <div class="home-card-1ptd-4td__card__top">
                             <h4 class="home-card-1ptd-4td__card__subtitle">Rubik Regular 10</h4>
                             <h3 class="home-card-1ptd-4td__card__title">Titular<br> Rubik Regular</h3>
                         </div>
                         <div class="home-card-1ptd-4td__card__bottom">
                             <p class="home-card-1ptd-4td__card__text">Rubik<br> Bold 26 #ffffff</p>
                         </div>
                     </a>
                 </div>
                 <div class="home-card-1ptd-4td__wrapper">
                     <a href="#" class="home-card-1ptd-4td__card">
                         <div class="home-card-1ptd-4td__card__top">
                             <h4 class="home-card-1ptd-4td__card__subtitle">Rubik Regular 10</h4>
                             <h3 class="home-card-1ptd-4td__card__title">Titular<br> Rubik Regular<br> 20 #ffffff</h3>
                         </div>
                         <div class="home-card-1ptd-4td__card__bottom">
                             <p class="home-card-1ptd-4td__card__text">Rubik<br> Bold 16 #ffffff</p>
                             <span class="home-card-1ptd-4td__card__arrow"></span>
                         </div>
                     </a>
                     <a href="#" class="home-card-1ptd-4td__card">
                         <div class="home-card-1ptd-4td__card__top">
                             <h4 class="home-card-1ptd-4td__card__subtitle">Rubik Regular 10</h4>
                             <h3 class="home-card-1ptd-4td__card__title">Titular<br> Rubik Regular<br> 20 #ffffff</h3>
                         </div>
                         <div class="home-card-1ptd-4td__card__bottom">
                             <p class="home-card-1ptd-4td__card__text">Rubik<br> Bold 16 #ffffff</p>
                             <span class="home-card-1ptd-4td__card__arrow"></span>
                         </div>
                     </a>
                     <a href="#" class="home-card-1ptd-4td__card">
                         <div class="home-card-1ptd-4td__card__top">
                             <h4 class="home-card-1ptd-4td__card__subtitle">Rubik Regular 10</h4>
                             <h3 class="home-card-1ptd-4td__card__title">Titular<br> Rubik Regular<br> 20 #ffffff</h3>
                         </div>
                         <div class="home-card-1ptd-4td__card__bottom">
                             <p class="home-card-1ptd-4td__card__text">Rubik<br> Bold 16 #ffffff</p>
                             <span class="home-card-1ptd-4td__card__arrow"></span>
                         </div>
                     </a>
                     <a href="#" class="home-card-1ptd-4td__card">
                         <div class="home-card-1ptd-4td__card__top">
                             <h4 class="home-card-1ptd-4td__card__subtitle">Rubik Regular 10</h4>
                             <h3 class="home-card-1ptd-4td__card__title">Titular<br> Rubik Regular<br> 20 #ffffff</h3>
                         </div>
                         <div class="home-card-1ptd-4td__card__bottom">
                             <p class="home-card-1ptd-4td__card__text">Rubik<br> Bold 16 #ffffff</p>
                             <span class="home-card-1ptd-4td__card__arrow"></span>
                         </div>
                     </a>
                 </div>
             </section>
             <section class="home-events">
                 <a href="#" class="home-events__link">
                     <div class="home-events__date">
                         <span class="home-events__date__text">Mie</span>
                         <span class="home-events__date__number">03</span>
                     </div>
                     <span class="home-events__link__text">Costos para la toma de decisiones</span>
                 </a>
                 <a href="#" class="home-events__link">
                     <div class="home-events__date">
                         <span class="home-events__date__text">Mie</span>
                         <span class="home-events__date__number">03</span>
                     </div>
                     <span class="home-events__link__text">Costos para la toma de decisiones</span>
                 </a>
                 <a href="#" class="home-events__link">
                     <div class="home-events__date">
                         <span class="home-events__date__text">Mie</span>
                         <span class="home-events__date__number">03</span>
                     </div>
                     <span class="home-events__link__text">Costos para la toma de decisiones</span>
                 </a>
                 <a href="#" class="home-events__link">
                     <div class="home-events__date">
                         <span class="home-events__date__text">Mie</span>
                         <span class="home-events__date__number">03</span>
                     </div>
                     <span class="home-events__link__text">Costos para la toma de decisiones</span>
                 </a>
             </section>
             <div class="banner banner--home-1">
                 <img src="http://via.placeholder.com/1089x93?text=Banner+Publicidad" alt="">
             </div>
        </div>


    @endif


</section>
