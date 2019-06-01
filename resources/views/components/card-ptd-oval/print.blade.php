<section class="component component-card-ptd-oval" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)

            @foreach($fields->list as $i)

                <div class="component-card-ptd-oval__card">
                    <div class="component-card-ptd-oval__card__img-wrapper">
                        <img src="{{Resizer::widen(150,gg($i->fields->image,''))}}" alt="" class="component-card-ptd-oval__card__img">
                    </div>
                    <h3 class="component-card-ptd-oval__card__title">{!! field($i->fields->name, '') !!}</h3>
                    <p class="component-card-ptd-oval__card__description">{!! field($i->fields->description, '') !!}</p>
                </div>

            @endforeach

    @else

        <div class="component-card-ptd-oval__card">
            <div class="component-card-ptd-oval__card__img-wrapper">
                <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-card-ptd-oval__card__img">
            </div>
            <h3 class="component-card-ptd-oval__card__title">Rubik Medium 22 #464646</h3>
            <p class="component-card-ptd-oval__card__description">Rubik Medium 16</p>
        </div>
        <div class="component-card-ptd-oval__card">
            <div class="component-card-ptd-oval__card__img-wrapper">
                <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-card-ptd-oval__card__img">
            </div>
            <h3 class="component-card-ptd-oval__card__title">Rubik Medium 22 #464646</h3>
            <p class="component-card-ptd-oval__card__description">Rubik Medium 16</p>
        </div>
        <div class="component-card-ptd-oval__card">
            <div class="component-card-ptd-oval__card__img-wrapper">
                <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-card-ptd-oval__card__img">
            </div>
            <h3 class="component-card-ptd-oval__card__title">Rubik Medium 22 #464646</h3>
            <p class="component-card-ptd-oval__card__description">Rubik Medium 16</p>
        </div>
        <div class="component-card-ptd-oval__card">
            <div class="component-card-ptd-oval__card__img-wrapper">
                <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-card-ptd-oval__card__img">
            </div>
            <h3 class="component-card-ptd-oval__card__title">Rubik Medium 22 #464646</h3>
            <p class="component-card-ptd-oval__card__description">Rubik Medium 16</p>
        </div>

    @endif

</section>