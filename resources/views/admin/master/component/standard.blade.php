@extends('admin.master.component.app')

@section('bodyclass', 'content-edit-page')

@section('content')


{{-- @php(var_dump($params)) --}}

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

            <form id="form_content" class="form-main" action="" method="post">
                <input type="hidden" class="form-control param" name="bg" placeholder=""  value="{{ $params->bg or '' }}">


                <h2 class="content-heading" style="padding-top: 0;">{{$item->component->title}}</h2>

                {{-- el componente tiene definido en la base que puede obtener sus datos de forma dinamica --}}
                @if($item->component->has_dynamics)

                    <div class="form-group row">
                         <div class="col-md-12">
                             <div class="form-material floating">
                                 <select class="form-control param" id="origin" name="origin">
                                     <option value="0">Manual</option>
                                     <option value="1" {{$item->origin==1?'selected':''}}>Dinámica</option>
                                 </select>
                                 <label for="material-select2">Origen de la información</label>
                             </div>
                         </div>
                     </div>

                    {{-- el usuario configuro el componente para que busque los datos de forma dinamica --}}
                    <!-- Box -->
                    <div class="block" style="display:{{$item->origin==1?'block':'none'}}" data-origin="1">
                        <div class="block-header block-header-default">

                            <h3 class="block-title">Datos buscados en otro lugar</h3>
                            <div class="block-options">

                            </div>

                        </div>
                        <div class="block-content">

                            <div class="form-group">
                                <div class="form-material">
                                    <select class="js-select2 form-control param" id="pointer" name="pointer" style="width: 100%;" data-placeholder="Buscá..">
                                        <option></option>
                                    </select>
                                    <label for="pointer">Carpeta donde buscar</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control param" name="max" placeholder="('0' es ilimitado)" value="{{ gg($params->max,'0') }}" />
                                    <label for="max">Cantidad máxima de elementos a mostrar (0 es sin limite)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                 <div class="form-material floating">
                                     <select class="form-control param" id="scope" name="scope">
                                         <option value="children" {{ gg($params->scope)=='children'?'selected':'' }}>Hijos directos</option>
                                         <option value="family" {{ gg($params->scope)=='family'?'selected':'' }}>Toda la familia</option>
                                     </select>
                                     <label for="material-select2">Alcance</label>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <div class="form-material">
                                     <label class="css-control css-control-info css-checkbox">
                                         <input class="css-control-input2 param" type="checkbox" id="onlypinned" name="onlypinned" {{ gg($params->onlypinned)==1?'checked=""':'' }}  value="1">
                                         <span class="css-control-indicator"></span> Sólo destacados
                                     </label>
                                 </div>
                             </div>
                             <div class="form-group">
                                  <div class="form-material floating">
                                      <select class="form-control param" id="sort" name="sort">
                                            <option value="id-asc" {{ gg($params->sort)=='id-asc'?'selected':'' }}>Primeros en orden de carga</option>
                                            <option value="id-desc" {{ gg($params->sort)=='id-desc'?'selected':'' }}>Más recientes en orden de carga</option>    
                                            <option value="date-asc" {{ gg($params->sort)=='date-asc'?'selected':'' }}>Primeros según fecha asignada</option>
                                            <option value="date-desc" {{ gg($params->sort)=='date-desc'?'selected':'' }}>Más recientes según fecha asignada</option>                                            
                                            <option value="rank-desc" {{ gg($params->sort)=='rank-desc'?'selected':'' }}>Ranking alto</option>
                                            <option value="rank-asc" {{ gg($params->sort)=='rank-asc'?'selected':'' }}>Ranking bajo</option>
                                      </select>
                                      <label for="material-select2">Ordenar por</label>
                                  </div>
                              </div>

                              <div class="form-group">
                                   <div class="form-material">
                                        <label for="rankfrom">Mostrar a partir de cierta jerarquía</label>
                                        <input class="param" type="hidden" id="rankfrom" name="rankfrom" value="{{ gg($params->rankfrom,'0') }}" />
                                        <div data-score="{{ gg($params->rankfrom,'0') }}" data-number="10" data-star-on="fa fa-fw fa-paw text-info" data-star-off="fa fa-fw fa-paw text-muted" ></div>
                                   </div>
                               </div>

                        </div>

                    </div>
                    <!-- END Box -->

                @endif

                {{-- box de configuracion de contenidos manuales --}}
                <!-- Box -->
                <div class="block" style="display:{{$item->origin==0?'block':'none'}}" data-origin="0">
                    <div class="block-header block-header-primary">

                        <h3 class="block-title"></h3>
                        <div class="block-options">
                            
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </button>
                                <div class="dropdown-menu min-width-150" aria-labelledby="page-header-themes-dropdown">
                                    {{-- <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10">Propiedades</button> --}}
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-cog"></i> Avanzado..
                                    </a>

                                    <div class="form-group">
                                        <div class="form-material">
                                            <label class="css-control css-control-primary css-checkbox">
                                                <input class="param" type="checkbox" id="hidden" name="hidden" clasvisibles="css-control-input2" {{ gg($params->hidden,'0')==1?'checked':'' }}  value="1">
                                                <span class="css-control-indicator"></span> Ocultar
                                            </label>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                            <div class="btn-group" role="group">
                                <button id="btn_bg" style="background-color:{{ $params->bg or '' }}" type="button" class="btn btn-circle btn-dual-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-paint-brush"></i>
                                </button>
                                <div class="dropdown-menu min-width-150" aria-labelledby="page-header-themes-dropdown">
                                    <h6 class="dropdown-header text-center">Color de fondo</h6>
                                    <div class="row no-gutters text-center mb-5">
                                        @foreach($bgcolors as $color => $name)
                                            <div class="col-4 mb-5">
                                                <a data-field="bg" data-value="{{$color}}" style="color:{{$color}}" href="javascript:void(0)" title="{{$name}}">
                                                    <i class="fa fa-2x fa-circle"></i>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="be_ui_color_themes.php">
                                        <i class="fa fa-paint-brush"></i> Personalizado..
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="block-content">

                        @yield('componenthtml')

                    </div>

                </div>
                <!-- END Box -->


                <div class="form-group">
                    <button id="btn-save" type="submit" class="btn btn-alt-primary action-button" on="rest"><i class="fa fa-spin fa-asterisk mr-5 on-working"></i><span class="on-rest">Aceptar</span></button>
                    <button id="btn-cancel" type="button" class="btn btn-alt-secondary"><span>Cancelar</span></button>
                </div>

            </form>

        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

@endsection





{{-- cada componente puede definir las validaciones y mensajes de los campos que tiene usando component_rules y component_messages--}}



@section('js')


    {{-- ESTA ESTRUCTURA ES NECESARIA PARA LA HERENCIA DE VALIDACIONES --}}

    <script type="text/javascript">
        var component_rules = {}
        var component_messages = {}
    </script>

    @yield('componentvalidations')

    {{-- FIN DE ESTRUCTURA ES NECESARIA PARA LA HERENCIA DE VALIDACIONES --}}

    <script type="text/javascript">


        var formInit = function() {
            var form = $('#form_content');
            var submitButton = form.find('#btn-save');
            var cancelButton = form.find('#btn-cancel');
            var submitUrl = '{{ route('admin.content.save', ['id' => $id] ) }}';


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
                    rules: component_rules,
                    messages: component_messages
                });
            };


            // usado para fields y params. Busca el valor del elemento, teniendo en cuenta que no siempre es val(), casos como select2 y checkboxes
            var getValueFromField = function(el){

                if(el.hasClass('js-select2')){
                    return el.select2('val');
                }
                else if(el.is('textarea')){ // intento de fix del summernote TODO ver algo mas nativo
                    var val = el.val();
                    return val.replace(/<\/p><p>/gi, "<br>");
                }
                else if(el.attr('type')=='checkbox'){
                    return el.is(':checked')?'1':'0';
                }
                else{
                    return el.val(); // CAMPO NORMAL DE TEXTO / IMAGEN / ARCHIVO
                }

            }


            var formSubmit = function(){

                if(submitButton.attr('on')=='working') return false;
                submitButton.attr('on','working');

                // corro las validaciones y si me da ok, es que podemos enviar el form
                if(form.valid()){

                    var data = {};
                        data.fields = {};
                        data.params = {};

                    // campos directos
                    form.find('.field').each(function(){
                        var el = $(this);
                        var name = el.attr('name');
                        var value = getValueFromField(el);
                        data.fields[name] = value;
                    })

                    // campos repeater: busco todos los bloques del list (ojo que por ahora puede haber un solo list por contenido)
                    form.find('div[data-repeater-list]').each(function(){
                        var currentList = $(this);
                        var currentListField = currentList.attr('data-repeater-list');
                        var currentListItems = [];

                        // de cada lista, busco sus bloques (instancias/rows)
                        currentList.find('div[data-repeater-item]:visible').each(function(){
                            var currentitem = $(this);
                            var listItem = {};
                                // listItem.id = currentitem.attr('data-id')
                                listItem.fields = {};

                                // de cada bloque, busco sus fields
                                currentitem.find('.listfield').each(function(){
                                    var el = $(this);
                                    var name = el.attr('data-name'); // tengo que usar un campo auxiliar data-name porque el name queda contaminado con el repeater
                                    var value = getValueFromField(el);
                                    listItem.fields[name] = value;
                                })

                            currentListItems.push(listItem);
                        })

                        data.fields[currentListField] = currentListItems;
                    })

                    // campos que van como parametro en vez de fields (por ej el bg color de fondo)
                    form.find('.param').each(function(){
                        var el = $(this);
                        var name = $(this).attr('name');
                        var value = getValueFromField(el);
                        data.params[name] = value;
                    })

                    $.ajax({
                        url: submitUrl,
                        type: 'POST',
                        data: data,
                        cache       : false,
                        // contentType : false, // me mata el request porque lo manda como [object object]
                        // processData : false, // me mata el request porque lo manda como [object object]
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
                window.parent.closeContentEditModal();
            }




            function bindDynamics(){

                var pointerFormatSearch =  {
                    text: 'text',
                    id: 'id',
                };

                var pointer = $('select[name="pointer"]').select2({
                    placeholder: '',
                    allowClear: true,
                    templateResult: function(data) {
                        if (data.loading) return data.text;
                        var markup = "<div class='select2-result-data clearfix'>";
                            markup += "<div class='select2-result-data__meta'>";
                            markup += "<div class='select2-result-data__title'>" + data.text + "</div>" ;
                            markup += "</div></div>";
                        return markup;
                    },
                    templateSelection: function(data) {
                        return data.text || data.id;
                    },
                    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                    // minimumInputLength: 1,
                    // maximumInputLength: 50,
                    language: {
                         noResults: function(term) {
                            return 'sin resultados para ' + term;
                        }
                    },
                    ajax: {
                        dataType: 'json',
                        url: '{{route('admin.folder.search')}}',
                        delay: 250,
                        type: 'GET',
                        data: function(params) {
                            return {
                                term: params.term
                            }
                        },
                        processResults: function (data, page) {

                            for (var i = 0; i < data.length; i++) {
                                data[i].text = data[i][pointerFormatSearch.text];
                                // data[i].extra = data[i][pointerFormatSearch.extra];
                            };

                            return {
                                results: data
                            };
                        }
                    }

                });

                 // preseleccion de pointer
                @isset($params->pointer)

                    @php($pres = \App\Folder::find($params->pointer) )
                    var preselectedPointer = [
                        { id: '{{ $pres->id }}', text: '{{ $pres->name }}' },
                    ];

                    $.each(preselectedPointer, function( index, value ) {
                        var option = new Option(value.text, value.id, true, true);
                        pointer.append(option).trigger('change');
                        pointer.trigger({
                            type: 'select2:select',
                            params: {
                                data: value
                            }
                        });
                    });

                @endisset

            }


            var initRank = function(){

                $.fn.raty.defaults.starType    = 'i';

                $('input[name="rankfrom"]').next().raty({
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


            //////////////////////////////////////////////////////////////////////////////////////////////

            return {
                init: function () {

                    // Init Material Forms Validation
                    formValidationInit();

                    submitButton.on('click', function(e){
                        e.preventDefault();
                        formSubmit();
                    })

                    cancelButton.on('click',function(e){
                        e.preventDefault();
                        closeModal();
                    });

                    // cambiar color de fondo al seleccionar del dropdown
                    form.find('a[data-field="bg"]').on('click',function(e){
                        e.preventDefault();
                        var color = $(this).attr('data-value');
                        $('#btn_bg').css('background-color',color);
                        $('input[name="bg"]').val(color);
                    });

                    // selector de tipo de origen (que muestra los bloques que corrsponde)
                    form.find('select[name="origin"]').on('change',function(e){
                        var origin = $(this).val();
                        $('div[data-origin]:not([data-origin="'+origin+'"])').hide();
                        $('div[data-origin="'+origin+'"]').show();
                    });

                    bindDynamics();


                    initRank();

                }
            };
        }();


        $(function(){
            formInit.init();
        });

    </script>

    @yield('componentjs')

@endsection
