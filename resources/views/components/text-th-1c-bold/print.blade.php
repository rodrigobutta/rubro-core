<div class="component component-text-th-1c-bold" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->title) || has($fields->body))

        <div class="component-text-th-1c-bold__container">
            @if(has($fields->title))
                <h3 class="component-text-th-1c-bold__title">{!! field($fields->title, '') !!}</h3>
            @endif
            @if(has($fields->body))
                <div class="component-text-th-1c-bold__text">{!! field($fields->body, '') !!}</div>
            @endif
        </div>

    @else

        <div class="component-text-th-1c-bold__container">
            <h3 class="component-text-th-1c-bold__title">Misión</h3>
            <div class="component-text-th-1c-bold__text">Jerarquizar nuestras profesiones en un marco ético y técnico, desarrollando y cumpliendo con las previsiones legales y técnicas que regulan nuestro accionar y garantizando una mejora continua en todas las áreas de desarrollo profesional y personal, aportando al bienestar de la sociedad.</div>
        </div>

    @endif

</div>
