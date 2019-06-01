<section class="component component-list-a" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)
        <ul class="component-list-a__container">
            @foreach($fields->list as $i)
                <li class="component-list-a__item">
                    <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}"  class="component-list-a__link">{!! field($i->fields->name, '') !!}</a>
                </li>
            @endforeach
        </ul>
    @else

        <ul class="component-list-a__container">
             <li class="component-list-a__item">
                 <a href="#" class="component-list-a__link">Rubik-Bold 16 line-height 21</a>
             </li>
             <li class="component-list-a__item">
                 <a href="#" class="component-list-a__link">Rubik-Bold 16 line-height 21</a>
             </li>
             <li class="component-list-a__item">
                 <a href="#" class="component-list-a__link">Rubik-Bold 16 line-height 21</a>
             </li>
        </ul>

    @endif

</section>

