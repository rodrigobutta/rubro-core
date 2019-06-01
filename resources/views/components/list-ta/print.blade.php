<section class="component component-list-ta" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)
        <ul class="component-list-ta__container">
            @foreach($fields->list as $i)
                <li class="component-list-ta__item">
                    <p class="component-list-ta__text">{!! field($i->fields->name, '') !!}</p>
                    @if(has($i->fields->link))
                        <a href="{{ getLink($i->fields->link)}}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="btn btn-t">{!! field($i->fields->cta, 'Link') !!}</a>
                    @elseif(has($i->fields->attach))
                        <a href="{{$i->fields->attach or ''}}" target="_blank" class="btn btn-ti">{!! field($i->fields->cta, 'Descarga') !!}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    @else

        <ul class="component-list-ta__container">
            <li class="component-list-ta__item">
                <p class="component-list-ta__text">Rubik-Medium 21 line-height 28 #4b3427</p>
                <a href="#" class="btn-ti">Descarga</a>
            </li>
            <li class="component-list-ta__item">
                <p class="component-list-ta__text">Rubik-Medium 21 line-height 28 #4b3427</p>
                <a href="#" class="btn-ti">Descarga</a>
            </li>
            <li class="component-list-ta__item">
                <p class="component-list-ta__text">Rubik-Medium 21 line-height 28 #4b3427</p>
                <a href="#" class="btn-t">Link</a>
            </li>
            <li class="component-list-ta__item">
                <p class="component-list-ta__text">Rubik-Medium 21 line-height 28 #4b3427</p>
                <a href="#" class="btn-t">Link</a>
            </li>
        </ul>

    @endisset

</section>
