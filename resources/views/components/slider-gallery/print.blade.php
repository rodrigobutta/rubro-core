<section class="component component-slider-gallery" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)

        <ul class="component-slider-gallery__slider js-slider-gallery">


            @foreach($fields->list as $i)

                <li class="component-slider-gallery__item">
                    <img src="{{Resizer::widen(1200,gg($i->fields->image,''))}}" alt="" class="component-slider-gallery__item__img">
                    <div class="component-slider-gallery__item__description">
                        <p class="component-slider-gallery__item__text">{!! field($i->fields->description, '') !!}</p>
                    </div>
                </li>

            @endforeach

        </ul>
        <ul class="component-slider-gallery__thumbs js-slider-gallery-thumbs {{(count($fields->list) <= 4 ? '-sided' : '')}}">

            @foreach($fields->list as $i)

               <li class="component-slider-gallery__thumb">
                   <img src="{{Resizer::widen(80,gg($i->fields->image,''))}}" class="component-slider-gallery__thumb__img" />
               </li>

            @endforeach

        </ul>


    @else


        <ul class="component-slider-gallery__slider js-slider-gallery">
            <li class="component-slider-gallery__item">
                <a href="#" class="component-slider-gallery__link">
                    <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-slider-gallery__item__img">
                    <div class="component-slider-gallery__item__description">
                        <p class="component-slider-gallery__item__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra 1</p>
                    </div>
                </a>
            </li>
            <li class="component-slider-gallery__item">
                <a href="#" class="component-slider-gallery__link">
                    <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-slider-gallery__item__img">
                    <div class="component-slider-gallery__item__description">
                        <p class="component-slider-gallery__item__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra 2</p>
                    </div>
                </a>
            </li>
            <li class="component-slider-gallery__item">
                <a href="#" class="component-slider-gallery__link">
                    <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-slider-gallery__item__img">
                    <div class="component-slider-gallery__item__description">
                        <p class="component-slider-gallery__item__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra 3</p>
                    </div>
                </a>
            </li>
            <li class="component-slider-gallery__item">
                <a href="#" class="component-slider-gallery__link">
                    <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-slider-gallery__item__img">
                    <div class="component-slider-gallery__item__description">
                        <p class="component-slider-gallery__item__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra 4</p>
                    </div>
                </a>
            </li>
            <li class="component-slider-gallery__item">
                <a href="#" class="component-slider-gallery__link">
                    <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" alt="" class="component-slider-gallery__item__img">
                    <div class="component-slider-gallery__item__description">
                        <p class="component-slider-gallery__item__text">Línea de texto Rubik 16 puntos, 21 de interlínea y -25 de interletra.</p>
                    </div>
                </a>
            </li>
        </ul>
        <ul class="component-slider-gallery__thumbs js-slider-gallery-thumbs">
            <li class="component-slider-gallery__thumb">
                <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" class="component-slider-gallery__thumb__img" />
            </li>
            <li class="component-slider-gallery__thumb">
                <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" class="component-slider-gallery__thumb__img" />
            </li>
            <li class="component-slider-gallery__thumb">
                <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" class="component-slider-gallery__thumb__img" />
            </li>
            <li class="component-slider-gallery__thumb">
                <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" class="component-slider-gallery__thumb__img" />
            </li>
            <li class="component-slider-gallery__thumb">
                <img src="http://clientes.agenciaego.com.ar/Consejo/dummy.gif" class="component-slider-gallery__thumb__img" />
            </li>
        </ul>

    @endisset


</section>

<script>
    $('.component[data-content-id="{{$id}}"]  .js-slider-gallery').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
        fade: true
    });
    $('.component[data-content-id="{{$id}}"]  .js-slider-gallery-thumbs').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.js-slider-gallery',
        focusOnSelect: true,
        infinite: true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-arrow slick-prev">Anterior</button>',
        nextArrow: '<button type="button" class="slick-arrow slick-next">Siguiente</button>'
    });

    //$('.slick-thumbs').html('');
    //$('.slick-dots').appendTo('.slick-thumbs');
</script>