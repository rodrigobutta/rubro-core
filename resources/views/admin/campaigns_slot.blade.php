<div>
    <form action="{{ route('admin.campanias.slot.save', ['campaign_id' => $cs->campaign_id, 'slot_uuid' => $cs->slot_uuid]) }}" class="form-main" method="post">
        @csrf
        <div class="form-group">
            <div class="form-material">
                <input type="hidden" name="link" class="listfield" data-name="link" value="{{$cs->link or ''}}" />                      
                <label for="link">Link</label>
            </div>
        </div>
        <div class="form-group">
            <div class="form-material">
                <div class="css-control css-control-info css-checkbox">
                    <input class="css-control-input2 listfield" name="blank" data-name="blank" type="checkbox" value="1" @if($cs->blank == true)checked @endif>
                    <span class="css-control-indicator"></span> Abrir en pestaña nueva
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-material">
                <input type="hidden" class="listfield" name="desktop_image" data-name="image" value="{{ $cs->desktop_image or '' }}">
                <label for="image">Imagen Desktop</label>
            </div>
        </div>
        <div class="form-group">
            <div class="form-material">
                <input type="hidden" class="listfield" name="mobile_image" data-name="image" value="{{ $cs->mobile_image or '' }}">
                <label for="image">Imagen Mobile</label>
            </div>
        </div>
    </form>
</div>