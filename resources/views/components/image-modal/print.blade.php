<section class="component component-image" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->image)

        <a data-fancybox="{{$id}}" href="{{Resizer::widen(1200,gg($fields->image,''))}}" class="component-image__wrapper">
            <img class="component-image__img" src="{{Resizer::widen(1920,gg($fields->image,''))}}" alt="{{$fields->alt or ''}}">
        </a>

    @else

        <a data-fancybox="gallery" href="http://clientes.agenciaego.com.ar/Consejo/dummy.gif">
            <img class="component-image__img" src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="">
        </a>

    @endif
</section>