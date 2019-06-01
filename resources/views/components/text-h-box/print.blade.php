<div class="component component-text-h-box" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    <div class="component-text-h-box__container">

    @if(has($fields->description))

        <div class="component-text-h-box__text">{!! field($fields->description, '') !!}</div>

    @else

        <p class="component-text-h-box__text">Conforme surge del Reglamento de Matrículas vigente (Res. C.D. 133/01 y sus modificaciones) en su Art. 23, los profesionales deberán contar con el pago del derecho de ejercicio profesional al día a los efectos de poder acceder a los servicios del Consejo.</p>

    @endif

    </div>
</div>
