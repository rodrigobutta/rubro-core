<section class="component component-card-ptda-video" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
 
 
    <div class="component-card-ptda-video__wrapper">
 
    @if(has($fields->title) || has($fields->description))

        <div class="component-card-ptda-video__img-wrapper">
            <img src="{{Resizer::widen(800,gg($fields->image,''))}}" alt="" class="component-card-ptda-video__img">
            <h4 class="component-card-ptda-video__live">En vivo</h4>
        </div>
        <div class="component-card-ptda-video__description">
            <h3 class="component-card-ptda-video__title">{!! field($fields->title, '') !!}</h3>
            <p class="component-card-ptda-video__text">{!! field($fields->subtitle, '') !!}</p>
            <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="component-card-ptda-video__link">
                <span class="component-card-ptda-video__link__text">Sintonizalo ahora</span>
                <span class="component-card-ptda-video__link__arrow"></span>
            </a>
        </div>

    @else


        <div class="component-card-ptda-video__img-wrapper">
            <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-card-ptda-video__img">
            <h4 class="component-card-ptda-video__live">En vivo</h4>
        </div>
        <div class="component-card-ptda-video__description">
            <h3 class="component-card-ptda-video__title">Texto del título</h3>
            <p class="component-card-ptda-video__text">Texto del subtítulo</p>
            <a href="#" class="component-card-ptda-video__link">
                <span class="component-card-ptda-video__link__text">Sintonizalo ahora</span>
                <span class="component-card-ptda-video__link__arrow"></span>
            </a>
        </div>


    @endif
    </div>
</section>
