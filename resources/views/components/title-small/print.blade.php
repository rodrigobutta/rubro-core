<div class="component component-title-small" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->title))

        <h3 class="component-title-small__text">{!! field($fields->title, 'Título sin cargar') !!}</h3>

    @else

        <h3 class="component-title-small__text">Más noticias</h3>

    @endif

</div>
