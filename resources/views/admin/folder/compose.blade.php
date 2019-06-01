@extends('admin.master.app')

@section('bodyclass', 'folder-compose-page')

@section('topbar')

        <button id="btn_bg" type="button" class="btn btn-circle2 btn-dual-secondary bg-primary text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height:35px; margin-right:10px;">
            <i class="fa fa-navicon"></i>
        </button>
        <div class="dropdown-menu min-width-150" aria-labelledby="page-header-themes-dropdown">
            {{-- <h6 class="dropdown-header text-center">Propiedades</h6>                                                                                 --}}
            <button id="btn_properties2" type="button" class="dropdown-item" id="drop-layout" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Propiedades de la página" aria-haspopup="true" aria-expanded="false">
                <i class="si si-note"></i> Página
            </button>
            <button id="btn_cover2" type="button" class="dropdown-item" id="drop-layout" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Textos e imagen de portada"  aria-haspopup="true" aria-expanded="false">
                    <i class="si si-picture"></i> Portada
            </button>

            
            <div class="dropdown-divider"></div>

            <button id="btn_bg" type="button" class="dropdown-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa-television"></i> Plantilla
            </button>
            <div class="dropdown-menu min-width-150" aria-labelledby="page-header-themes-dropdown">
                @foreach($layouts as $l)
                    <button type="button" class="dropdown-item  {!! $l->id==$item->layout_id?'btn-alt-primary':'' !!}" data-set="layout" data-layout="{{$l->id}}"  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{$l->title}}">
                        <img src="{{URL::asset('/images/layouts/'.$l->icon.'.svg')}}" class="tools-layout-icon" /><span class="tools-layout-label">{{$l->title}}</span>
                    </button>
                @endforeach
            </div>
    
            
            <div class="dropdown-divider"></div>
            
            <button id="btn_profile2" type="button" class="dropdown-item" id="drop-layout" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Seguridad de la página"  aria-haspopup="true" aria-expanded="false">
                <i class="si si-lock"></i> Permisos
            </button>                                        
            
            <div class="dropdown-divider"></div>
            
            <a href="{{route('admin.folder.panel',['id'=>$item->id])}}" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ver en el Explorador" >
                <i class="si si-folder"></i> Localizar en Explorador
            </a>
            <a href="{{$item->getLink()['href']}}" target="_blank" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ver página en nueva ventana" >
                <i class="si si-eye"></i> Ver
            </a>


        </div>

    <div class="btn-group" role="group">
        <h4 class="topbar-title">{{$item->name}}</h4>    
    </div>

@endsection

