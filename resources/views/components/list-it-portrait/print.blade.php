<section class="component component-list-it-portrait" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)
        <ul class="component-list-it-portrait__container">
            @foreach($fields->list as $i)

                <li class="component-list-it-portrait__item">
                    <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="component-list-it-portrait__link">
                        <i style="background:url('{{Resizer::widen(600,gg($i->fields->image,''))}}') no-repeat center;background-size:contain;" class="component-list-it-portrait__icon"></i>
                        <p class="component-list-it-portrait__text">{!! field($i->fields->name, '') !!}</p>
                    </a>
                </li>

            @endforeach
        </ul>
    @else


        <ul class="component-list-it-portrait__container">
            <li class="component-list-it-portrait__item">
                <a href="#" class="component-list-it-portrait__link">
                    <i style="background:url(images/i_list-it-portrait_01.png) no-repeat center;background-size:contain;" class="component-list-it-portrait__icon"></i>
                    <p class="component-list-it-portrait__text">Rubik-Medium 25 #565655</p>
                </a>
            </li>
            <li class="component-list-it-portrait__item">
                <a href="#" class="component-list-it-portrait__link">
                    <i style="background:url(images/i_list-it-portrait_02.png) no-repeat center;background-size:contain;" class="component-list-it-portrait__icon"></i>                    <p class="component-list-it-portrait__text">Rubik-Medium 25 #565655</p>
                </a>
            </li>
            <li class="component-list-it-portrait__item">
                <a href="#" class="component-list-it-portrait__link">
                    <i style="background:url(images/i_list-it-portrait_03.png) no-repeat center;background-size:contain;" class="component-list-it-portrait__icon"></i>                    <p class="component-list-it-portrait__text">Rubik-Medium 25 #565655</p>
                </a>
            </li>
            <li class="component-list-it-portrait__item">
                <a href="#" class="component-list-it-portrait__link">
                    <i style="background:url(images/i_list-it-portrait_04.png) no-repeat center;background-size:contain;" class="component-list-it-portrait__icon"></i>                    <p class="component-list-it-portrait__text">Rubik-Medium 25 #565655</p>
                </a>
            </li>
        </ul>

    @endif



</section>
