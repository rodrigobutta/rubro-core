<section class="component component-video-youtube {{ gg($fields->visible)==1?'visible':'hidden' }}" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(has($fields->video))

        <section class="">
            <div class="container">          
                <div class="__video">
                    <iframe class="__video__player" type="text/html" src="https://www.youtube.com/embed/{{ $fields->video or '000000'}}?autoplay={{ gg($fields->autoplay)==1?'1':'0' }}&rel=0&controls={{ gg($fields->nocontrols)==1?'0':'1' }}&loop={{ gg($fields->loop)==1?'1':'0' }}" frameborder="0"></iframe>
                </div>        
            </div>
        </section>

    @else

        <section class="">
            <div class="container">                
                <div class="__video">
                    <iframe class="__video__player" type="text/html" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=0&rel=0" frameborder="0"></iframe>
                </div>        
            </div>
        </section>

    @endif

</section>