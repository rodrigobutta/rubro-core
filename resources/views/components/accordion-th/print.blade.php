<div class="component component-accordion-th" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    <ul class="accordion">

    @isset($fields->list)

        @foreach($fields->list as $key => $i)

            <li class="accordion__dropdown">
                <a class="accordion__label">{!! field($i->fields->title, '') !!}</a>
                <div class="accordion__content">
                    {!! field($i->fields->description, '') !!}
                </div>
            </li>

        @endforeach

    @else

        <li class="accordion__dropdown">
            <a class="accordion__label">Comisiones Institucionales</a>
            <div class="accordion__content">
                <p>El CIB ofrece 30 puestos de lectura que pueden ser utilizados por la matrícula y demás usuarios.</p>
                <p>El espacio de lectura cuenta con el plus de iluminación natural debido a sus amplios ventanales. Además contamos con una sala silenciosa en el entrepiso.</p>
                <p>Los usuarios pueden utilizar su propio material de lectura o solicitar al personal del CIB los documentos que deseen. El sector cuenta con una red inalámbrica (WIFI) y tomacorrientes.</p>
            </div>
        </li>
        <li class="accordion__dropdown">
            <a class="accordion__label">Comisiones profesionales</a>
            <div class="accordion__content">
                    <p>El CIB ofrece 30 puestos de lectura que pueden ser utilizados por la matrícula y demás usuarios.</p>
                    <p>El espacio de lectura cuenta con el plus de iluminación natural debido a sus amplios ventanales. Además contamos con una sala silenciosa en el entrepiso.</p>
                    <p>Los usuarios pueden utilizar su propio material de lectura o solicitar al personal del CIB los documentos que deseen. El sector cuenta con una red inalámbrica (WIFI) y tomacorrientes.</p>
            </div>
        </li>
        <li class="accordion__dropdown">
            <a class="accordion__label">Comisiones académicas</a>
            <div class="accordion__content">
                    <p>El CIB ofrece 30 puestos de lectura que pueden ser utilizados por la matrícula y demás usuarios.</p>
                    <p>El espacio de lectura cuenta con el plus de iluminación natural debido a sus amplios ventanales. Además contamos con una sala silenciosa en el entrepiso.</p>
                    <p>Los usuarios pueden utilizar su propio material de lectura o solicitar al personal del CIB los documentos que deseen. El sector cuenta con una red inalámbrica (WIFI) y tomacorrientes.</p>
            </div>
        </li>

    @endif
    </ul>

</div>

<script>
    (function($) {

        $('.component-accordion-th[data-content-id="{{$id}}"] .accordion__label').click(function(j) {
            var dropDown = $(this).closest('.component-accordion-th[data-content-id="{{$id}}"] .accordion__dropdown').find('.accordion__content');

            $(this).closest('.component-accordion-th[data-content-id="{{$id}}"] .accordion').find('.accordion__content').not(dropDown).slideUp();

            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).closest('.component-accordion-th[data-content-id="{{$id}}"] .accordion').find('.accordion__label.active').removeClass('active');
                $(this).addClass('active');
            }

            dropDown.stop(false, true).slideToggle();

            j.preventDefault();
        });
    })(jQuery);
</script>
