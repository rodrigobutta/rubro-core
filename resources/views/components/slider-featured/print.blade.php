<section class="component component-slider-featured js-slider-featured" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)

        @foreach($fields->list as $i)

            <div class="component-slider-featured__item" style="background-image: url('{{Resizer::widen(900,gg($i->fields->image,''))}}')">
                <div class="component-slider-featured__item__description">
                    <h3 class="component-slider-featured__item__title">{!! field($i->fields->title, '') !!}</h3>
                    <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="component-slider-featured__item__link">
                        <span class="component-slider-featured__item__link__text">{{$i->fields->cta or ''}}</span>
                        <span class="component-slider-featured__item__link__arrow"></span>
                    </a>
                </div>
            </div>

        @endforeach

    @else

        <div class="component-slider-featured__item" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')">
            <div class="component-slider-featured__item__description">
                <h3 class="component-slider-featured__item__title">Titular<br/> Rubik Regular<br/> 49 #ffffff</h3>
                <a href="#" class="component-slider-featured__item__link">
                    <span class="component-slider-featured__item__link__text">Leer mas</span>
                    <span class="component-slider-featured__item__link__arrow"></span>
                </a>
            </div>
        </div>
        <div class="component-slider-featured__item" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')">
            <div class="component-slider-featured__item__description">
                <h3 class="component-slider-featured__item__title">Titular<br/> Rubik Regular<br/> 49 #ffffff</h3>
                <a href="#" class="component-slider-featured__item__link">
                    <span class="component-slider-featured__item__link__text">Leer mas</span>
                    <span class="component-slider-featured__item__link__arrow"></span>
                </a>
            </div>
        </div>
        <div class="component-slider-featured__item" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')">
            <div class="component-slider-featured__item__description">
                <h3 class="component-slider-featured__item__title">Titular<br/> Rubik Regular<br/> 49 #ffffff</h3>
                <a href="#" class="component-slider-featured__item__link">
                    <span class="component-slider-featured__item__link__text">Leer mas</span>
                    <span class="component-slider-featured__item__link__arrow"></span>
                </a>
            </div>
        </div>

    @endif


</section>

<script>
    $('.js-slider-featured[data-content-id="{{$id}}"]').slick();
</script>