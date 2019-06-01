<section class="component component component-card-itda @isset($fields->list){!! (count($fields->list) == 3) ? '-grow' : '' !!}@endif" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)

        @foreach($fields->list as $i)

            <div class="component-card-itda__card">
                <img src="{{Resizer::widen(80,gg($i->fields->image,''))}}" alt="" class="component-card-itda__card__icon">
                <h3 class="component-card-itda__card__title">{{$i->fields->name or ''}}</h3>
                <div class="component-card-itda__card__content">{!! field($i->fields->description, '') !!}</div>
                @if(isset($i->fields->link) && $i->fields->link != '')
                <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="component-card-itda__card__link">
                    <span class="component-card-itda__card__link__text">{{$i->fields->cta or 'Ver'}}</span>
                    <i class="btn--arrow-right__icon component-card-itda__card__link__arrow"></i>
                </a>
                @endif
            </div>

        @endforeach

    @else

        <div class="component-card-itda__card">
            <img src="./images/icons/4.png" alt="" class="component-card-itda__card__icon">
            <h3 class="component-card-itda__card__title">Rubik Regular 30</h3>
            <div class="component-card-itda__card__content">
                <ul>
                    <li>Seleccionar área y tema de consulta.</li>
                    <li>Seleccionar área y tema de consulta.</li>
                    <li>Seleccionar área y tema de consulta.</li>
                    <li>Seleccionar área y tema de consulta.</li>
                </ul>
            </div>
            <a href="#" class="component-card-itda__card__link">
                <span class="component-card-itda__card__link__text">Ver areas</span>
                <i class="btn--arrow-right__icon component-card-itda__card__link__arrow"></i>
            </a>
        </div>
        <div class="component-card-itda__card">
            <img src="./images/icons/4.png" alt="" class="component-card-itda__card__icon">
            <h3 class="component-card-itda__card__title">Rubik Regular 30</h3>
            <div class="component-card-itda__card__content">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex aut voluptatum unde esse animi ut atque ea praesentium.</p>
            </div>
            <a href="#" class="component-card-itda__card__link">
                <span class="component-card-itda__card__link__text">Ver areas</span>
                <i class="btn--arrow-right__icon component-card-itda__card__link__arrow"></i>
            </a>
        </div>
        <div class="component-card-itda__card">
            <img src="./images/icons/4.png" alt="" class="component-card-itda__card__icon">
            <h3 class="component-card-itda__card__title">Rubik Regular 30</h3>
            <div class="component-card-itda__card__content">
                <ul>
                    <li>Seleccionar área y tema de consulta.</li>
                    <li>Seleccionar área y tema de consulta.</li>
                    <li>Seleccionar área y tema de consulta.</li>
                    <li>Seleccionar área y tema de consulta.</li>
                </ul>
            </div>
        </div>

    @endif

</section>