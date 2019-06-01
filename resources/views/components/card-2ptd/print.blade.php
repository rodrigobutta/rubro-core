<div class="component component-card-2ptd" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->title) || has($fields->subtitle) || has($fields->image))

        <div class="component-card-2ptd__wrapper">
            <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}"  class="component-card-2ptd__card component-card-2ptd__card--highlighted" style="background-image: url('{{Resizer::widen(900,gg($fields->image,''))}}');">
                <div class="component-card-2ptd__card__top">
                    <h4 class="component-card-2ptd__card__subtitle">{{ $fields->appendix or '' }}</h4>
                    <h3 class="component-card-2ptd__card__title">{!! field($fields->title, '') !!}</h3>
                </div>
                <div class="component-card-2ptd__card__bottom">
                    <p class="component-card-2ptd__card__text">{!! field($fields->subtitle, '') !!}</p>
                </div>
            </a>
        </div>
        <div class="component-card-2ptd__wrapper">
            <a href="{{ getLink($fields->link2) }}" target="{{ gg($fields->blank2)==1?'_blank':'_self' }}"  class="component-card-2ptd__card component-card-2ptd__card--highlighted" style="background-image: url('{{Resizer::widen(900,gg($fields->image2,''))}}');">
                <div class="component-card-2ptd__card__top">
                    <h4 class="component-card-2ptd__card__subtitle">{{ $fields->appendix2 or '' }}</h4>
                    <h3 class="component-card-2ptd__card__title">{!! field($fields->title2, '') !!}</h3>
                </div>
                <div class="component-card-2ptd__card__bottom">
                    <p class="component-card-2ptd__card__text">{!! field($fields->subtitle2, '') !!}</p>
                </div>
            </a>
        </div>

    @else

        <div class="component-card-2ptd__wrapper">
            <a href="#" class="component-card-2ptd__card component-card-2ptd__card--highlighted" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');">
                <div class="component-card-2ptd__card__top">
                    <h4 class="component-card-2ptd__card__subtitle">Rubik Regular 10</h4>
                    <h3 class="component-card-2ptd__card__title">Titular<br> Rubik Regular<br> 40 #ffffff</h3>
                </div>
                <div class="component-card-2ptd__card__bottom">
                    <p class="component-card-2ptd__card__text">Rubik<br> Bold 26 #ffffff</p>
                </div>
            </a>
        </div>
        <div class="component-card-2ptd__wrapper">
            <a href="#" class="component-card-2ptd__card component-card-2ptd__card--highlighted" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');">
                <div class="component-card-2ptd__card__top">
                    <h4 class="component-card-2ptd__card__subtitle">Rubik Regular 10</h4>
                    <h3 class="component-card-2ptd__card__title">Titular<br> Rubik Regular<br> 40 #ffffff</h3>
                </div>
                <div class="component-card-2ptd__card__bottom">
                    <p class="component-card-2ptd__card__text">Rubik<br> Bold 26 #ffffff</p>
                </div>
            </a>
        </div>

    @endif


</div>