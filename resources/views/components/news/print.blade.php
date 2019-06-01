<section class="component component-news" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    @if(has($fields->title) || $item->origin==1 || isset($fields->folders) && sizeof($fields->folders)>0 )

        <div class="container">
            <div class="home-subtitle">
                <h3 class="home-subtitle__text"><span class="home-subtitle__text__span">{!! field($fields->title, '') !!}</span></h3>
            </div>
        </div>
        <div class="container news-slider-wrapper">
            <section class="home-list-pt js-news-slider">


                @if($item->origin==1 && isset($p_pointer))
                    @php( $items = \App\Folder::find($p_pointer)->getChildren($item->getParams()) )
                    @if(sizeof($items)>0)

                        @foreach($items as $i)

                            <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="home-list-pt__block">
                                <div class="home-list-pt__img" style="background-image: url('{{Resizer::widen(900,$i->cover->image)}}')"></div>
                                <small class="home-list-pt__subtitle">{{$i->parent->cover->title}}</small>
                                <p class="home-list-pt__text">
                                    {!! nl2br($i->cover->title) !!}
                                </p>
                            </a>

                        @endforeach

                    @else
                        <div class="alert alert-warning alert-dismissable" role="alert">
                            <h3 class="alert-heading font-size-h4 font-w400">{{$item->component->title}}</h3>
                            <p class="mb-0">El componente dinámico no encontró elementos para mostrar. <a class="btn-edit" href="javascript:void(0)">Revisar configuración</a>!</p>
                        </div>
                    @endif
                @else

                    @isset($fields->folders)

                        @php($items = fieldObjectsOfArray($fields->folders,\App\Folder::class) )

                        @foreach($items as $key => $i)
                            <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="home-list-pt__block">
                                <div class="home-list-pt__img" style="background-image: url('{{Resizer::widen(900,$i->cover->image)}}')"></div>
                                <small class="home-list-pt__subtitle">{{$i->parent->cover->title}}</small>
                                <p class="home-list-pt__text">
                                    {!! nl2br($i->cover->title) !!}
                                </p>
                            </a>
                        @endforeach

                    @endisset

                @endif

            </section>
        </div>





    @else

        <div class="container">
            <div class="home-subtitle">
                <h3 class="home-subtitle__text"><span class="home-subtitle__text__span">Noticias<br>Relacionadas</span></h3>
            </div>
        </div>
        <div class="container news-slider-wrapper">
            <section class="home-list-pt js-news-slider">
                <a href="#" class="home-list-pt__block">
                    <div class="home-list-pt__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                    <small class="home-list-pt__subtitle">Posgrados y becas</small>
                    <p class="home-list-pt__text">
                        Rubik-Regular 18 line-height #464646
                    </p>
                </a>
                <a href="#" class="home-list-pt__block">
                    <div class="home-list-pt__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                    <small class="home-list-pt__subtitle">Posgrados y becas</small>
                    <p class="home-list-pt__text">
                        Rubik-Regular 18 line-height #464646
                    </p>
                </a>
                <a href="#" class="home-list-pt__block">
                    <div class="home-list-pt__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                    <small class="home-list-pt__subtitle">Posgrados y becas</small>
                    <p class="home-list-pt__text">
                        Rubik-Regular 18 line-height #464646
                    </p>
                </a>
                <a href="#" class="home-list-pt__block">
                    <div class="home-list-pt__img" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif')"></div>
                    <small class="home-list-pt__subtitle">Posgrados y becas</small>
                    <p class="home-list-pt__text">
                        Rubik-Regular 18 line-height #464646
                    </p>
                </a>
            </section>
        </div>

    @endif

</section>


<script type="text/javascript">

    $(function(){



    });

</script>
