<section class="component component-list-itda-drop" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(isset($fields->list))

       <ul class="component-list-itda-drop__container">

            @foreach($fields->list as $i)

                <li class="component-list-itda-drop__item">
                    <i style="background:url('{{Resizer::widen(100,gg($i->fields->image,''))}}') no-repeat center;background-size:contain;" class="component-list-itda-drop__icon"></i>
                    <p class="component-list-itda-drop__text">{!! field($i->fields->title, '') !!}
                        <span><strong>{!! field($i->fields->body, '') !!}</strong></span>
                    </p>
                </li>

            @endforeach

        </ul>

        <form action="" class="component-list-itda-drop__form">
            <h3 class="component-list-itda-drop__form--title">{!! field($fields->title, '') !!}</h3>

            @isset($fields->list2)
                <select class="js-selector selector" id="selector">
                    <option value="hide">Seleccioná una categoría</option>
                    @foreach($fields->list2 as $i)
                        <option value="{{ getLink($i->fields->link) }}">{{$i->fields->name or '*****'}}</option>
                    @endforeach
                </select>
            @endisset

            @if(has($fields->link))
                <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="btn btn-t btn-t-portrait">{{ $fields->cta or '' }}</a>
            @endif

            @if(has($fields->attach))
                <a href="{{ $fields->attach or '#' }}" target="_blank" class="btn btn-ti btn-t-portrait">{{ $fields->cta2 or '' }}</a>
            @endif

        </form>

    @else

        <ul class="component-list-itda-drop__container">
            <li class="component-list-itda-drop__item">
                <i style="background:url(images/i_person.png) no-repeat center;background-size:contain;" class="component-list-itda-drop__icon"></i>
                <p class="component-list-itda-drop__text">Rubik-Light 16 line-height 21
                    <span><strong>Rubik-Medium #464646</strong></span>
                </p>
            </li>
            <li class="component-list-itda-drop__item">
                <i style="background:url(images/i_person.png) no-repeat center;background-size:contain;" class="component-list-itda-drop__icon"></i>
                <p class="component-list-itda-drop__text">Rubik-Light 16 line-height 21
                    <span><strong>Rubik-Medium #464646</strong></span>
                </p>
            </li>
            <li class="component-list-itda-drop__item">
                <i style="background:url(images/i_person.png) no-repeat center;background-size:contain;" class="component-list-itda-drop__icon"></i>
                <p class="component-list-itda-drop__text">Rubik-Light 16 line-height 21
                    <span><strong>Rubik-Medium #464646</strong></span>
                </p>
            </li>
            <li class="component-list-itda-drop__item">
                <i style="background:url(images/i_person.png) no-repeat center;background-size:contain;" class="component-list-itda-drop__icon"></i>
                <p class="component-list-itda-drop__text">Rubik-Light 16 line-height 21
                    <span><strong>Rubik-Medium #464646</strong></span>
                </p>
            </li>
            <li class="component-list-itda-drop__item">
                <i style="background:url(images/i_flag.png) no-repeat center;background-size:contain;" class="component-list-itda-drop__icon"></i>
                <p class="component-list-itda-drop__text">Rubik-Light 16 line-height 21
                    <span><strong>Rubik-Medium #464646</strong></span>
                </p>
            </li>
        </ul>
        <form action="" class="component-list-itda-drop__form">
            <h3 class="component-list-itda-drop__form--title">Inscribite</h3>
            <select class="js-selector selector" id="selector">
                <option value="hide">Seleccioná una categoría</option>
                <option value="categoria-1">Categoría 1</option>
                <option value="categoria-2">Categoría 2</option>
                <option value="categoria-3">Categoría 3</option>
                <option value="categoria-4">Categoría 4</option>
                <option value="categoria-5">Categoría 5</option>
                <option value="categoria-6">Categoría 6</option>
            </select>
            <a href="#" class="btn btn-t btn-t-portrait">Reglamento</a>
            <a href="#" class="btn btn-ti btn-t-portrait">Descarga</a>
        </form>


    @endif

</section>


<script type="text/javascript">

    $(document).ready(function() {

        $('.component-list-itda-drop[data-content-id="{{$id}}"] .js-selector').selectric().on('change', function() {
            console.log('Abriendo ' + $(this).val());
            window.open($(this).val())
        });

        $('.component-list-itda-drop[data-content-id="{{$id}}"] .js-selector').selectric({
            disableOnMobile: false,
            nativeOnMobile: false
        });

    });

</script>
