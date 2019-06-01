<div class="component component-text-tid-box" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    <div class="component-text-tid-box__container">

    @if(has($fields->title) || isset($fields->list) && sizeof($fields->list)>0 || has($fields->foot))

        @if(has($fields->title))
            <strong class="component-text-tid-box__text component-text-tid-box__text--bold">{!! field($fields->title, '') !!}</strong>
        @endif

        @isset($fields->list)

            @foreach($fields->list as $i)

                <p class="component-text-tid-box__text">
                    <i class="component-text-tid-box__icon" style="background:url('{{Resizer::widen(21,gg($i->fields->image,''))}}') no-repeat center;background-size:contain;"></i>
                    @if(has($i->fields->link))
                        <a href="{{$i->fields->link}}" target="{{$i->fields->blank}}">
                    @endif
                    {{$i->fields->name or ''}}
                    @if(has($i->fields->link))
                        </a>
                    @endif
                </p>

            @endforeach

        @endisset

        @if(has($fields->foot))
            <strong class="component-text-tid-box__text">{!! field($fields->foot, '') !!}</strong>
        @endif

    @else

        <strong class="component-text-tid-box__text component-text-tid-box__text--bold">Título</strong>

        <p class="component-text-tid-box__text">
            <i class="component-text-tid-box__icon" style="background:url(images/i_text-tid-box-01.png) no-repeat center;background-size:contain;"></i>
            5382-9600 opción 3
        </p>
        <p class="component-text-tid-box__text">
            <i class="component-text-tid-box__icon" style="background:url(images/i_text-tid-box-02.png) no-repeat center;background-size:contain;"></i>
            de 9:00 a 19:00 hs.
        </p>

        <strong class="component-text-tid-box__text">Subtítulo</strong>

    @endif

    </div>
</div>
