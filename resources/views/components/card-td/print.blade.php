<section class="component component-card-td" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    @isset($fields->list)
        @foreach($fields->list as $i)

            <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="component-card-td__card">
              <h3 class="component-card-td__card__title">{!! field($i->fields->name, '') !!}</h3>
              <p class="component-card-td__card__description">{!! field($i->fields->description, '') !!}</p>
            </a>

        @endforeach
    @else

        <a href="#" class="component-card-td__card">
          <h3 class="component-card-td__card__title">Rubik Medium 22 #FFFFFF</h3>
          <p class="component-card-td__card__description">Línea de texto Rubik 16 puntos, 21 de interlínea </p>
        </a>
        <a href="#" class="component-card-td__card">
          <h3 class="component-card-td__card__title">Rubik Medium 22 #FFFFFF</h3>
          <p class="component-card-td__card__description">Línea de texto Rubik 16 puntos, 21 de interlínea </p>
        </a>
        <a href="#" class="component-card-td__card">
          <h3 class="component-card-td__card__title">Rubik Medium 22 #FFFFFF</h3>
          <p class="component-card-td__card__description">Línea de texto Rubik 16 puntos, 21 de interlínea </p>
        </a>
        <a href="#" class="component-card-td__card">
          <h3 class="component-card-td__card__title">Rubik Medium 22 #FFFFFF</h3>
          <p class="component-card-td__card__description">Línea de texto Rubik 16 puntos, 21 de interlínea </p>
        </a>
        <a href="#" class="component-card-td__card">
          <h3 class="component-card-td__card__title">Rubik Medium 22 #FFFFFF</h3>
          <p class="component-card-td__card__description">Línea de texto Rubik 16 puntos, 21 de interlínea </p>
        </a>
        <a href="#" class="component-card-td__card">
          <h3 class="component-card-td__card__title">Rubik Medium 22 #FFFFFF</h3>
          <p class="component-card-td__card__description">Línea de texto Rubik 16 puntos, 21 de interlínea </p>
        </a>
        <a href="#" class="component-card-td__card">
          <h3 class="component-card-td__card__title">Rubik Medium 22 #FFFFFF</h3>
          <p class="component-card-td__card__description">Línea de texto Rubik 16 puntos, 21 de interlínea </p>
        </a>

    @endif

</section>