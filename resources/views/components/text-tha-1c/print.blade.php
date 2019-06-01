<div class="component component-text-tha-1c" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->title) || has($fields->description))

        <div class="component-text-tha-1c__container">
            <h3 class="component-text-tha-1c__title">{!! field($fields->title, '') !!}</h3>
            <p class="component-text-tha-1c__text">{!! field($fields->description, '') !!}</p>
            <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="btn btn--arrow-right component-text-tha-1c__link">
                <span class="component-text-tha-1c__link__text">{{ $fields->cta or '' }}</span>
                <i class="btn--arrow-right__icon component-text-tha-1c__link__arrow"></i>
            </a>
        </div>

    @else

        <div class="component-text-tha-1c__container">
            <h3 class="component-text-tha-1c__title">Texto del título</h3>
            <p class="component-text-tha-1c__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            <a href="#" class="btn btn--arrow-right">Etiqueta de link
                <i class="btn--arrow-right__icon"></i>
            </a>
        </div>

    @endif

</div>
