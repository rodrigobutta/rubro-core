<section class="component component-card-ptda-phone" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    <div class="component-card-ptda-phone__wrapper" style="background-image: url('{{Resizer::widen(1200,gg($fields->image,''))}}')">
        
        

        @if(has($fields->title) || has($fields->description))

            <div class="component-card-ptda-phone__description">
                <h3 class="component-card-ptda-phone__title">{!! field($fields->title, '') !!}</h3>
                <p class="component-card-ptda-phone__text">{!! field($fields->description, '') !!}</p>
                <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="component-card-ptda-phone__link">
                    <span class="component-card-ptda-phone__link__text">{{ $fields->cta or 'Mas informacion' }}</span>
                    <span class="component-card-ptda-phone__link__arrow"></span>
                </a>
            </div>

        @else

            <div class="component-card-ptda-phone__description">
            <h3 class="component-card-ptda-phone__title">Linea directa Tributaria <strong class="component-card-ptda-phone__title__highlighted">5382-9600</strong></h3>
            <p class="component-card-ptda-phone__text">Atención inmediata de Lunes a Viernes.<br>10:00 hs a 13:00 hs y de 14:00 hs  a 17:00 hs.</p>
            <a href="#" class="component-card-ptda-phone__link">
                <span class="component-card-ptda-phone__link__text">Mas informacion</span>
                <span class="component-card-ptda-phone__link__arrow"></span>
            </a>
        </div>

        @endif

    </div>
</section>
