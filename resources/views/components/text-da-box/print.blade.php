<div class="component component-text-da-box" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    <div class="component-text-da-box__container">
    
    @if(has($fields->description) || has($fields->attach))

        <div class="component-text-da-box__text">{!! field($fields->description, '') !!}</div>
        <a href="{{$fields->attach or '#'}}" target="_blank" class="btn-ti-borderless">Descargar PDF</i>
        </a>

    @else

        <p class="component-text-da-box__text">Términos y condiciones de la utilización del servicio de asesoramiento gratuito</p>
        <a href="#" target="_blank" class="btn-ti-borderless">Descargar PDF</a>

    @endif
    </div>
</div>
