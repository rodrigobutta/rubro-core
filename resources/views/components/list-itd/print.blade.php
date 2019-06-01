<section class="component component-list-itd @isset($fields->list){!! (count($fields->list) == 3) ? '-grow' : '' !!}@endif" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)

        <ul class="component-list-itd__container">
            @foreach($fields->list as $i)

                <li class="component-list-itd__item">
                    <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="component-list-itd__link">
                        <i style="background:url('{{Resizer::widen(600,gg($i->fields->image,''))}}') no-repeat left;background-size:contain;" class="component-list-itd__icon"></i>
                        <h3 class="component-list-itd__title">{{$i->fields->name or ''}}</h3>
                        <p class="component-list-itd__text">{!! field($i->fields->description, '') !!}</p>
                    </a>
                </li>

            @endforeach
        </ul>
    @else

        <ul class="component-list-itd__container">
            <li class="component-list-itd__item">
                <a href="#" class="component-list-itd__link">
                <i style="background:url(images/i_list-itd-01.png) no-repeat left;background-size:contain;" class="component-list-itd__icon"></i>
                <h3 class="component-list-itd__title">Rubik Medium 22 #565655</h3>
                    <p class="component-list-itd__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
                </a>
            </li>
            <li class="component-list-itd__item">
                <a href="#" class="component-list-itd__link">
                <i style="background:url(images/i_list-itd-02.png) no-repeat left;background-size:contain;" class="component-list-itd__icon"></i>
                <h3 class="component-list-itd__title">Rubik Medium 22 #565655</h3>
                    <p class="component-list-itd__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
                </a>
            </li>
            <li class="component-list-itd__item">
                <a href="#" class="component-list-itd__link">
                <i style="background:url(images/i_list-itd-03.png) no-repeat left;background-size:contain;" class="component-list-itd__icon"></i>
                <h3 class="component-list-itd__title">Rubik Medium 22 #565655</h3>
                    <p class="component-list-itd__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
                </a>
            </li>
            <li class="component-list-itd__item">
                <a href="#" class="component-list-itd__link">
                <i style="background:url(images/i_list-itd-04.png) no-repeat left;background-size:contain;" class="component-list-itd__icon"></i>
                <h3 class="component-list-itd__title">Rubik Medium 22 #565655</h3>
                    <p class="component-list-itd__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
                </a>
            </li>
            <li class="component-list-itd__item">
                <a href="#" class="component-list-itd__link">
                <i style="background:url(images/i_list-itd-05.png) no-repeat left;background-size:contain;" class="component-list-itd__icon"></i>
                <h3 class="component-list-itd__title">Rubik Medium 22 #565655</h3>
                    <p class="component-list-itd__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
                </a>
            </li>
            <li class="component-list-itd__item">
                <a href="#" class="component-list-itd__link">
                <i style="background:url(images/i_list-itd-06.png) no-repeat left;background-size:contain;" class="component-list-itd__icon"></i>
                <h3 class="component-list-itd__title">Rubik Medium 22 #565655</h3>
                    <p class="component-list-itd__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
                </a>
            </li>
            <li class="component-list-itd__item">
                <a href="#" class="component-list-itd__link">
                    <i style="background:url(images/i_list-itd-07.png) no-repeat left;background-size:contain;" class="component-list-itd__icon"></i>
                    <h3 class="component-list-itd__title">Rubik Medium 22 #565655</h3>
                    <p class="component-list-itd__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
                </a>
            </li>
        </ul>

    @endif

</section>