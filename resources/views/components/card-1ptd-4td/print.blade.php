<section class="component component-card-1ptd-4td" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')


    @if(has($fields->title) || has($fields->subtitle) || has($fields->image))

        <div class="component-card-1ptd-4td__wrapper">
            <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="component-card-1ptd-4td__card component-card-1ptd-4td__card--highlighted" style="background-image: url('{{Resizer::widen(900,gg($fields->image,''))}}');">
                <div class="component-card-1ptd-4td__card__top">
                    <h4 class="component-card-1ptd-4td__card__subtitle">{{ $fields->appendix or '' }}</h4>
                    <h3 class="component-card-1ptd-4td__card__title">{!! field($fields->title, '') !!}</h3>
                </div>
                <div class="component-card-1ptd-4td__card__bottom">
                    <p class="component-card-1ptd-4td__card__text">{!! field($fields->subtitle, '') !!}</p>
                </div>
            </a>
        </div>
        <div class="component-card-1ptd-4td__wrapper">
            <a href="{{ getLink($fields->link2) }}" target="{{ gg($fields->blank2)==1?'_blank':'_self' }}" class="component-card-1ptd-4td__card">
                <div class="component-card-1ptd-4td__card__top">
                    <h4 class="component-card-1ptd-4td__card__subtitle">{{ $fields->appendix2 or '' }}</h4>
                    <h3 class="component-card-1ptd-4td__card__title">{!! field($fields->title2, '') !!}</h3>
                </div>
                <div class="component-card-1ptd-4td__card__bottom">
                    <p class="component-card-1ptd-4td__card__text">{!! field($fields->subtitle2, '') !!}</p>
                    <i class="btn--arrow-right__icon component-card-1ptd-4td__card__arrow"></i>
                </div>
            </a>
            <a href="{{ getLink($fields->link3) }}" target="{{ gg($fields->blank3)==1?'_blank':'_self' }}" class="component-card-1ptd-4td__card">
                <div class="component-card-1ptd-4td__card__top">
                    <h4 class="component-card-1ptd-4td__card__subtitle">{{ $fields->appendix3 or '' }}</h4>
                    <h3 class="component-card-1ptd-4td__card__title">{!! field($fields->title3, '') !!}</h3>
                </div>
                <div class="component-card-1ptd-4td__card__bottom">
                    <p class="component-card-1ptd-4td__card__text">{!! field($fields->subtitle3, '') !!}</p>
                    <i class="btn--arrow-right__icon component-card-1ptd-4td__card__arrow"></i>
                </div>
            </a>
            <a href="{{ getLink($fields->link4) }}" target="{{ gg($fields->blank4)==1?'_blank':'_self' }}" class="component-card-1ptd-4td__card">
                <div class="component-card-1ptd-4td__card__top">
                    <h4 class="component-card-1ptd-4td__card__subtitle">{{ $fields->appendix4 or '' }}</h4>
                    <h3 class="component-card-1ptd-4td__card__title">{!! field($fields->title4, '') !!}</h3>
                </div>
                <div class="component-card-1ptd-4td__card__bottom">
                    <p class="component-card-1ptd-4td__card__text">{!! field($fields->subtitle4, '') !!}</p>
                    <i class="btn--arrow-right__icon component-card-1ptd-4td__card__arrow"></i>
                </div>
            </a>
            <a href="{{ getLink($fields->link5) }}" target="{{ gg($fields->blank5)==1?'_blank':'_self' }}" class="component-card-1ptd-4td__card">
                <div class="component-card-1ptd-4td__card__top">
                    <h4 class="component-card-1ptd-4td__card__subtitle">{{ $fields->appendix5 or '' }}</h4>
                    <h3 class="component-card-1ptd-4td__card__title">{!! field($fields->title5, '') !!}</h3>
                </div>
                <div class="component-card-1ptd-4td__card__bottom">
                    <p class="component-card-1ptd-4td__card__text">{!! field($fields->subtitle5, '') !!}</p>
                    <i class="btn--arrow-right__icon component-card-1ptd-4td__card__arrow"></i>
                </div>
            </a>
        </div>

    @else

        <div class="component-card-1ptd-4td__wrapper">
             <a href="#" class="component-card-1ptd-4td__card component-card-1ptd-4td__card--highlighted" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');">
                 <div class="component-card-1ptd-4td__card__top">
                     <h4 class="component-card-1ptd-4td__card__subtitle">Rubik Regular 10</h4>
                     <h3 class="component-card-1ptd-4td__card__title">Titular<br> Rubik Regular<br> 40 #ffffff</h3>
                 </div>
                 <div class="component-card-1ptd-4td__card__bottom">
                     <p class="component-card-1ptd-4td__card__text">Rubik<br> Bold 26 #ffffff</p>
                 </div>
             </a>
         </div>
         <div class="component-card-1ptd-4td__wrapper">
             <a href="#" class="component-card-1ptd-4td__card">
                 <div class="component-card-1ptd-4td__card__top">
                     <h4 class="component-card-1ptd-4td__card__subtitle">Rubik Regular 10</h4>
                     <h3 class="component-card-1ptd-4td__card__title">Titular<br> Rubik Regular<br> 20 #ffffff</h3>
                 </div>
                 <div class="component-card-1ptd-4td__card__bottom">
                     <p class="component-card-1ptd-4td__card__text">Rubik<br> Bold 16 #ffffff</p>
                     <span class="component-card-1ptd-4td__card__arrow"></span>
                 </div>
             </a>
             <a href="#" class="component-card-1ptd-4td__card">
                 <div class="component-card-1ptd-4td__card__top">
                     <h4 class="component-card-1ptd-4td__card__subtitle">Rubik Regular 10</h4>
                     <h3 class="component-card-1ptd-4td__card__title">Titular<br> Rubik Regular<br> 20 #ffffff</h3>
                 </div>
                 <div class="component-card-1ptd-4td__card__bottom">
                     <p class="component-card-1ptd-4td__card__text">Rubik<br> Bold 16 #ffffff</p>
                     <span class="component-card-1ptd-4td__card__arrow"></span>
                 </div>
             </a>
             <a href="#" class="component-card-1ptd-4td__card">
                 <div class="component-card-1ptd-4td__card__top">
                     <h4 class="component-card-1ptd-4td__card__subtitle">Rubik Regular 10</h4>
                     <h3 class="component-card-1ptd-4td__card__title">Titular<br> Rubik Regular<br> 20 #ffffff</h3>
                 </div>
                 <div class="component-card-1ptd-4td__card__bottom">
                     <p class="component-card-1ptd-4td__card__text">Rubik<br> Bold 16 #ffffff</p>
                     <span class="component-card-1ptd-4td__card__arrow"></span>
                 </div>
             </a>
             <a href="#" class="component-card-1ptd-4td__card">
                 <div class="component-card-1ptd-4td__card__top">
                     <h4 class="component-card-1ptd-4td__card__subtitle">Rubik Regular 10</h4>
                     <h3 class="component-card-1ptd-4td__card__title">Titular<br> Rubik Regular<br> 20 #ffffff</h3>
                 </div>
                 <div class="component-card-1ptd-4td__card__bottom">
                     <p class="component-card-1ptd-4td__card__text">Rubik<br> Bold 16 #ffffff</p>
                     <span class="component-card-1ptd-4td__card__arrow"></span>
                 </div>
             </a>
         </div>

    @endif


</section>
