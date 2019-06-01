<section class="component component-list-th" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)
        <ul class="component-list-th__container">
            @foreach($fields->list as $i)

                <li class="component-list-th__item">
                    <h3 class="component-list-th__title">{!! field($i->fields->name, '') !!}</h3>
                    <p class="component-list-th__text">{!! field($i->fields->description, '') !!}</p>
                </li>

            @endforeach
        </ul>
    @else

        <ul class="component-list-th__container">
            <li class="component-list-th__item">
                <h3 class="component-list-th__title">Rubik-Medium 21 #4b3427</h3>
                <p class="component-list-th__text">Línea de texto Rubik-Regular 16 puntos, 21 de interlínea y -0.4 de interletra. </p>

                <p class="component-list-th__text">Línea de texto Rubik-Regular 16 puntos, 21 de interlínea y -0.4 de interletra. </p>
            </li>
            <li class="component-list-th__item">
                <h3 class="component-list-th__title">Rubik-Medium 21 #4b3427</h3>
                <p class="component-list-th__text">Línea de texto Rubik-Regular 16 puntos, 21 de interlínea y -0.4 de interletra. </p>
            </li>
            <li class="component-list-th__item">
                <h3 class="component-list-th__title">Rubik-Medium 21 #4b3427</h3>
                <p class="component-list-th__text">Línea de texto Rubik-Regular 16 puntos, 21 de interlínea y -0.4 de interletra. </p>
            </li>
        </ul>

    @endif


</section>
