<div class="component component-btn-p-stacked" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    @isset($fields->list)
        @foreach($fields->list as $i)

            <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="btn-p">
                <img src="{{Resizer::widen(600,gg($i->fields->image,''))}}" class="btn-p__img" alt="{{$i->fields->alt or ''}}">
            </a>

        @endforeach
    @else

        <a href="#" target="_blank" class="btn-p">
            <img src="images/btn-p-stacked-01.png" class="btn-p__img" alt="">
        </a>
        <a href="#" target="_blank" class="btn-p">
            <img src="images/btn-p-stacked-02.png" class="btn-p__img" alt="">
        </a>
        <a href="#" target="_blank" class="btn-p">
            <img src="images/btn-p-stacked-03.png" class="btn-p__img" alt="">
        </a>
        <a href="#" target="_blank" class="btn-p">
            <img src="images/btn-p-stacked-04.png" class="btn-p__img" alt="">
        </a>
        <a href="#" target="_blank" class="btn-p">
            <img src="images/btn-p-stacked-05.png" class="btn-p__img" alt="">
        </a>
        <a href="#" target="_blank" class="btn-p">
            <img src="images/btn-p-stacked-06.png" class="btn-p__img" alt="">
        </a>
        <a href="#" target="_blank" class="btn-p">
            <img src="images/btn-p-stacked-07.png" class="btn-p__img" alt="">
        </a>
        <a href="#" target="_blank" class="btn-p">
            <img src="images/btn-p-stacked-08.png" class="btn-p__img" alt="">
        </a>

    @endif

</div>