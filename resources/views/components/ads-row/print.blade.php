<section class="component component-ads-row" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
        
    @if(gg($fields->home)==1)
    <div class="container">
    @endif


    @isset($fields->list)
        @foreach($fields->list as $i)
            <a href="{{$i->fields->link}}" target="{{$i->fields->blank}}" class="component-ads-row__card">                
                @isset($i->fields->image)
                    <img src="{{Resizer::widen(1920,$i->fields->image)}}" alt="{!! field($i->fields->alt, '') !!}" class="component-ads-row__card__image">
                @endisset
            </a>
        @endforeach
    @else

        <a href="" class="component-ads-row__card">
            <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-ads-row__card__image">
        </a>
        <a href="" class="component-ads-row__card">
            <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-ads-row__card__image">
        </a>
        <a href="" class="component-ads-row__card">
            <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-ads-row__card__image">
        </a>

    @endif

        
    @if(gg($fields->home)==1)
    </div>
    @endif



</section>
