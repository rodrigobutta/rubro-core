<section class="component section section--2 component-home-section--2" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->title))

        <div class="container">
            <div class="home-title">
                {{-- <h2 class="home-title__text">{{$fields->title or ''}}</h2> --}}
                <h2 class="home-title__text"><span class="home-title__text__span">Más</span> <strong class="home-title__text__span home-title__text__span--bold">Noticias</strong></h2>
            <a href="{{ getLink($fields->link) }}" class="home-title__link">
                    <span class="home-title__link__text">{{$fields->cta or ''}}</span>
                    <span class="home-title__link__arrow"></span>
                </a>
            </div>
        </div>
        <div class="container news-slider-wrapper">
            <div class="row">
                <div class="col-lg-9">
                    <section class="home-list-pt js-news-slider">

                        @isset($fields->folders)
                            @php($items = fieldObjectsOfArray($fields->folders,\App\Folder::class) )
                            @foreach($items as $key => $i)
                                @if($key<3)
                                    <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="home-list-pt__block">
                                        <div class="home-list-pt__img" style="background-image: url('{{Resizer::widen(900,$i->cover->image)}}')"></div>
                                        <p class="home-list-pt__text">
                                            {{$i->cover->title}}
                                        </p>
                                    </a>
                                @endif
                            @endforeach
                        @endisset

                    </section>
                </div>
                <div class="col-lg-3">
                    <section class="home-list-t">

                        @foreach($items as $key => $i)
                            @if($key>2)
                                <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="home-list-t__link">
                                    <span class="home-list-t__link__text">{{$i->cover->title}}</span>
                                </a>
                            @endif
                        @endforeach

                    </section>
                </div>
            </div>
        </div>

    @else

        <div class="container">
            <div class="home-title">
                <h2 class="home-title__text"><span class="home-title__text__span">Más</span> <strong class="home-title__text__span home-title__text__span--bold">Noticias</strong></h2>
                <a href="#" class="home-title__link">
                    <span class="home-title__link__text">Conoce todas las Noticias</span>
                    <span class="home-title__link__arrow"></span>
                </a>
            </div>
        </div>
        <div class="container news-slider-wrapper">
            <div class="row">
                <div class="col-lg-9">
                    <section class="home-list-pt js-news-slider">
                        <a href="#" class="home-list-pt__block">
                            <div class="home-list-pt__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                            <p class="home-list-pt__text">
                                Rubik-Regular 18 line-height #464646
                            </p>
                        </a>
                        <a href="#" class="home-list-pt__block">
                            <div class="home-list-pt__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                            <p class="home-list-pt__text">
                                Rubik-Regular 18 line-height #464646
                            </p>
                        </a>
                        <a href="#" class="home-list-pt__block">
                            <div class="home-list-pt__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                            <p class="home-list-pt__text">
                                Rubik-Regular 18 line-height #464646
                            </p>
                        </a>
                    </section>
                </div>
                <div class="col-lg-3">
                    <section class="home-list-t">
                        <a href="#" class="home-list-t__link">
                            <span class="home-list-t__link__text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </a>
                        <a href="#" class="home-list-t__link">
                            <span class="home-list-t__link__text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </a>
                        <a href="#" class="home-list-t__link">
                            <span class="home-list-t__link__text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </a>
                        <a href="#" class="home-list-t__link">
                            <span class="home-list-t__link__text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </a>
                    </section>
                </div>
            </div>
        </div>

    @endif

</section>


<script type="text/javascript">

    $(function(){



    });

</script>