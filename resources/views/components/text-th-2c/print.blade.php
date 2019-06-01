<div class="component component-text-th-2c" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->title) || has($fields->body) || has($fields->body2))

        @if(has($fields->title))
            <h3 class="component-text-th-2c__title">{!! field($fields->title, '') !!}</h3>
        @endif

        @if(has($fields->body))
            <div class="component-text-th-2c__div">{!! field($fields->body, '') !!}
            @if(has($fields->link))
                <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="component-text-th-2c__link btn btn--arrow-right">
                    <span class="component-text-th-2c__link__text">{{ $fields->cta }}</span>
                    <i class="component-text-th-2c__link__arrow btn--arrow-right__icon"></i>
                </a>
            @endif
            </div>
        @endif

        @if(has($fields->body2))
            <div class="component-text-th-2c__div">{!! field($fields->body2, '') !!}
            @if(has($fields->link2))
                <a href="{{ getLink($fields->link2) }}" target="{{ gg($fields->blank2)==1?'_blank':'_self' }}" class="component-text-th-2c__link btn btn--arrow-right">
                    <span class="component-text-th-2c__link__text">{{ $fields->cta2 }}</span>
                    <i class="component-text-th-2c__link__arrow btn--arrow-right__icon"></i>
                </a>
            @endif
            </div>
        @endif

    @else

        <h3 class="component-text-th-2c__title">Título</h3>
        <div class="component-text-th-2c__div"><strong>Columna 1</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        <a href="#" class="btn btn--arrow-right">Etiqueta de link
            <i class="btn--arrow-right__icon"></i>
        </a>
        </div>
        <div class="component-text-th-2c__div"><strong>Columna 2</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        <a href="#" class="btn btn--arrow-right">Etiqueta de link
            <i class="btn--arrow-right__icon"></i>
        </a>
        </div>

    @endif

</div>
