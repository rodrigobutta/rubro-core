<div class="component component-title" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    @if(has($fields->title))

        <h2 class="component-title__text"><span class="component-title__text__span">{{ $fields->title or 'Título sin cargar' }}</span></h2>

        @if(has($fields->cta))
            <a href="{{ getLink($fields->link) }}"  target="{{ gg($fields->blank)==1?'_blank':'_self' }}"  class="component-title__link">
                <span class="component-title__link__text">{{ $fields->cta or '' }}</span>
                <i class="btn--arrow-right__icon component-title__link__arrow"></i>
            </a>
        @endif

    @else

        <h2 class="component-title__text"><span class="component-title__text__span">Este es algún título</span></h2>
       <a href="#" class="component-title__link">
           <span class="component-title__link__text">Conoce todos los Servicios</span>
           <i class="btn--arrow-right__icon component-title__link__arrow"></i>
       </a>

    @endif

</div>