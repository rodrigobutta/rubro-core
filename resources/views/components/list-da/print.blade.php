<section class="component component-list-da" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)
        <ul class="component-list-da__container">
            @foreach($fields->list as $i)
                <li class="component-list-da__item">
                    <p class="component-list-da__text">{!! field($i->fields->name, '') !!}</p>
                    <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="btn btn--arrow-right">{{$i->fields->cta or ''}} <i class="btn--arrow-right__icon"></i>
                    </a>
                </li>
            @endforeach
        </ul>
    @else

        <ul class="component-list-da__container">
            <li class="component-list-da__item">
                <p class="component-list-da__text">Rubik-Regular 16 line-height 21 #464646</p>
                <a href="#" class="btn btn--arrow-right">Ver más <i class="btn--arrow-right__icon"></i>
                </a>
            </li>
            <li class="component-list-da__item">
                <p class="component-list-da__text">Rubik-Regular 16 line-height 21 #464646</p>
                <a href="#" class="btn btn--arrow-right">Ver más
                    <i class="btn--arrow-right__icon"></i>
                </a>
            </li>
            <li class="component-list-da__item">
                <p class="component-list-da__text">Rubik-Regular 16 line-height 21 #464646</p>
                <a href="#" class="btn btn--arrow-right">Ver más
                    <i class="btn--arrow-right__icon"></i>
                </a>
            </li>
        </ul>

    @endif


</section>
