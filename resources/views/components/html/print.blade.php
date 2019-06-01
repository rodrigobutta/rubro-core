<section class="component component-html" data-component="" data-content-id="{{$id}}">    
    @include('admin.master.component.common')

    @isset($fields->html)

        {!! $fields->html !!}
            
    @else

        <div class="alert alert-warning alert-dismissable" role="alert">
            <h3 class="alert-heading font-size-h4 font-w400">HTML</h3>
            <p class="mb-0">No se cargo el HTML a ingresar en esta posición. <a class="btn-edit" href="javascript:void(0)">Cargar HTML</a>!</p>
        </div>

    @endisset
</section>