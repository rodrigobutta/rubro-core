

<section class="component component-ads-row-dynamic" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

        
    @if(gg($fields->home)==1)
    <div class="container">
    @endif

    @isset($fields->list)
        @foreach($fields->list as $i)
            @php
            $slot = AdSlots::getDisplayData($i->fields->uuid);
            @endphp

            @if($slot)
                <a href="{{ $slot->url }}" target="{{ $slot->target }}" class="component-ads-row__card" onClick="triggerAnalyticsEvent('{{$slot->campaign_analytics}}', '{{$slot->slot_analytics}}', 'click')">
                    @isset($slot->desktop_image)
                        <img src="{{Resizer::widen(1920,$slot->desktop_image)}}" alt="{!! field($i->fields->alt, '') !!}" class="component-ads-row__card__image desktop">
                    @endisset
                    @isset($slot->mobile_image)
                        <img src="{{Resizer::widen(1920,$slot->mobile_image)}}" alt="{!! field($i->fields->alt, '') !!}" class="component-ads-row__card__image mobile">
                    @endisset
                </a>
                
                {{-- Esto manda un script al fondo de la pagina que envia el evento --}}
                @push('end_scripts')
                    <script>triggerAnalyticsEvent('{{$slot->campaign_analytics}}', '{{$slot->slot_analytics}}', 'print')</script>
                @endpush

            @else
                @isset($editMode)
                <a href="" class="component-ads-row__card">
                    <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-ads-row__card__image">
                </a>
                @endisset
            @endif
            
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
