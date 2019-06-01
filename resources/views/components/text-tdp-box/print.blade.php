<div class="component component-text-tdp-box" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    <div class="component-text-tdp-box__container">
    
    @if(has($fields->title) || has($fields->subtitle) || has($fields->image))
        <div class="component-text-tdp-box__content">
            @if(has($fields->title))
                <strong class="component-text-tdp-box__text component-text-tdp-box__text--bold">{!! field($fields->title, '') !!}</strong>
            @endif
            @if(has($fields->subtitle))
                <div class="component-text-tdp-box__text">{!! field($fields->subtitle, '') !!}</div>
            @endif
        </div>
        @if(has($fields->image))
            <img src="{{Resizer::widen(300,gg($fields->image,''))}}" alt="" class="component-text-tdp-box__img">
        @endif
    @else
        <div class="component-text-tdp-box__content">
            <strong class="component-text-tdp-box__text component-text-tdp-box__text--bold">Tíulo texto texto</strong>
            <div class="component-text-tdp-box__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt magna aliqua.</div>
        </div>
        <img src="images/text-tdp-box.png" alt="" class="component-text-tdp-box__img">

    @endif
    </div>
</div>
