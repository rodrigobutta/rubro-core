<section class="component component-list-it-landscape" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)
        <ul class="component-list-it-landscape__container">
            @foreach($fields->list as $i)

                <li class="component-list-it-landscape__item">
                    <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="component-list-it-landscape__link">
                        <i class="component-list-it-landscape__icon" style="background:url('{{Resizer::widen(600,gg($i->fields->image,''))}}') no-repeat center;background-size:contain;"></i>
                        <p class="component-list-it-landscape__text">{!! field($i->fields->name, '') !!}</p>
                    </a>
                </li>

            @endforeach
        </ul>
    @else

        <ul class="component-list-it-landscape__container">
            <li class="component-list-it-landscape__item">
                <a href="#" class="component-list-it-landscape__link">
                    <i class="component-list-it-landscape__icon" style="background:url(images/i_list-it-land_01.png) no-repeat center;background-size:contain;"></i>
                    <p class="component-list-it-landscape__text">Rubik-Bold 16 #565655</p>
                </a>
            </li>
            <li class="component-list-it-landscape__item">
                <a href="#" class="component-list-it-landscape__link">
                    <i class="component-list-it-landscape__icon" style="background:url(images/i_list-it-land_02.png) no-repeat center;background-size:contain;"></i>
                    <p class="component-list-it-landscape__text">Rubik-Bold 16 #565655</p>
                </a>
            </li>
            <li class="component-list-it-landscape__item">
                <a href="#" class="component-list-it-landscape__link">
                    <i class="component-list-it-landscape__icon" style="background:url(images/i_list-it-land_03.png) no-repeat center;background-size:contain;"></i>
                    <p class="component-list-it-landscape__text">Rubik-Bold 16 #565655</p>
                </a>
            </li>
            <li class="component-list-it-landscape__item">
                <a href="#" class="component-list-it-landscape__link">
                    <i class="component-list-it-landscape__icon" style="background:url(images/i_list-it-land_04.png) no-repeat center;background-size:contain;"></i>
                    <p class="component-list-it-landscape__text">Rubik-Bold 16 #565655</p>
                </a>
            </li>
            <li class="component-list-it-landscape__item">
                <a href="#" class="component-list-it-landscape__link">
                    <i class="component-list-it-landscape__icon" style="background:url(images/i_list-it-land_05.png) no-repeat center;background-size:contain;"></i>
                    <p class="component-list-it-landscape__text">Rubik-Bold 16 #565655</p>
                </a>
            </li>
            <li class="component-list-it-landscape__item">
                <a href="#" class="component-list-it-landscape__link">
                    <i class="component-list-it-landscape__icon" style="background:url(images/i_list-it-land_06.png) no-repeat center;background-size:contain;"></i>
                    <p class="component-list-it-landscape__text">Rubik-Bold 16 #565655</p>
                </a>
            </li>
            <li class="component-list-it-landscape__item">
                <a href="#" class="component-list-it-landscape__link">
                    <i class="component-list-it-landscape__icon" style="background:url(images/i_list-it-land_07.png) no-repeat center;background-size:contain;"></i>
                    <p class="component-list-it-landscape__text">Rubik-Bold 16 #565655</p>
                </a>
            </li>
            <li class="component-list-it-landscape__item">
                <a href="#" class="component-list-it-landscape__link">
                    <i class="component-list-it-landscape__icon" style="background:url(images/i_list-it-land_08.png) no-repeat center;background-size:contain;"></i>
                    <p class="component-list-it-landscape__text">Rubik-Bold 16 #565655</p>
                </a>
            </li>
        </ul>

    @endif

</section>