<div class="component component-tab" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    @isset($fields->tabs)

        @php($items = fieldObjectsOfArray($fields->tabs,\App\Folder::class) )
        <div class="component-tab__wrap">
            <div class="component-tab__container tab">
                @foreach($items as $key => $i)
                    <button class="component-tab__link tablinks {{$key==0?'active':''}}" title="{{ $i->name }}" onclick="openTab(event, 'tab_{{ $i->id }}')">{{ $i->name }}</button>
                @endforeach
            </div>
        </div>

        @foreach($items as $i)
            <div id="tab_{{ $i->id }}" class="component-tab__content tabcontent dismiss-childs" style="display:{{$loop->first?'block':'none'}};">
              <div>{!! $i->html() !!}</div>
            </div>
        @endforeach

    @else

        <div class="alert alert-warning alert-dismissable" role="alert">
            <h3 class="alert-heading font-size-h4 font-w400">Tabs</h3>
            <p class="mb-0">El componente no tiene páginas seleccionadas <a class="btn-edit" href="javascript:void(0)">seleccionar</a>!</p>
        </div>

    @endisset

</div>

<script type="text/javascript">


    function openTab(evt, cityName) {

        var i, tabcontent, tablinks;

        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }


    $(document).ready(function() {

        // $('.component button.tablinks').first().trigger('click');

    });


</script>
