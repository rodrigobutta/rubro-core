<div class="component component-alert" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    @if(has($fields->link))
        <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="component-alert__wrapper">
            <div class="component-alert__content">
                @if(has($fields->title) || has($fields->subtitle))

                    <p class="component-alert__text">
                        @if(has($fields->title))
                            <span class="component-alert__text__highlighted">{{ $fields->title or '' }}</span>
                        @endif

                        @if(has($fields->subtitle))
                            {!! field($fields->subtitle, '') !!}
                        @endif
                    </p>

                @else
                    <p class="component-alert__text"><span class="component-alert__text__highlighted">Tíulo de alerta</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt magna aliqua.</p>
                @endif
            </div>
        </a>
    @else
        <div class="component-alert__wrapper">
            <div class="component-alert__content">
                @if(has($fields->title) || has($fields->subtitle))

                    <p class="component-alert__text">
                        @if(has($fields->title))
                            <span class="component-alert__text__highlighted">{{ $fields->title or '' }}</span>
                        @endif

                        @if(has($fields->subtitle))
                            {!! field($fields->subtitle, '') !!}
                        @endif
                    </p>

                @else
                    <p class="component-alert__text"><span class="component-alert__text__highlighted">Tíulo de alerta</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt magna aliqua.</p>
                @endif
            </div>
        </div>
    @endif
</div>

