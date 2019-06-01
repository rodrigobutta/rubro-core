<div class="component component-text-th-1c-regular" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->title) || has($fields->body))

        <div class="component-text-th-1c-regular__container">
            @if(has($fields->title))
                <h3 class="component-text-th-1c-regular__title">{!! field($fields->title, 'Primer línea del título<br>segunda línea.') !!}</h3>
            @endif
            @if(has($fields->body))
                <div class="component-text-th-1c-regular__text">{!! field($fields->body, 'texto texto texto texto texto texto texto texto texto texto ') !!}</div>
            @endif
        </div>

    @else

        <div class="component-text-th-1c-regular__container">
            <h3 class="component-text-th-1c-regular__title">The standard Lorem Ipsum passage</h3>
            <div class="component-text-th-1c-regular__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
        </div>

    @endif

</div>