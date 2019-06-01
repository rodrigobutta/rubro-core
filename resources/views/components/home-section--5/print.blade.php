<section class="component component-home-section--5 section section--5" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($p_bg))
        <div class="bg" style="background-color: {{$p_bg or ''}}"></div>
    @endif

    @if(has($fields->title))

        <div class="container">
            <div class="home-title">
                <h2 class="home-title__text"><span class="home-title__text__span">Conocé nuestra oferta<br/> de</span> <strong class="home-title__text__span home-title__text__span--bold">Formación Profesional</strong></h2>
                <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="home-title__link">
                    <span class="home-title__link__text">{{$fields->cta or ''}}</span>
                    <span class="home-title__link__arrow"></span>
                </a>
            </div>
            <div class="home-btn-it-landscape">

                @foreach($fields->list as $i)

                    <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="home-btn-it-landscape__btn">
                        <img src="{{Resizer::widen(600,gg($i->fields->image,''))}}" alt="" class="home-btn-it-landscape__btn__icon">
                        <span class="home-btn-it-landscape__btn__text">{{$i->fields->title or ''}}</span>
                    </a>

                @endforeach

            </div>
        </div>

    @else

        <div class="container">
            <div class="home-title">
                <h2 class="home-title__text"><span class="home-title__text__span">Conocé nuestra oferta<br/> de</span> <strong class="home-title__text__span home-title__text__span--bold">Formación Profesional</strong></h2>
                <a href="#" class="home-title__link">
                    <span class="home-title__link__text">Conoce la oferta completa</span>
                    <span class="home-title__link__arrow"></span>
                </a>
            </div>
            <div class="home-btn-it-landscape">
                <a href="#" target="_blank" class="home-btn-it-landscape__btn">
                    <img src="./images/icons/4.png" alt="" class="home-btn-it-landscape__btn__icon">
                    <span class="home-btn-it-landscape__btn__text">Circulo de Empleo</span>
                </a>
                <a href="#" target="_blank" class="home-btn-it-landscape__btn">
                    <img src="./images/icons/4.png" alt="" class="home-btn-it-landscape__btn__icon">
                    <span class="home-btn-it-landscape__btn__text">Reuniones Cientificas y Tecnicas</span>
                </a>
                <a href="#" target="_blank" class="home-btn-it-landscape__btn">
                    <img src="./images/icons/4.png" alt="" class="home-btn-it-landscape__btn__icon">
                    <span class="home-btn-it-landscape__btn__text">Circulo de Empleo</span>
                </a>
                <a href="#" target="_blank" class="home-btn-it-landscape__btn">
                    <img src="./images/icons/4.png" alt="" class="home-btn-it-landscape__btn__icon">
                    <span class="home-btn-it-landscape__btn__text">Circulo de Empleo</span>
                </a>
                <a href="#" target="_blank" class="home-btn-it-landscape__btn">
                    <img src="./images/icons/4.png" alt="" class="home-btn-it-landscape__btn__icon">
                    <span class="home-btn-it-landscape__btn__text">Circulo de Empleo</span>
                </a>
                <a href="#" target="_blank" class="home-btn-it-landscape__btn">
                    <img src="./images/icons/4.png" alt="" class="home-btn-it-landscape__btn__icon">
                    <span class="home-btn-it-landscape__btn__text">Circulo de Empleo</span>
                </a>
                <a href="#" target="_blank" class="home-btn-it-landscape__btn">
                    <img src="./images/icons/4.png" alt="" class="home-btn-it-landscape__btn__icon">
                    <span class="home-btn-it-landscape__btn__text">Circulo de Empleo</span>
                </a>
                <a href="#" target="_blank" class="home-btn-it-landscape__btn">
                    <img src="./images/icons/4.png" alt="" class="home-btn-it-landscape__btn__icon">
                    <span class="home-btn-it-landscape__btn__text">Circulo de Empleo</span>
                </a>
            </div>
        </div>

    @endif

</section>


<script type="text/javascript">

    $(function(){



    });

</script>