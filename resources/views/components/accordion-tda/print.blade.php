<div class="component component-accordion-tda" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    <ul class="accordion">

    @isset($fields->list)

        @foreach($fields->list as $key => $i)

            <li class="accordion__dropdown">
                <a class="accordion__label">{!! field($i->fields->title, '') !!}</a>
                <div class="accordion__content">
                    <div class="col-half">{!! field($i->fields->description, '') !!}</div>
                    @if(isset($i->fields->cta) && $i->fields->cta!='' && $i->fields->link!='')
                        <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="btn-t">{{$i->fields->cta or ''}}</a>
                    @endif
                </div>
            </li>

        @endforeach

    @else

        <li class="accordion__dropdown">
            <a class="accordion__label">Tributaria</a>
            <div class="accordion__content">
                <div class="col-half">
                    <ul class="accordion__content-list">
                        <li>Derecho Penal Tributario: infracciones y sanciones tributarias</li>
                        <li>Procedimiento administrativo y judicial</li>
                    </ul>
                    <p>Dr. Abog. Ricardo Basualdo</p>
                    <p>Martes y Jueves de 12:30 a 14:00</p>
                </div>
                <a href="" class="btn-t">Reserva Turno</a>
            </div>
        </li>

        <li class="accordion__dropdown">
            <a class="accordion__label">Tributaria</a>
            <div class="accordion__content">
                <div class="col-half">
                    <ul class="accordion__content-list">
                        <li>Derecho Penal Tributario: infracciones y sanciones tributarias</li>
                        <li>Procedimiento administrativo y judicial</li>
                    </ul>
                    <p>Dr. Abog. Ricardo Basualdo</p>
                    <p>Martes y Jueves de 12:30 a 14:00</p>
                </div>
                <a href="" class="btn-t">Reserva Turno</a>
            </div>
        </li>
        <li class="accordion__dropdown">
            <a class="accordion__label">Judicial</a>
            <div class="accordion__content">
                <div class="col-half">
                    <ul class="accordion__content-list">
                        <li>Derecho Penal Tributario: infracciones y sanciones tributarias</li>
                        <li>Procedimiento administrativo y judicial</li>
                    </ul>
                    <p>Dr. Abog. Ricardo Basualdo</p>
                    <p>Martes y Jueves de 12:30 a 14:00</p>
                </div>
                <a href="" class="btn-t">Reserva Turno</a>
            </div>
        </li>
        <li class="accordion__dropdown">
            <a class="accordion__label">Prevención de Lavado de Activos</a>
            <div class="accordion__content">
                <div class="col-half">
                    <ul class="accordion__content-list">
                        <li>Derecho Penal Tributario: infracciones y sanciones tributarias</li>
                        <li>Procedimiento administrativo y judicial</li>
                    </ul>
                    <p>Dr. Abog. Ricardo Basualdo</p>
                    <p>Martes y Jueves de 12:30 a 14:00</p>
                </div>
                <a href="" class="btn-t">Reserva Turno</a>
            </div>
        </li>

    @endif

    </ul>
</div>

<script>
    (function($) {

        $('.component-accordion-tda[data-content-id="{{$id}}"] .accordion__label').click(function(j) {
            var dropDown = $(this).closest('.component-accordion-tda[data-content-id="{{$id}}"] .accordion__dropdown').find('.accordion__content');

            $(this).closest('.component-accordion-tda[data-content-id="{{$id}}"] .accordion').find('.accordion__content').not(dropDown).slideUp();

            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).closest('.component-accordion-tda[data-content-id="{{$id}}"] .accordion').find('.accordion__label.active').removeClass('active');
                $(this).addClass('active');
            }

            dropDown.stop(false, true).slideToggle();

            j.preventDefault();
        });
    })(jQuery);
</script>
