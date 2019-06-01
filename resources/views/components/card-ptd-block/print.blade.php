<section class="component component-card-ptd-block" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->title) || has($fields->subtitle) || has($fields->image))

        <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="component-card-ptd-block__card">
            <div style="background-image: url({{Resizer::widen(400,gg($fields->image,''))}})" alt="" class="component-card-ptd-block__card__img"></div>
            <div class="component-card-ptd-block__card__description">
                <h3 class="component-card-ptd-block__card__title">{!! field($fields->title, '') !!}</h3>
                <p class="component-card-ptd-block__card__text">{!! field($fields->subtitle, '') !!}</p>
            </div>
        </a>

        @if(has($fields->title2))
        <a href="{{ getLink($fields->link2) }}" target="{{ gg($fields->blank2)==1?'_blank':'_self' }}" class="component-card-ptd-block__card">
            <div style="background-image: url({{Resizer::widen(400,gg($fields->image2,''))}})" alt="" class="component-card-ptd-block__card__img"></div>
            <div class="component-card-ptd-block__card__description">
                <h3 class="component-card-ptd-block__card__title">{!! field($fields->title2, '') !!}</h3>
                <p class="component-card-ptd-block__card__text">{!! field($fields->subtitle2, '') !!}</p>
            </div>
        </a>
        @endif

        @if(has($fields->title3))
        <a href="{{ getLink($fields->link3) }}" target="{{ gg($fields->blank3)==1?'_blank':'_self' }}" class="component-card-ptd-block__card">
            <div style="background-image: url({{Resizer::widen(400,gg($fields->image3,''))}})" alt="" class="component-card-ptd-block__card__img"></div>
            <div class="component-card-ptd-block__card__description">
                <h3 class="component-card-ptd-block__card__title">{!! field($fields->title3, '') !!}</h3>
                <p class="component-card-ptd-block__card__text">{!! field($fields->subtitle3, '') !!}</p>
            </div>
        </a>
        @endif

    @else

        <a href="#" class="component-card-ptd-block__card">
            <div style="background-image: url(http://clientes.agenciaego.com.ar/Consejo/dummy.gif)" alt="" class="component-card-ptd-block__card__img"></div>
            <div class="component-card-ptd-block__card__description">
                <h3 class="component-card-ptd-block__card__title">Rubik Medium 22 #464646</h3>
                <p class="component-card-ptd-block__card__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
            </div>
        </a>
        <a href="#" class="component-card-ptd-block__card">
            <div style="background-image: url(http://clientes.agenciaego.com.ar/Consejo/dummy.gif)" alt="" class="component-card-ptd-block__card__img"></div>
            <div class="component-card-ptd-block__card__description">
                <h3 class="component-card-ptd-block__card__title">Rubik Medium 22 #464646</h3>
                <p class="component-card-ptd-block__card__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
            </div>
        </a>
        <a href="#" class="component-card-ptd-block__card">
            <div style="background-image: url(http://clientes.agenciaego.com.ar/Consejo/dummy.gif)" alt="" class="component-card-ptd-block__card__img"></div>
            <div class="component-card-ptd-block__card__description">
                <h3 class="component-card-ptd-block__card__title">Rubik Medium 22 #464646</h3>
                <p class="component-card-ptd-block__card__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
            </div>
        </a>

    @endif

</section>
