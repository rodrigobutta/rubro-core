<section class="component component-btn-list-a" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)
        <div class="component-btn-list-a__container">
            @foreach($fields->list as $i)

                @if(has($i->fields->link))
                    <a href="{{ getLink($i->fields->link)}}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="btn btn-t">{!! field($i->fields->name, 'Link') !!}</a>
                @else
                    <a href="{{$i->fields->attach or ''}}" target="_blank" class="btn btn-ti">{!! field($i->fields->name, 'Descarga') !!}</a>
                @endif

            @endforeach
        </div>
    @else

        <div class="component-btn-list-a__container">
            <a href="#" class="btn btn-t">Link</a>
            <a href="#" class="btn btn-t">Link</a>
            <a href="#" class="btn btn-ti">Descarga</a>
            <a href="#" class="btn btn-ti">Descarga</a>
        </div>

    @endif

</section>

