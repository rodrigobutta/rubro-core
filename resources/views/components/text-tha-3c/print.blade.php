<div class="component component-tha-3c" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->title) || has($fields->body) || has($fields->body2) || has($fields->body3))

        @if(has($fields->title))
            <h3 class="component-tha-3c__title">{!! field($fields->title, '') !!}</h3>
        @endif

        <div class="component-tha-3c__container">

            <div class="component-tha-3c__col">{!! field($fields->body, '') !!}</div>
            <div class="component-tha-3c__col">{!! field($fields->body2, '') !!}</div>
            <div class="component-tha-3c__col">{!! field($fields->body3, '') !!}</div>

            @if(isset($fields->cta) && $fields->cta!='')

                <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="btn btn--arrow-right">{{ $fields->cta or '' }}
                    <i class="btn--arrow-right__icon"></i>
                </a>


                <hr>

            @endif

        </div>

    @else

        <h3 class="component-tha-3c__title">Título</h3>
        <div class="component-tha-3c__container">
            <div class="component-tha-3c__col"><strong>Columna 1</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            <div class="component-tha-3c__col"><strong>Columna 2</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            <div class="component-tha-3c__col"><strong>Columna 3</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>

            <a href="#" class="btn btn--arrow-right">Etiqueta del Link
                <i class="btn--arrow-right__icon"></i>
            </a>

            <hr>

        </div>

    @endif


</div>