@section('content')

    {{-- @include('admin.master.floatbar') --}}

    {{-- MODAL DE EDIT DE CONTENIDOS --}}
    <div class="modal fade" id="modal-content-edit" tabindex="-1" role="dialog" aria-labelledby="modal-content-edit" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
            <div class="modal-content">

                <div class="iframe-loading">
                    <div class="timeline-wrapper">
                      <div class="timeline-item">
                        <div class="animated-background facebook">
                          <div class="background-masker header-top"></div>
                          <div class="background-masker header-left"></div>
                          <div class="background-masker header-right"></div>
                          <div class="background-masker header-bottom"></div>
                          <div class="background-masker subheader-left"></div>
                          <div class="background-masker subheader-right"></div>
                          <div class="background-masker subheader-bottom"></div>
                          <div class="background-masker content-top"></div>
                          <div class="background-masker content-first-end"></div>
                          <div class="background-masker content-second-line"></div>
                          <div class="background-masker content-second-end"></div>
                          <div class="background-masker content-third-line"></div>
                          <div class="background-masker content-third-end"></div>
                        </div>
                      </div>
                    </div>
                </div>

                <iframe id="iframe-content-edit" src="" style="zoom:1" width="99.6%" height="600" frameborder="0"></iframe>

            </div>
        </div>
    </div>
    {{-- FIN MODAL DE EDIT DE CONTENIDOS --}}


    {{-- MODAL DE EDIT DE PROPIEDADES --}}
    <div class="modal fade" id="modal-properties" tabindex="-1" role="dialog" aria-labelledby="modal-properties" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
            <div class="modal-content">

                <form class="form-properties" action="" method="post">

                    <!-- Box -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Propiedades</h3>
                            <div class="block-options">
                            </div>
                        </div>
                        <div class="block-content">

                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre.." value="{{ $item->name }}">
                                    <label for="name">Nombre</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Url.."  value="{{ $item->slug }}">
                                    <label for="slug">Url</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="external" name="external" placeholder="http://.."  value="{{ $item->external or ''}}">
                                    <label for="external">Url externa</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-material">
                                    <label class="css-control css-control-primary css-checkbox">
                                        <input type="checkbox" id="blank" name="blank" class="css-control-input2" {{ $item->blank==1?'checked':'' }}  value="1">
                                        <span class="css-control-indicator"></span> Abrir en Ventana nueva
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-material">
                                    <label class="css-control css-control-primary css-checkbox">
                                        <input type="checkbox" id="published" name="published" class="css-control-input2" {{ $item->published==1?'checked':'' }}  value="1">
                                        <span class="css-control-indicator"></span> Visible
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <label class="css-control css-control-info css-checkbox">
                                        <input type="checkbox" id="pinned" name="pinned" class="css-control-input2" {{ $item->pinned==1?'checked':'' }}  value="1">
                                        <span class="css-control-indicator"></span> Destacado
                                    </label>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="form-material">
                                    <select class="js-select2 form-control select2-with-icon" id="layout" name="layout" data-placeholder="Cual?..">
                                        <option></option><!-- placeholder -->
                                        @foreach($layouts as $l)
                                            <option value="{{$l->id}}"  {{ $item->layout_id==$l->id?'selected':'' }} data-icon="{{URL::asset('/images/layouts/'.$l->icon.'.svg')}}">{{$l->title}}</option>
                                        @endforeach
                                    </select>
                                    <label for="layout">Plantilla</label>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                 <div class="form-material">
                                      <label for="rank">Jerarquia</label>
                                      <input class="param" type="hidden" id="rank" name="rank" value="{{ $item->rank or 0 }}" />
                                      <div data-score="{{ $item->rank or 0 }}" data-number="10" data-star-on="fa fa-fw fa-paw text-info" data-star-off="fa fa-fw fa-paw text-muted" ></div>
                                 </div>
                             </div>

                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <div class="form-group" style="margin-bottom:0px">
                                <button id="btn-save" type="submit" class="btn btn-alt-primary action-button" on="rest"><i class="fa fa-spin fa-asterisk mr-5 on-working"></i><span class="on-rest">Guardar</span></button>
                                <button id="btn-cancel" type="button" class="btn btn-alt-secondary">Cancelar</button>
                            </div>
                        </div>
                    </div>
                    <!-- END Box -->

                </form>

            </div>
        </div>
    </div>
    {{-- FIN MODAL DE EDIT DE PROPIEDADES --}}


    {{-- MODAL DE EDIT DE COVER --}}
    <div class="modal fade" id="modal-cover" tabindex="-1" role="dialog" aria-labelledby="modal-cover" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
            <div class="modal-content">

                <form class="form-cover" action="" method="post">

                    <!-- Box -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Portada</h3>
                            <div class="block-options">
                            </div>
                        </div>
                        <div class="block-content">

                            <div class="form-group">
                                <div class="form-material">
                                    <textarea class="form-control listfield" id="title" name="title" placeholder="">{{ $item->cover->title }}</textarea>
                                    <label for="title">Título</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder=""  value="{{ $item->cover->subtitle }}">
                                    <label for="subtitle">Sutítulo</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <input type="hidden" class="listfield" name="image" data-name="image" value="{{ $item->cover->image }}">
                                    <label for="image">Imagen</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="description" name="description" placeholder=""  value="{{ $item->cover->description }}">
                                    <label for="description">Descripción</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="js-datepicker form-control" name="date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd/mm/yyyy" placeholder="dd/mm/aaaa" value="{{ $item->cover->getDate('d/m/Y') }}">
                                    <label for="date">Fecha&nbsp;<small>(usado en componentes que ordenan por este campo)</small></label>
                                </div>
                            </div>

                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <div class="form-group" style="margin-bottom:0px">
                                <button id="btn-save" type="submit" class="btn btn-alt-primary action-button" on="rest"><i class="fa fa-spin fa-asterisk mr-5 on-working"></i><span class="on-rest">Guardar</span></button>
                                <button id="btn-cancel" type="button" class="btn btn-alt-secondary">Cancelar</button>
                            </div>
                        </div>
                    </div>
                    <!-- END Box -->

                </form>

            </div>
        </div>
    </div>
    {{-- FIN MODAL DE EDIT DE COVER --}}


    {{-- MODAL DE EDIT DE PERFILES --}}
    <div class="modal fade" id="modal-profile" tabindex="-1" role="dialog" aria-labelledby="modal-profile" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
            <div class="modal-content">

                <form class="form-profile" action="" method="post">

                    <!-- Box -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Permisos</h3>
                            <div class="block-options">
                            </div>
                        </div>
                        <div class="block-content">

                            <div class="form-group">
                                <div class="form-material">
                                    <label for="profiles">Perfiles que pueden editar&nbsp;<small style="color: #c8cacc;">(Además de los administradores)</small></label>
                                    <input type="hidden" name="profiles" value="{{ $item->profiles->implode('id',',') }}">
                                    <ul id="available_profiles" class="profile-list connectedSortable">
                                        @foreach($item->profiles as $profile)
                                            <li data-id="{{$profile->id}}" class="ui-state-default">{{$profile->name}}</li>
                                        @endforeach
                                    </ul>
                                    <ul id="selected_profiles" class="profile-list connectedSortable">
                                        @foreach($availableProfiles as $profile)
                                            <li data-id="{{$profile->id}}" class="ui-state-default">{{$profile->name}}</li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <div class="form-group" style="margin-bottom:0px">
                                <button id="btn-save" type="submit" class="btn btn-alt-primary action-button" on="rest"><i class="fa fa-spin fa-asterisk mr-5 on-working"></i><span class="on-rest">Aceptar</span></button>
                                <button id="btn-cancel" type="button" class="btn btn-alt-secondary">Cancelar</button>
                            </div>
                        </div>
                    </div>
                    <!-- END Box -->

                </form>

            </div>
        </div>
    </div>
    {{-- FIN MODAL DE EDIT DE PERFILES --}}


    <div id="workspace">

        <section class="module">



            <div id="panel_tools" class="block window block-themed" data-panel="tools">

                <div class="block-header bg-primary">
                    <h3 class="block-title">Herramientas</h3>
                    <div class="block-options" style="padding-left:0px">
        
            
                    </div>
                </div>
                <div class="block-content">
                    
                    <ul class="nav nav-tabs nav-tabs-block align-items-center" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" href="#tab-store">Nuevo</a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-bolsito">Bolsito</a>
                        </li>   
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-valija">Portapapeles</a>
                        </li>                     
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-trash"><i class="si si-trash"></i></a>
                        </li>                        
                    </ul>
                    
                    <div class="tab-content">
                        
                        <div class="tab-pane active show" id="tab-store" role="tabpanel">

                            <div id="store_family_select" class="dropdown">
                                <button type="button" class="btn-block-option dropdown-toggle current-family" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Todos</button>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(69px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item family-filter" href="javascript:void(0)" data-family="*">
                                        Todos
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    @foreach($families as $f)
                                        <a class="dropdown-item family-filter" href="javascript:void(0)" data-family="{{$f->id}}">
                                            <i class="mr-5 fa-fw {{$f->icon}}"></i>{{$f->title}}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div id="store" class="holder" data-holder="store">
                                @foreach($components as $c)
                                    <block class="component component-{{ $c->name }} js-popover {{ $c->has_dynamics==1?'has-dynamics':'' }}" data-toggle="popover" data-component="{{ $c->id }}" data-family="{{ $c->component_family_id }}" data-content-id="0" data-placement="top" data-placement="right" data-content="{{ $c->description }} {{ $c->has_dynamics==1?'<strong>(puede ser dinámico)</strong>':'' }}" data-original-title="{{ $c->title }}">
                                        <img src="{{ $c->getIcon() }}" title="{{ $c->title }}" alt="{{ $c->title }}"/>
                                    </block>
                                @endforeach
        
                            </div>
                        
                        </div>

                        <div class="tab-pane" id="tab-bolsito" role="tabpanel">
                            
                            <div id="bag" class="holder" data-holder="bag">

                                @include('folder.print', ['holder' => 'bag', 'action' => 'print' ])
        
                            </div>
                            
                        </div>
                        
                        <div class="tab-pane" id="tab-valija" role="tabpanel">
                            
                            <div id="clipboard" class="holder" data-holder="clipboard">

                                @include('folder.clipboard', ['action' => 'print' ])
        
                            </div>
                        
                        </div>
                        
                        
                        <div class="tab-pane" id="tab-trash" role="tabpanel">

                            <a href="#" id="btn_empty_trash" type="button" class="btn btn-danger">
                                Vaciar Papelera
                            </a>
                                
                            <div id="trash" class="holder" data-holder="trash">
    
                                @include('folder.print', ['holder' => 'trash', 'action' => 'print'])
        
                            </div>
                            
                        </div>
                    
                    </div>
                    

                </div>
        
            </div>


            <div id="layout_container">
                {{-- acá se imprimen los contenedores reales en base al layout, como si fuera el view normal pero con el edit --}}
                @include('folder.layout.' . $item->layout->name, ['action' => 'print'])
            </div>

        </section>

    </div>

    <script type="text/javascript">

        jQuery(function(){
            // Init page helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)
            Codebase.helpers(['datepicker']);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        var store;
        var $store;

        var bag;
        var $bag;


        var clipboard;
        var $clipboard;


        var trash;
        var $trash;

        $(document).ready(function() {

            disableContentClick();

            bindCompose();

            bindWindows();

            bindContentEdit();

            bindTopbar();

            initPropertiesModal();

            initCoverModal();

            initProfileModal();

        });

        var bindTopbar = function() {

            $('button[data-set="layout"]').on('click',function(e){
                setLayout($(this));
            });

        }

        var initPropertiesModal = function() {

            $('#btn_properties, #btn_properties2').on('click',function(e){
                openPropertiesWindow();
            });

            function openPropertiesWindow(){

                $("#modal-properties").on("shown.bs.modal",function(a){


                }).on('hidden.bs.modal', function (e) {

                }).modal("show");

            }

        }

        var initCoverModal = function() {

            $('#btn_cover, #btn_cover2').on('click',function(e){
                openCoverWindow();
            });

            function openCoverWindow(){

                $("#modal-cover").on("shown.bs.modal",function(a){

                }).on('hidden.bs.modal', function (e) {

                }).modal("show");

            }

        }

        var initProfileModal = function() {

            $('#btn_profile, #btn_profile2').on('click',function(e){
                openProfileWindow();
            });

            function openProfileWindow(){

                $("#modal-profile").on("shown.bs.modal",function(a){

                }).on('hidden.bs.modal', function (e) {

                }).modal("show");

            }

        }

        var disableContentClick = function() {
            $('.holder').on('click','.component a',function(e){
                e.preventDefault();
            })
        }

        // envia array con todos los elementos de cada holder
        var saveComposition = function() {

            var data = {};
                data.holders = {};

            // selecciono todos los horlders que no sean store y que no esten dentro de un componente tab (por recursivo)
            $('#workspace .holder:not([data-holder="store"])').not("#workspace .tabcontent .holder").each(function(){
                var holder = $(this);
                var holderId =  holder.attr("data-holder");
                var components = [];

                holder.find('> .component').each(function(){
                    var content = $(this);
                    var contentId = content.attr("data-content-id");

                    components.push(contentId);
                });

                data.holders[holderId] = components;
            });

            $.ajax({
                url: '{{ route('admin.folder.compose',[ 'id' => $item->id] ) }}',
                type: 'POST',
                data: data,
                dataType: 'JSON',
                success: function (response) {
                    console.log(response)

                    $.notify({
                        message: 'Guardado!',
                    },{
                        type: 'success',
                        placement: { from: 'top', align: 'center'}
                    });

                }
            });

            
            updateCompositionScreenshot();

        }

        // genera una captura del layout actulizado y la guarda en la base de datos
        var updateCompositionScreenshot = function() {

            var $layout = $('.layout');
            // html2canvas($layout[0]).then(function(canvas) {
            //     document.body.appendChild(canvas);
            // });

            html2canvas($layout[0],
            {
                // width:300,
                // height:300
            }
            ).then(function(canvas) {

                var width = 300;
                var height =  width * canvas.height / canvas.width ;

                // este CANVAS extra es para resizear el base
                var extra_canvas = document.createElement("canvas");
                    extra_canvas.setAttribute('width',width);
                    extra_canvas.setAttribute('height',height);

                var ctx = extra_canvas.getContext('2d');
                    ctx.drawImage(canvas,0,0,canvas.width, canvas.height,0,0,width,height);
                // var dataURL = extra_canvas.toDataURL();

                // cuando usaba base64 y no blob
                // var data = {};
                    // data.base64 = dataURL;
                    // data.base64 = canvas.toDataURL();

                if (extra_canvas.toBlob) {
                    extra_canvas.toBlob(
                        function (blob) {

                            var data = new FormData();
                                data.append('image', blob);

                            $.ajax({
                                url: "{{ route('admin.folder.screenshot',[ 'id' => $item->id] ) }}",
                                type: 'POST',
                                processData: false,
                                contentType: false,
                                data: data,
                                // dataType: 'JSON',
                                success: function (response) {
                                    // console.log(response)
                                }
                            });

                        },
                        'image/jpeg'
                    );
                }


            });

        }


        var setLayout = function(el) {

            var data = {};
                data.layout = el.attr('data-layout');

            $.ajax({
                url: '{{ route('admin.folder.set.layout',[ 'id' => $item->id] ) }}',
                type: 'POST',
                data: data,
                dataType: 'JSON',
                success: function (response) {
                    // console.log(response)

                    location.reload();

                    $.notify({
                        message: 'Actualizado!',
                    },{
                        type: 'success',
                        placement: { from: 'top', align: 'center'}
                    });

                },
                error: function (response) {
                    console.log(response);

                    if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION

                        $.notify({
                            message: 'Problemas con los campos',
                        },{
                            type: 'danger',
                            placement: { from: 'top', align: 'center'}
                        });

                    }
                    else{ // ERROR

                        $.notify({
                            message: 'Error al guardar cambios',
                        },{
                            type: 'danger',
                            placement: { from: 'top', align: 'center'}
                        });

                    }

                }
            });

        }

        var bindWindows = function() {

            var resizeId;
            $(window).resize(function() {
                clearTimeout(resizeId);
                resizeId = setTimeout(doneResizing, 500);
            });

            $('.window').draggable({
                handle: '.block-title',
                stop: function() {
                    checkWindowIntegrity($(this));
                    saveWindowPosition($(this));
                }
            });

            $('.window').resizable({
                stop: function() {
                    checkWindowIntegrity($(this));
                    saveWindowSize($(this));
                }
            });

            $('.window').each(function(){
                var $window = $(this);
                setTimeout(function() {
                    $window.show();
                    checkWindowIntegrity($window);
                }, 500);
            })

            $('.window .btn-window-show').on('click',function(){
                var el = $(this).closest('.window');
                maximizeWindow(el);
            });
            $('.window .btn-window-hide').on('click',function(){
                var el = $(this).closest('.window');
                minimizeWindow(el);
            });
            $('.window .block-header').on('dblclick',function(){
                var el = $(this).closest('.window');
                if(el.attr('data-window-state')=='1'){
                    minimizeWindow(el);
                }
                else{
                    maximizeWindow(el);
                }
            });

            

            $('#panel_tools .nav-link').on('click',function(){
                
                var value = $(this).attr('href');

                saveUserConfig('composer-panel-tools-tab',value);

            });


            var doneResizing = function(){

                $('.window').each(function(){
                    var $window = $(this);
                    checkWindowIntegrity($window);
                })

            }

            var checkWindowIntegrity = function(el) {

                var w = $(window);

                if(el.position().top < 40){
                    el.css('top','0px');
                }

                if(el.position().left < 40){
                    el.css('left','0px');
                }

                if(el.position().left + el.width() > w.width() - 40){
                    var tmp = w.width() - el.width();
                    el.css('left', tmp + 'px');
                }

                if(el.position().top + el.height() > w.height() - 40){
                    var tmp = w.height() - el.height();
                    el.css('top', tmp + 'px');
                }

                 if(el.width() < 150){
                    el.css('width','150px');
                }

                if(el.height() < 42){
                    el.css('height','42px');
                }

            }

            var minimizeWindow = function(el,save=true) {

                el.attr('data-window-state','0');

                el.resizable('disable');

                el.css('max-height','42px');

                el.find('.btn-window-hide').hide();
                el.find('.btn-window-show').show();


                if(!save) return false;

                var value = 0;
                var name = 'composer-window-' +  el.attr('data-panel') + '-state';

                saveUserConfig(name,value);

            }

            var maximizeWindow = function(el,save=true) {

                el.attr('data-window-state','1');

                el.resizable('enable');

                el.css('max-height','none');

                el.find('.btn-window-show').hide();
                el.find('.btn-window-hide').show();

                if(!save) return false;

                var value = 1;
                var name = 'composer-window-' +  el.attr('data-panel') + '-state';

                checkWindowIntegrity(el);

                saveUserConfig(name,value);

            }

            var saveWindowSize = function(el) {

                var panel = el.attr('data-panel');

                var value = {};
                    value.width = el.css('width');
                    value.height = el.css('height');

                value = JSON.stringify(value);

                var name = 'composer-window-' +  panel + '-size';

                saveUserConfig(name,value);

            }

       

            var saveWindowPosition = function(el) {

                var value = {};
                    value.top = el.css('top');
                    value.left = el.css('left');

                value = JSON.stringify(value);

                var name = 'composer-window-' +  el.attr('data-panel') + '-position';

                saveUserConfig(name,value);
            }


            $('.family-filter').on('click',function(){

                var family = $(this).attr('data-family');
                if(family=="*"){
                    $('.holder[data-holder="store"] .component[data-family="1"]').hide();
                    $('.holder[data-holder="store"] .component:not([data-family="1"])').show();
                    $('.current-family').html('Todos');
                }
                else{
                    $('.current-family').html($(this).html());
                    $('.holder[data-holder="store"] .component:not([data-family="'+family+'"])').hide();
                    $('.holder[data-holder="store"] .component[data-family="'+family+'"]').show();
                }

                saveUserConfig('composer-family-filter',family);

            })


            @if($user->getConfig('composer-family-filter')!='')
                $('.family-filter[data-family="{{$user->getConfig('composer-family-filter')}}"]').first().trigger('click');
            @else
                $('.family-filter').first().trigger('click');
            @endif


            // windows es un array simple con los nombres de todos los windows, para no redundar metodos por ventana
            @foreach($windows as $window)

                @foreach($user->getConfig('composer-window-'.$window.'-position',true) as $key => $value)
                    $('.window[data-panel="{{$window}}"]').css('{{$key}}','{{$value}}');
                @endforeach

                @foreach($user->getConfig('composer-window-'.$window.'-size',true) as $key => $value)
                    $('.window[data-panel="{{$window}}"]').css('{{$key}}','{{$value}}');
                @endforeach

                @if($user->getConfig('composer-window-'.$window.'-state')=='0')
                    minimizeWindow($('.window[data-panel="{{$window}}"]'),false);
                @endif

            @endforeach

            // tab visible guardado
            var initPanel = '{!! $user->getConfig('composer-panel-tools-tab',false) !!}';
            $('#panel_tools .nav-item .nav-link[href="'+initPanel+'"]').trigger('click');
            

        }

        var bindCompose = function(el) {

            store = document.getElementById('store');
            $store = $(store);

            bag = document.getElementById('bag');
            $bag = $(bag);

            clipboard = document.getElementById('clipboard');
            $clipboard = $(clipboard);

            trash = document.getElementById('trash');
            $trash = $(trash);

            

            Sortable.create(store, {
                sort: false,
                group: {
                    name: 'store',
                    put: function (to) {
                        return false;
                    },
                    pull: function (to, from) {
                        return 'clone';
                    }
                },
                animation: 100,
                onStart: function (/**Event*/evt) {
                    $("[data-toggle='popover']").popover('hide'); // tengo que volar los popovers
                },
                onClone: function (evt) {
                    console.log('clone')
                    // var origEl = evt.item;
                    // var cloneEl = evt.clone;

                    // console.log(origEl);
                    // console.log(cloneEl);

                    $store.addClass('disabled');
                }

            });

            Sortable.create(bag, {
                sort: false,
                group: {
                    name: 'bag',
                        put: function (to) {
                        return true;
                    }
                },
                animation: 100,
                onAdd: function (evt) {
                    if(!askForNewContent(evt)){
                        saveComposition();
                    }
                }
            });


            Sortable.create(clipboard, {
                sort: false,
                group: {
                    name: 'clipboard',
                        put: function (to) {
                        return true;
                    }
                },
                animation: 100,
                onAdd: function (evt) {
                    if(!askForNewContent(evt)){
                        saveComposition();
                    }
                }
            });

            Sortable.create(trash, {
                sort: false,
                group: {
                    name: 'trash',
                        put: function (to) {
                        return true;
                    }
                },
                animation: 100,
                onAdd: function (evt) {

                    var from = $(evt.from);
                    var item = $(evt.item);

                    if(from.attr('data-holder') == 'store'){
                        item.remove();
                    }
                    else{
                        saveComposition();
                    }

                },

            });


            // busco todos los holders del layout y mapeo el sortable (evitando bag, clipboard, trash y store)
            $('.holder:not([data-holder="store"]):not([data-holder="trash"]):not([data-holder="bag"]):not([data-holder="clipboard"])').each(function(){

                var holder = $(this);
                var name = holder.attr('data-holder');
                console.log(name)
                Sortable.create(holder[0], {
                    group: {
                        name: name,
                        put: function (to) {
                            return true;
                        }
                    },
                    animation: 100,
                    onAdd: function (evt) {
                        if(!askForNewContent(evt)){
                            saveComposition();
                        }
                    },
                    onUpdate: function (evt) {
                        saveComposition();
                    },
                });


            })

            $("#btn_hold_empty").on('click',function(e){
              e.preventDefault();
              $bag.empty();
            })

            $("#btn_empty_trash").on('click', '', function(e){
                e.preventDefault();

                var contents = [];
                $("#trash > .component").each(function(){
                    var contentId =  $(this).attr("data-content-id");
                    contents.push(contentId);
                })

                var data = {};
                    data.contents = contents;

                $.ajax({
                    url: '{{ route('admin.folder.content.remove',[ 'id' => $item->id] ) }}',
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    success: function (response) {

                        $("#trash > .component").remove();

                        $.notify({
                            message: 'Papelera vaciada!',
                        },{
                            type: 'success',
                            placement: { from: 'top', align: 'center'}
                        });

                    }
                });

            })


        }

        var bindContentEdit = function() {

            var iframeContentEdit;

            // funcion que se llama del edit de cada componente al guardar o cancelar
            window.closeContentEditModal = function(){
                $('#modal-content-edit').modal('hide');
                $('#modal-content-edit iframe').attr('src','')
            };

            // abrir modal ifram de editar contenido
            $(".layout").on('click','.component .btn-edit', function(e){
                e.preventDefault();
                openEditWindow($(this).closest('.component'));
            });

            // abrir modal ifram de editar contenido
            $(".layout").on('dblclick','.component', function(e){
                e.preventDefault();
                openEditWindow($(this));
            })

            // $('.holder:not([data-holder="store"]):not([data-holder="trash"]):not([data-holder="bag"]) .component').contextmenu(function() {
            //     console.log( "Handler for .contextmenu() called." );
            //     console.log($(this).attr('data-content-id'))
            // });
            $.contextMenu({
                selector: '.holder:not([data-holder="store"]):not([data-holder="trash"]):not([data-holder="bag333"]):not([data-holder="clipboard3333"]) .component',
                callback: function(key, options) {
                    // console.log("clicked: " + key);
                    // console.log($(this).attr('data-content-id'))

                    switch (key) {

                        case 'edit':
                            openEditWindow($(this));
                            break;

                        case 'clon':
                            clonContent($(this));
                            break;

                        case 'trash':
                            var destHolder = $('.holder[data-holder="trash"]');
                            $(this).prependTo(destHolder);
                            saveComposition();
                            break;

                        case 'bag':
                            var destHolder = $('.holder[data-holder="bag"]');
                            $(this).prependTo(destHolder);
                            saveComposition();
                            break;

                        case 'clipboard':
                            var destHolder = $('.holder[data-holder="clipboard"]');
                            $(this).prependTo(destHolder);
                            saveComposition();
                            break;

                        default:
                            break;

                    }

                },
                items: {
                    "edit": {name: "Editar", icon: "edit"},
                    "sep1": "---------",
                    "clon": {name: "Clonar", icon: "copy"},
                    "sep2": "---------",                    
                    "bag": {name: "Al Bolsito", icon: "cut"},
                    "clipboard": {name: "Al Portapapeles", icon: "cut"},
                    "sep3": "---------",
                    "trash": {name: "A la Papelera", icon: "delete"},
                }
            });


            var resizeTimer;
            $(window).on('resize', function(e) {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    resizeIframe();
                }, 500);
            });

            function resizeIframe(){
                var height = ($(window).height()*0.9) + 'px';
                $('#iframe-content-edit').attr('height',height).css('height',height);

            }
            resizeIframe();



            function openEditWindow(content){

                // busco datos del EL actual para llamar a la URL del EDIT y esperar a que se actualice
                //var content = $(this);
                var editingContentId = content.attr('data-content-id');
                var editUrl = '{{route('admin.content.edit',['id'=>'xxx'])}}'
                    editUrl = editUrl.replace('xxx',editingContentId);

                console.log('URL DE IFRAME: ' + editUrl)

                // console.log('Editando contenido ' + editingContentId)
                $("#modal-content-edit").on("shown.bs.modal",function(a){

                    // le digo al iframe que url cargar y espero a que cargue para desaparecer el preloader
                    iframeContentEdit = document.getElementById('iframe-content-edit');
                    iframeContentEdit.addEventListener("load", function() {
                        $('#modal-content-edit .iframe-loading').fadeOut();
                    });
                    iframeContentEdit.src = editUrl;

                }).on('hidden.bs.modal', function (e) {
                    // cuando cerré la ventana de edit, busco la llamada que me devuelva el componente actualizado para reemplazar el bloque

                    // descargo el iframe y muestro el preloader para la próxima
                    iframeContentEdit.src = '';
                    $('#modal-content-edit .iframe-loading').show(); // TODO: ESTO NO ESTARIA FUNCIONANDO

                    var printUrl = '{{route('admin.content.print',['id'=>'xxx'])}}'
                        printUrl = printUrl.replace('xxx',editingContentId);

                    $.ajax({
                        url: printUrl,
                        type: 'GET',
                        success: function (response) {
                            // console.log(response)
                            console.log('Refresh Content..');

                            content.replaceWith(response);

                            setTimeout(function() {

                                var contentId = content.attr('data-content-id');

                                $contentToShot = $('.component[data-content-id="'+contentId+'"]') ;

                                screenshotContent(contentId, $contentToShot);

                            }, 10);
                            

                        }
                    });

                }).modal("show");

            }


            

            function clonContent(content){
                
                var contentId = content.attr('data-content-id');

                var data = {};
                data.contentId = contentId;
                
                $.ajax({
                    url: '{{ route('admin.folder.content.clon',[ 'id' => $item->id] ) }}',
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    success: function (response) {
                        console.log(response)

                        var cloned = content.clone()

                        cloned.attr('data-content-id', response.contentId);
                        
                        cloned.insertAfter(content);

                        saveComposition();
                    }
                });

            }


        }

        // crea un nuevo contenido (instancia de componente) y lo inserta
        var askForNewContent = function(evt) {
            // console.log('askForNewContent')

            var item = $(evt.item);
            var to = $(evt.to);
            var from = $(evt.from);

            if(from.attr('data-holder') != 'store'){
                return false;
            }

            var data = {};
                data.holder = to.attr('data-holder');
                data.component = item.attr('data-component');

            $.ajax({
                url: '{{ route('admin.folder.content.add',[ 'id' => $item->id] ) }}',
                type: 'POST',
                data: data,
                dataType: 'JSON',
                success: function (response) {
                    // console.log(response)

                    item.attr('data-content-id',response.contentId); // seteo el id del content creado en el back para que queden mapeados
                    item.replaceWith(response.html); // item.html(response.html); // grave error porque me dejaba el nuevo componente encapsulado en el esqueleto del viejo
                    item.popover('destroy'); // destruyo el popover que aparece en el store
                    $("[data-toggle='popover']").popover('hide');

                    $store.removeClass('disabled');

                    saveComposition();


                    $contentToShot = $('.component[data-content-id="'+response.contentId+'"]') ;
                    screenshotContent(response.contentId, $contentToShot);



                }
            });

            return true;

        }

        var screenshotContent = function(contentId, contentToShot){
            console.log('Taking Content Screenshot..');
        
            // console.log(contentToShot);

            html2canvas(contentToShot[0],
            {
                // width:300,
                // height:300
            }
            ).then(function(canvas) {
                
                var width = 400;
                var height =  width * canvas.height / canvas.width ;

                // este CANVAS extra es para resizear el base
                var extra_canvas = document.createElement("canvas");
                    extra_canvas.setAttribute('width',width);
                    extra_canvas.setAttribute('height',height);

                var ctx = extra_canvas.getContext('2d');
                    ctx.drawImage(canvas,0,0,canvas.width, canvas.height,0,0,width,height);


                if (extra_canvas.toBlob) {
                    extra_canvas.toBlob(
                        function (blob) {

                            var data = new FormData();
                                data.append('image', blob);
                                data.append('id', contentId);

                            $.ajax({
                                url: "{{ route('admin.content.screenshot') }}",
                                type: 'POST',
                                processData: false,
                                contentType: false,
                                data: data,
                                success: function (response) {
                                    console.log(response)
                                    
                                    
                                    contentToShot.find('img.idle-screenshot').attr('src',response.image);


                                }
                            });

                        },
                        'image/jpeg'
                    );
                }


            });


        }


        var propertiesFormInit = function() {
            var form = $('form.form-properties');
            var submitButton = form.find('#btn-save');
            var cancelButton = form.find('#btn-cancel');
            var submitUrl = '{{ route('admin.folder.edit',[ 'id' => $item->id] ) }}';

            // Forms Validation https://github.com/jzaefferer/jquery-validation
            var formValidationInit = function(){
                form.validate({
                    ignore: [],
                    errorClass: 'invalid-feedback animated fadeInDown',
                    errorElement: 'div',
                    errorPlacement: function(error, e) {
                        $(e).parents('.form-group').append(error);
                    },
                    highlight: function(e) {
                        $(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
                    },
                    success: function(e) {
                        $(e).closest('.form-group').removeClass('is-invalid');
                        $(e).remove();
                    },
                    rules: {
                        'name': {
                            required: true,
                            minlength: 3
                        },
                        'slug': {
                            required: true,
                            pattern: /^[A-Za-z\d-.]+$/
                        },
                        // 'layout': {
                        //     required: true
                        // }
                    },
                    messages: {
                        'name': {
                            required: 'Debe ingresar un nombre',
                            minlength: 'El nombre debe tener al menos 3 caracteres'
                        },
                        'slug': {
                            required: 'Debe ingresar un slug',
                            pattern: 'El slug contiene caracteres inválidos'
                        },
                        // 'layout': 'Debe seleccionar una plantilla'
                    }
                });
            };


            var formSubmit = function(){

                if(submitButton.attr('on')=='working') return false;
                submitButton.attr('on','working');

                // corro las validaciones y si me da ok, es que podemos enviar el form
                if(form.valid()){

                    var formdata = false;
                    if (window.FormData){
                        formdata = new FormData(form[0]);
                    }

                    var data = formdata ? formdata : form.serialize();

                    $.ajax({
                        url: submitUrl,
                        type: 'POST',
                        data: data,
                        cache       : false,
                        contentType : false,
                        processData : false,
                        dataType: 'JSON',
                        success: function (response) {
                            submitButton.attr('on','rest');

                            formSubmitedOk(response);

                        },
                        error: function (response) {
                            submitButton.attr('on','rest');
                            // console.log(response);

                            if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION

                                formHasValidations(response);

                            }
                            else{ // ERROR

                                formHasErrors(response);

                            }

                        }
                    });

                }
                else{
                    submitButton.attr('on','rest');
                }

            };

            // el formulario se envió y volvio OK
            var formSubmitedOk = function(response){

                closeModal();

                setTimeout(function() {

                    $('.topbar-title').html(form.find('*[name="name"]').val())

                    $.notify({
                        message: 'Todo perfecto!',
                    },{
                        type: 'success',
                        placement: { from: 'top', align: 'center'}
                    });

                }, 500);


            };

            // el formulario se enviópero surgieron validaciones del lado del controller
            var formHasValidations = function(response){

                if(typeof response.responseJSON.validations != 'undefined'){

                    // el controller nos está informando validaciones del lado del server
                    var validations = response.responseJSON.validations;
                    Object.keys(validations).forEach(function(k){
                        // console.log(k + ' - ' + validations[k]);

                        var fieldGroup = form.find('*[name="'+k+'"]').closest('.form-group');
                            fieldGroup.addClass('is-invalid');
                            fieldGroup.append('<div id="slug-error" class="invalid-feedback animated fadeInDown">'+validations[k]+'</div>');

                    });

                }

                $.notify({
                    message: 'Mejor revisemos antes de enviar',
                },{
                    type: 'danger',
                    placement: { from: 'top', align: 'center'}
                });

            };

            // el formulario al enviarse devolvió algún error (controlado o no)
            var formHasErrors = function(response){

                // Veo si es un error de Laravel, devuelve un Json con la info de debug, caso contrario, asumo que es un texto que devuelvo desde el Controller
                var errorDescription = '';
                if(typeof response.responseJSON != 'undefined'){
                    errorDescription = '<strong>Error:</strong> '  + response.responseJSON.message + '<br /><strong>Lugar:</strong> ' + response.responseJSON.file + '<br /><strong>Linea:</strong> ' + response.responseJSON.line;
                }
                else{
                    errorDescription = response.responseText;
                }

                swal('Mmm.. tenemos un problema', errorDescription, 'error');

            };


            var closeModal = function(){
                $('#modal-properties').modal('hide');
            };

            var initRank = function(){

                $.fn.raty.defaults.starType    = 'i';

                form.find('input[name="rank"]').next().raty({
                    cancel: false,
                    target: false,
                    targetScore: false,
                    precision: false,
                    cancelOff: 'fa fa-fw fa-times-circle text-danger',
                    cancelOn: 'fa fa-fw fa-times-circle',
                    click: function(score, evt) {
                        $(this).prev().val(score);
                    }
                });

            };


            return {
                init: function () {

                    formValidationInit();

                    submitButton.on('click', function(e){
                        e.preventDefault();
                        formSubmit();
                    })

                    cancelButton.on('click', function(e){
                        e.preventDefault();
                        closeModal();
                    })

                    initRank();

                }
            };
        }();
        $(function(){
            propertiesFormInit.init();
        });



        var coverFormInit = function() {
            // var modal = $('form.form-cover');
            var form = $('form.form-cover');
            var submitButton = form.find('#btn-save');
            var cancelButton = form.find('#btn-cancel');
            var submitUrl = '{{ route('admin.folder.cover',[ 'id' => $item->id] ) }}';

            // Forms Validation https://github.com/jzaefferer/jquery-validation
            var formValidationInit = function(){
                form.validate({
                    ignore: [],
                    errorClass: 'invalid-feedback animated fadeInDown',
                    errorElement: 'div',
                    errorPlacement: function(error, e) {
                        $(e).parents('.form-group').append(error);
                    },
                    highlight: function(e) {
                        $(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
                    },
                    success: function(e) {
                        $(e).closest('.form-group').removeClass('is-invalid');
                        $(e).remove();
                    },
                    rules: {
                        'title': {
                            required: true,
                            minlength: 3
                        }
                    },
                    messages: {
                        'title': {
                            required: 'Debe ingresar un nombre',
                            minlength: 'El nombre debe tener al menos 3 caracteres'
                        }
                    }
                });
            };


            var formSubmit = function(){

                if(submitButton.attr('on')=='working') return false;
                submitButton.attr('on','working');

                // corro las validaciones y si me da ok, es que podemos enviar el form
                if(form.valid()){

                    var formdata = false;
                    if (window.FormData){
                        formdata = new FormData(form[0]);
                    }

                    var data = formdata ? formdata : form.serialize();

                    $.ajax({
                        url: submitUrl,
                        type: 'POST',
                        data: data,
                        cache       : false,
                        contentType : false,
                        processData : false,
                        dataType: 'JSON',
                        success: function (response) {
                            submitButton.attr('on','rest');

                            formSubmitedOk(response);

                        },
                        error: function (response) {
                            submitButton.attr('on','rest');
                            // console.log(response);

                            if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION

                                formHasValidations(response);

                            }
                            else{ // ERROR

                                formHasErrors(response);

                            }

                        }
                    });

                }
                else{
                    submitButton.attr('on','rest');
                }

            };

            // el formulario se envió y volvio OK
            var formSubmitedOk = function(response){

                $.notify({
                    message: 'Todo perfecto!',
                },{
                    type: 'success',
                    placement: { from: 'top', align: 'center'}
                });

                closeModal();

            };

            // el formulario se enviópero surgieron validaciones del lado del controller
            var formHasValidations = function(response){

                if(typeof response.responseJSON.validations != 'undefined'){

                    // el controller nos está informando validaciones del lado del server
                    var validations = response.responseJSON.validations;
                    Object.keys(validations).forEach(function(k){
                        // console.log(k + ' - ' + validations[k]);

                        var fieldGroup = form.find('*[name="'+k+'"]').closest('.form-group');
                            fieldGroup.addClass('is-invalid');
                            fieldGroup.append('<div id="slug-error" class="invalid-feedback animated fadeInDown">'+validations[k]+'</div>');

                    });

                }

                $.notify({
                    message: 'Mejor revisemos antes de enviar',
                },{
                    type: 'danger',
                    placement: { from: 'top', align: 'center'}
                });

            };

            // el formulario al enviarse devolvió algún error (controlado o no)
            var formHasErrors = function(response){

                // Veo si es un error de Laravel, devuelve un Json con la info de debug, caso contrario, asumo que es un texto que devuelvo desde el Controller
                var errorDescription = '';
                if(typeof response.responseJSON != 'undefined'){
                    errorDescription = '<strong>Error:</strong> '  + response.responseJSON.message + '<br /><strong>Lugar:</strong> ' + response.responseJSON.file + '<br /><strong>Linea:</strong> ' + response.responseJSON.line;
                }
                else{
                    errorDescription = response.responseText;
                }

                swal('Mmm.. tenemos un problema', errorDescription, 'error');

            };


            var closeModal = function(){
                console.log('close voerasddasasddaada')
                $('#modal-cover').modal('hide');
            };


            return {
                init: function () {

                    formValidationInit();

                    submitButton.on('click', function(e){
                        e.preventDefault();
                        formSubmit();
                    })

                    cancelButton.on('click', function(e){
                        e.preventDefault();
                        closeModal();
                    })

                    form.find('input[data-name="image"]').formImage({
                        service: {
                            url: '{{ route('service.uploader.image.upload') }}',
                            archive: 'contents',
                            validation: {
                                rules: [
                                    {'image': 'required|image|max:102400|dimensions:min_width=100,min_height=100'}
                                ],
                                messages: [
                                    {'image.required': 'Necesitas seleccionar una imagen.'},
                                    {'image.image': 'El archivo seleccionado no es una imagen.'},
                                    {'image.mimes': 'La imagen debe ser jpeg,png,jpg,gif o svg.'},
                                    {'image.dimensions': 'La imagen debe tener al menos 100px de ancho X 100px de alto.'},
                                    {'image.max': 'La imagen debe pesar 10MB como máximo.'}
                                ]
                            }
                        }
                    });


                }
            };
        }();
        $(function(){
            coverFormInit.init();
        });



        var profileFormInit = function() {
            // var modal = $('form.form-cover');
            var form = $('form.form-profile');
            var submitButton = form.find('#btn-save');
            var cancelButton = form.find('#btn-cancel');
            var submitUrl = '{{ route('admin.folder.profile',[ 'id' => $item->id] ) }}';

            // Forms Validation https://github.com/jzaefferer/jquery-validation
            // var formValidationInit = function(){
            //     form.validate({
            //         ignore: [],
            //         errorClass: 'invalid-feedback animated fadeInDown',
            //         errorElement: 'div',
            //         errorPlacement: function(error, e) {
            //             $(e).parents('.form-group').append(error);
            //         },
            //         highlight: function(e) {
            //             $(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            //         },
            //         success: function(e) {
            //             $(e).closest('.form-group').removeClass('is-invalid');
            //             $(e).remove();
            //         },
            //         rules: {
            //             'title': {
            //                 required: true,
            //                 minlength: 3
            //             }
            //         },
            //         messages: {
            //             'title': {
            //                 required: 'Debe ingresar un nombre',
            //                 minlength: 'El nombre debe tener al menos 3 caracteres'
            //             }
            //         }
            //     });
            // };


            var formSubmit = function(){

                if(submitButton.attr('on')=='working') return false;
                submitButton.attr('on','working');

                // corro las validaciones y si me da ok, es que podemos enviar el form
                if(form.valid()){

                    var formdata = false;
                    if (window.FormData){
                        formdata = new FormData(form[0]);
                    }

                    var data = formdata ? formdata : form.serialize();

                    $.ajax({
                        url: submitUrl,
                        type: 'POST',
                        data: data,
                        cache       : false,
                        contentType : false,
                        processData : false,
                        dataType: 'JSON',
                        success: function (response) {
                            submitButton.attr('on','rest');

                            formSubmitedOk(response);

                        },
                        error: function (response) {
                            submitButton.attr('on','rest');
                            // console.log(response);

                            if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION

                                formHasValidations(response);

                            }
                            else{ // ERROR

                                formHasErrors(response);

                            }

                        }
                    });

                }
                else{
                    submitButton.attr('on','rest');
                }

            };

            // el formulario se envió y volvio OK
            var formSubmitedOk = function(response){

                $.notify({
                    message: 'Todo perfecto!',
                },{
                    type: 'success',
                    placement: { from: 'top', align: 'center'}
                });

                closeModal();

            };

            // el formulario se enviópero surgieron validaciones del lado del controller
            var formHasValidations = function(response){

                if(typeof response.responseJSON.validations != 'undefined'){

                    // el controller nos está informando validaciones del lado del server
                    var validations = response.responseJSON.validations;
                    Object.keys(validations).forEach(function(k){
                        // console.log(k + ' - ' + validations[k]);

                        var fieldGroup = form.find('*[name="'+k+'"]').closest('.form-group');
                            fieldGroup.addClass('is-invalid');
                            fieldGroup.append('<div id="slug-error" class="invalid-feedback animated fadeInDown">'+validations[k]+'</div>');

                    });

                }

                $.notify({
                    message: 'Mejor revisemos antes de enviar',
                },{
                    type: 'danger',
                    placement: { from: 'top', align: 'center'}
                });

            };

            // el formulario al enviarse devolvió algún error (controlado o no)
            var formHasErrors = function(response){

                // Veo si es un error de Laravel, devuelve un Json con la info de debug, caso contrario, asumo que es un texto que devuelvo desde el Controller
                var errorDescription = '';
                if(typeof response.responseJSON != 'undefined'){
                    errorDescription = '<strong>Error:</strong> '  + response.responseJSON.message + '<br /><strong>Lugar:</strong> ' + response.responseJSON.file + '<br /><strong>Linea:</strong> ' + response.responseJSON.line;
                }
                else{
                    errorDescription = response.responseText;
                }

                swal('Mmm.. tenemos un problema', errorDescription, 'error');

            };

            var closeModal = function(){
                $('#modal-profile').modal('hide');
            };

            return {
                init: function () {

                    // formValidationInit();

                    submitButton.on('click', function(e){
                        e.preventDefault();
                        formSubmit();
                    })

                    cancelButton.on('click', function(e){
                        e.preventDefault();
                        closeModal();
                    })

                    // actualizar hidden con el valor destino de la lista combinada
                    form.find(".profile-list").sortable({
                      connectWith: ".connectedSortable",
                      stop: function(event, ui) {
                          var ids = $.map(
                              $('#available_profiles').children('li'),
                              function(element) {
                                  return $(element).attr('data-id')
                              })
                          .join(',');
                          $('input[name="profiles"]').val(ids);
                      }
                    }).disableSelection();

                }
            };
        }();
        $(function(){
            profileFormInit.init();
        });

    </script>

@endsection
