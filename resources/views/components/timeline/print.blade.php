<section class="component component-timeline" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->day))

        <h3 class="component-timeline__date-title">
            {{ $fields->day or '' }}
        </h3>

        @isset($fields->list)

            <ul class="component-timeline__container">

            @foreach($fields->list as $i)

                <li class="component-timeline__event">
                    <p class="component-timeline__event-time">{{$i->fields->hour or ''}}</p>
                    <div class="component-timeline__event-content">
                        <h4 class="component-timeline__event-title">{!! field($i->fields->title, '') !!}</h4>
                        <p class="component-timeline__event-desc">{!! field($i->fields->body, '') !!}</p>
                    </div>
                </li>

            @endforeach

            </ul>

        @endisset

    @else


        <h3 class="component-timeline__date-title">
           8 de Agosto
        </h3>

        <ul class="component-timeline__container">

            <li class="component-timeline__event">
                <p class="component-timeline__event-time">09 hs</p>
                <div class="component-timeline__event-content">
                    <h4 class="component-timeline__event-title">Texto texto texto</h4>
                    <p class="component-timeline__event-desc">Subtexto subtexto subtexto</p>
                </div>
            </li>

            <li class="component-timeline__event">
                <p class="component-timeline__event-time">10:30 hs</p>
                <div class="component-timeline__event-content">
                    <h4 class="component-timeline__event-title">Texto texto texto</h4>
                    <p class="component-timeline__event-desc">Subtexto subtexto subtexto</p>
                </div>
            </li>

            <li class="component-timeline__event">
                <p class="component-timeline__event-time">02:30 hs</p>
                <div class="component-timeline__event-content">
                    <h4 class="component-timeline__event-title">Texto texto texto</h4>
                    <p class="component-timeline__event-desc">Subtexto subtexto subtexto</p>
                </div>
            </li>

        </ul>


    @endif

</section>
