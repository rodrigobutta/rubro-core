<section class="component component-home-section--3 section section--3 section--bg" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->title))

        <div class="container">
            <div class="home-title">
                <h2 class="home-title__text"><span class="home-title__text__span">Herramientas</span> <strong class="home-title__text__span home-title__text__span--bold">Profesionales</strong></h2>
                <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="home-title__link">
                    <span class="home-title__link__text">{{ $fields->cta or '' }}</span>
                    <span class="home-title__link__arrow"></span>
                </a>
            </div>
            <section class="home-list-it">

                @foreach($fields->list as $i)

                    <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}"  class="home-list-it__link">
                        <div class="home-list-it__icon-wrapper">
                            <img src="{{Resizer::widen(600,gg($i->fields->image,''))}}" alt="" class="home-list-it__icon">
                        </div>
                        <span class="home-list-it__title">{{$i->fields->title or ''}}</span>
                    </a>

                @endforeach

            </section>
        </div>

    @else

        <div class="container">
            <div class="home-title">
                <h2 class="home-title__text"><span class="home-title__text__span">Herramientas</span> <strong class="home-title__text__span home-title__text__span--bold">Profesionales</strong></h2>
                <a href="#" class="home-title__link">
                    <span class="home-title__link__text">Conoce todas las Herramientas Profesionales</span>
                    <span class="home-title__link__arrow"></span>
                </a>
            </div>
            <section class="home-list-it">
                <a href="#" class="home-list-it__link">
                    <div class="home-list-it__icon-wrapper">
                        <img src="./images/icons/4.png" alt="" class="home-list-it__icon">
                    </div>
                    <span class="home-list-it__title">Legalizaciones</span>
                </a>
                <a href="#" class="home-list-it__link">
                    <div class="home-list-it__icon-wrapper">
                        <img src="./images/icons/4.png" alt="" class="home-list-it__icon">
                    </div>
                    <span class="home-list-it__title">Legalizaciones</span>
                </a>
                <a href="#" class="home-list-it__link">
                    <div class="home-list-it__icon-wrapper">
                        <img src="./images/icons/4.png" alt="" class="home-list-it__icon">
                    </div>
                    <span class="home-list-it__title">Modelos de informes</span>
                </a>
                <a href="#" class="home-list-it__link">
                    <div class="home-list-it__icon-wrapper">
                        <img src="./images/icons/4.png" alt="" class="home-list-it__icon">
                    </div>
                    <span class="home-list-it__title">Legalizaciones</span>
                </a>
                <a href="#" class="home-list-it__link">
                    <div class="home-list-it__icon-wrapper">
                        <img src="./images/icons/4.png" alt="" class="home-list-it__icon">
                    </div>
                    <span class="home-list-it__title">Legalizaciones</span>
                </a>
                <a href="#" class="home-list-it__link">
                    <div class="home-list-it__icon-wrapper">
                        <img src="./images/icons/4.png" alt="" class="home-list-it__icon">
                    </div>
                    <span class="home-list-it__title">Legalizaciones</span>
                </a>
            </section>
        </div>

    @endif

</section>


<script type="text/javascript">

    $(function(){



    });

</script>