<section class="component component-iframe" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    @isset($fields->url)

        <iframe src="{{ $fields->url }}" style="zoom:1" width="99.6%" height="{{ $fields->height }}" frameborder="0"></iframe>

    @else

        <div class="alert alert-warning alert-dismissable" role="alert">
            <h3 class="alert-heading font-size-h4 font-w400">IFRAME</h3>
            <p class="mb-0">Debe indicar la URL a la que va a apuntar el IFRAME y el alto en pixeles que va a tener el contenedor. <a class="btn-edit" href="javascript:void(0)">Configurar</a>!</p>
        </div>

    @endif
</section>