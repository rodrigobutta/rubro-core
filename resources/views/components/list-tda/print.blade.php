<section class="component component-list-tda" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)
        <ul class="component-list-tda__container">
            @foreach($fields->list as $i)

                <li class="component-list-tda__item">
                    <div class="component-list-tda__content">
                        <h3 class="component-list-tda__title">{!! field($i->fields->name, '') !!}</h3>
                        <p class="component-list-tda__text">{!! field($i->fields->description, '') !!}</p>
                    </div>
                    @if(has($i->fields->link))
                    <a href="{{ getLink($i->fields->link)}}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="btn btn-t">{!! field($i->fields->cta, 'Link') !!}</a>
                    @elseif(has($i->fields->attach))
                        <a href="{{$i->fields->attach or ''}}" target="_blank" class="btn btn-ti">{!! field($i->fields->cta, 'Descarga') !!}</a>
                    @endif
                </li>

            @endforeach
        </ul>
    @else

        <ul class="component-list-tda__container">
            <li class="component-list-tda__item">
                <div class="component-list-tda__content">
                    <h3 class="component-list-tda__title">Rubik-Medium 21 line-height 27 #4b3427</h3>
                    <p class="component-list-tda__text">Rubik-Regular 16 line-height 21 #464646</p>
                </div>
                <a href="#" class="btn-ti">Descarga</a>
            </li>
            <li class="component-list-tda__item">
                <div class="component-list-tda__content">
                    <h3 class="component-list-tda__title">Rubik-Medium 21 line-height 27 #4b3427</h3>
                    <p class="component-list-tda__text">Rubik-Regular 16 line-height 21 #464646</p>
                </div>
                <a href="#" class="btn-ti">Descarga</a>
            </li>
            <li class="component-list-tda__item">
                <div class="component-list-tda__content">
                    <h3 class="component-list-tda__title">Rubik-Medium 21 line-height 27 #4b3427</h3>
                    <p class="component-list-tda__text">Rubik-Regular 16 line-height 21 #464646</p>
                </div>
                <a href="#" class="btn-ti">Descarga</a>
            </li>
            <li class="component-list-tda__item">
                <div class="component-list-tda__content">
                    <h3 class="component-list-tda__title">Rubik-Medium 21 line-height 27 #4b3427</h3>
                    <p class="component-list-tda__text">Rubik-Regular 16 line-height 21 #464646</p>
                </div>
                <a href="#" class="btn-ti">Descarga</a>
            </li>
        </ul>

    @endisset


</section>
