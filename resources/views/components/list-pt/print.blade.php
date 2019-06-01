<section class="component component-list-pt" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    @if($item->origin==1 && isset($p_pointer))
        @php( $items = \App\Folder::find($p_pointer)->getChildren($item->getParams()) )
        @if(sizeof($items)>0)

            @foreach($items as $i)

                <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="component-list-pt__block">
                    <div class="component-list-pt__img" style="background:url('{{Resizer::widen(900,$i->cover->image)}}') no-repeat center;background-size:cover;"></div>
                    <p class="component-list-pt__text">
                        {{$i->cover->title or ''}}
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


        @isset($fields->list)

            @foreach($fields->list as $i)

                <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="component-list-pt__block">
                    <div class="component-list-pt__img" style="background:url('{{Resizer::widen(900,gg($i->fields->image,''))}}') no-repeat center;background-size:cover;"></div>
                    <p class="component-list-pt__text">
                        {!! field($i->fields->name, '') !!}
                    </p>
                </a>

            @endforeach

        @else

            <a href="#" class="component-list-pt__block">
                <div class="component-list-pt__img" style="background:url(images/img_list-pt_01.png) no-repeat center;background-size:cover;"></div>
                <p class="component-list-pt__text">
                    Rubik-Regular 18 line-height #464646
                </p>
            </a>
            <a href="#" class="component-list-pt__block">
                <div class="component-list-pt__img" style="background:url(images/img_list-pt_02.png) no-repeat center;background-size:cover;"></div>
                <p class="component-list-pt__text">
                    Rubik-Regular 18 line-height #464646
                </p>
            </a>
            <a href="#" class="component-list-pt__block">
                <div class="component-list-pt__img" style="background:url(images/img_list-pt_03.png) no-repeat center;background-size:cover;"></div>
                <p class="component-list-pt__text">
                    Rubik-Regular 18 line-height #464646
                </p>
            </a>

        @endif


    @endif


</section>

<script>
    // Slider

    var listPTSliderOptions = {
        infinite: true,
        arrows: false,
        slidesToShow: 3,
        centerMode: true,
        centerPadding: '2rem',
        responsive: [{
            breakpoint: 576,
            settings: {
                slidesToShow: 2
            }
        },{
            breakpoint: 480,
            settings: {
                slidesToShow: 2
            }
        },{
            breakpoint: 400,
            settings: {
                slidesToShow: 1
            }
        }]
    };

    function createListPTSlider() {
        var $slider = $(".component-list-pt");
        var isInitialized =  $slider.hasClass('slick-initialized');
        if ($(document).width() <= 650) {
            if (!isInitialized) {
                $slider.slick(listPTSliderOptions);
            }
        } else {
            if (isInitialized) {
                $slider.slick('unslick');
            }
        }
    };

    createListPTSlider();
</script>
