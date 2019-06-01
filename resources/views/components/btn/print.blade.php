<div class="component component-btn" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    @isset($fields->name)
        @if(has($fields->link))
            <a href="{{ getLink($fields->link) }}" target="{{ gg($fields->blank)==1?'_blank':'_self' }}" class="btn btn-t"><span>{!! field($fields->name, 'Link') !!}</span></a>
        @else
            <a href="{{$fields->attach or ''}}" target="_blank" class="btn btn-ti"><span>{!! field($fields->name, 'Descarga') !!}</span></a>
        @endif
    @else
        <a href="#" target="_blank" class="btn btn-t"><span>Link o Descarga</span></a>
    @endif

</div>
