<section class="component component-image" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->image)

        @if(has($fields->link))
        <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="component-image__wrapper">
            <img class="component-image__img" src="{{Resizer::widen(1920,gg($fields->image,''))}}" alt="{{$fields->alt or ''}}">
            <figcaption>{{$fields->alt or ''}}</figcaption>
        </a>
        @else
            <div class="component-image__wrapper">
                <img class="component-image__img" src="{{Resizer::widen(1920,gg($fields->image,''))}}" alt="{{$fields->alt or ''}}">
                <figcaption>{{$fields->alt or ''}}</figcaption>
            </div>
        @endif

    @else

        <div class="component-image__wrapper">
            <img class="component-image__img" src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="">
            <figcaption>Epígrafe</figcaption>
        </div>

    @endif
</section>
