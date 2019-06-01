<section class="component component-slider-block js-slider-block" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)

        @foreach($fields->list as $i)

            <div class="component-slider-block__item">
                <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="component-slider-block__link">
                    <div class="component-slider-block__item__img-wrapper">
                        <img src="{{Resizer::widen(600,gg($i->fields->image,''))}}" alt="" class="component-slider-block__item__img">
                    </div>
                    <div class="component-slider-block__item__description">
                        <h3 class="component-slider-block__item__title">{!! field($i->fields->title, '') !!}</h3>
                        <p class="component-slider-block__item__text">{!! field($i->fields->description, '') !!}</p>
                    </div>
                </a>
            </div>

        @endforeach

    @else


        <div class="component-slider-block__item">
            <a href="#" class="component-slider-block__link">
                <div class="component-slider-block__item__img-wrapper">
                    <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-slider-block__item__img">
                </div>
                <div class="component-slider-block__item__description">
                    <h3 class="component-slider-block__item__title">Rubik Medium 22 #464646</h3>
                    <p class="component-slider-block__item__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
                </div>
            </a>
        </div>
        <div class="component-slider-block__item">
            <a href="#" class="component-slider-block__link">
                <div class="component-slider-block__item__img-wrapper">
                    <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-slider-block__item__img">
                </div>
                <div class="component-slider-block__item__description">
                    <h3 class="component-slider-block__item__title">Rubik Medium 22 #464646</h3>
                    <p class="component-slider-block__item__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
                </div>
            </a>
        </div>
        <div class="component-slider-block__item">
            <a href="#" class="component-slider-block__link">
                <div class="component-slider-block__item__img-wrapper">
                    <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-slider-block__item__img">
                </div>
                <div class="component-slider-block__item__description">
                    <h3 class="component-slider-block__item__title">Rubik Medium 22 #464646</h3>
                    <p class="component-slider-block__item__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
                </div>
            </a>
        </div>
        <div class="component-slider-block__item">
            <a href="#" class="component-slider-block__link">
                <div class="component-slider-block__item__img-wrapper">
                    <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-slider-block__item__img">
                </div>
                <div class="component-slider-block__item__description">
                    <h3 class="component-slider-block__item__title">Rubik Medium 22 #464646</h3>
                    <p class="component-slider-block__item__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
                </div>
            </a>
        </div>
        <div class="component-slider-block__item">
            <a href="#" class="component-slider-block__link">
                <div class="component-slider-block__item__img-wrapper">
                    <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-slider-block__item__img">
                </div>
                <div class="component-slider-block__item__description">
                    <h3 class="component-slider-block__item__title">Rubik Medium 22 #464646</h3>
                    <p class="component-slider-block__item__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
                </div>
            </a>
        </div>

    @endif

</section>

<script>
    $('.js-slider-block[data-content-id="{{$id}}"]').slick({
        slidesToShow: 4,
        responsive: [{
            breakpoint: 990,
            settings: {
                slidesToShow: 2,
                infinite: true
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                arrows: false,
                centerMode: true
            }
        },
        {
            breakpoint: 560,
            settings: {
                slidesToShow: 1,
                arrows: false,
                centerMode: true
            }
        }]
    });
</script>