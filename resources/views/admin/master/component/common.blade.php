
{{-- @if(isset($editMode)) --}}
@if(isInAdmin())
    <img src="{{$item->getScreenshot()}}" class="idle-screenshot"/>                                                  
@endif

@if(has($p_bg))
    <div class="bg" style="background-color: {{$p_bg or ''}}"></div>
@endif
