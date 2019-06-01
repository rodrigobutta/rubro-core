<div class="component component-mapa" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    <div
        class="map js-map"
        data-lat="{{ $fields->lat or '-34.624827' }}"
        data-lng="{{ $fields->lng or '-58.453521' }}"        
        data-zoom="{{ $fields->zoom or '15' }}"
        data-title="{{ $fields->title or '' }}"
        data-description="{{ $fields->description or '' }}"
    ></div>
</div>