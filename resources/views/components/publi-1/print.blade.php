<div class="component component-publi-1" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)
        @foreach($fields->list as $i)

            <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="btn-p">
                <img src="{{Resizer::widen(400,gg($i->fields->image,''))}}" class="btn-p__img" alt="{{$i->fields->alt or ''}}">
            </a>

        @endforeach
    @else

        <a href="#" target="_blank" class="btn-p">
            <img src="http://placehold.it/250x60?text=Publicidad%250x60" class="btn-p__img" alt="">
        </a>
        <a href="#" target="_blank" class="btn-p">
            <img src="http://placehold.it/250x60?text=Publicidad%250x60" class="btn-p__img" alt="">
        </a>
        <a href="#" target="_blank" class="btn-p">
            <img src="http://placehold.it/250x60?text=Publicidad%250x60" class="btn-p__img" alt="">
        </a>
        <a href="#" target="_blank" class="btn-p">
            <img src="http://placehold.it/250x60?text=Publicidad%250x60" class="btn-p__img" alt="">
        </a>        

    @endif

</div>