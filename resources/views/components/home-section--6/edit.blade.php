@extends('admin.master.component.standard')

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')

    <div class="row justify-content-center">
        <div class="col-xl-6">

            <h4>Primer bloque</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="appendixa" placeholder="" value="{{ $fields->appendixa or '' }}">
                    <label for="appendixa">Volanta</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="titlea" placeholder="" value="{{ $fields->titlea or '' }}">
                    <label for="titlea">Título</label>
                </div>
            </div>
            <div class="form-group">
                 <div class="form-material">
                     <input type="text" class="form-control field" name="ctaa" placeholder="" value="{{ $fields->ctaa or '' }}">
                     <label for="ctaa">Etiqueta del Link</label>
                 </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" name="linka" class="field" value="{{$fields->linka or ''}}" />                      
                    <label for="linka">Link</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input field" name="blanka" type="checkbox" id="blanka"  {{ gg($fields->blanka)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>


            <h4>Artículo 1</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" class="field" name="imagea1" data-name="imagea1" value="{{$fields->imagea1 or ''}}">
                    <label for="imagea1">Imagen</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="titlea1" rows="2" placeholder="">{{ $fields->titlea1 or '' }}</textarea>
                    <label for="titlea1">Título</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="descriptiona1" rows="2" placeholder="">{{ $fields->descriptiona1 or '' }}</textarea>
                    <label for="descriptiona1">Descripción</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" name="linka1" class="field" value="{{$fields->linka1 or ''}}" />                      
                    <label for="linka1">Link</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input field" name="blanka1" type="checkbox" id="blanka1"  {{ gg($fields->blanka1)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>

            <h4>Artículo 2</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" class="field" name="imagea2" data-name="imagea2" value="{{$fields->imagea2 or ''}}">
                    <label for="imagea2">Imagen</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="titlea2" placeholder="" value="{{ $fields->titlea2 or '' }}">
                    <label for="titlea2">Título</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="descriptiona2" rows="2" placeholder="">{{ $fields->descriptiona2 or '' }}</textarea>
                    <label for="descriptiona2">Descripción</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" name="linka2" class="field" value="{{$fields->linka2 or ''}}" />                      
                    <label for="linka2">Link</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input field" name="blanka2" type="checkbox" id="blanka2"  {{ gg($fields->blanka2)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>


            <h4>Segundo bloque</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="appendixb" placeholder="" value="{{ $fields->appendixb or '' }}">
                    <label for="appendixb">Volanta</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="titleb" placeholder="" value="{{ $fields->titleb or '' }}">
                    <label for="titleb">Título</label>
                </div>
            </div>
            <div class="form-group">
                 <div class="form-material">
                     <input type="text" class="form-control field" name="ctab" placeholder="" value="{{ $fields->ctab or '' }}">
                     <label for="ctab">Etiqueta del link</label>
                 </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" name="linkb" class="field" value="{{$fields->linkb or ''}}" />                      
                    <label for="linkb">Link</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input field" name="blankb" type="checkbox" id="blankb"  {{ gg($fields->blankb)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>

            <h4>Artículo 1</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" class="field" name="imageb1" data-name="imageb1" value="{{$fields->imageb1 or ''}}">
                    <label for="imageb1">Imagen</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="titleb1" placeholder="" value="{{ $fields->titleb1 or '' }}">
                    <label for="titleb1">Título</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="descriptionb1" rows="2" placeholder="">{{ $fields->descriptionb1 or '' }}</textarea>
                    <label for="descriptionb1">Descripción</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" name="linkb1" class="field" value="{{$fields->linkb1 or ''}}" />                      
                    <label for="linkb1">Link</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input field" name="blankb1" type="checkbox" id="blankb1"  {{ gg($fields->blankb1)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>

            <h4>Artículo 2</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" class="field" name="imageb2" data-name="imageb2" value="{{$fields->imageb2 or ''}}">
                    <label for="imageb2">Imagen</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="titleb2" placeholder="" value="{{ $fields->titleb2 or '' }}">
                    <label for="titleb2">Título</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="descriptionb2" rows="2" placeholder="">{{ $fields->descriptionb2 or '' }}</textarea>
                    <label for="descriptionb2">Descripción</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" name="linkb2" class="field" value="{{$fields->linkb2 or ''}}" />                      
                    <label for="linkb2">Link</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input field" name="blankb2" type="checkbox" id="blankb2"  {{ gg($fields->blankb2)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>

        </div>
    </div>



    <h4>Tercer bloque</h4>

    <div class="form-group">
        <div class="form-material">
            <input type="text" class="form-control field" name="titlec" placeholder="" value="{{ $fields->titlec or '' }}">
            <label for="titlec">Título</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-8">
            <div class="form-material">
                <select class="js-select2 form-control field" name="folders" style="width: 100%;" data-placeholder="Buscá la página.." multiple>
                    <option></option>
                </select>
                <label for="folders">Páginas</label>
            </div>
        </div>
    </div>




    <h4>Accesos</h4>

    <div class="repeater">

        <div data-repeater-list="list">


            <div data-repeater-item style="display:none;">
                <div class="block block-themed">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Elemento</h3>
                        <div class="block-options">
                            <button data-repeater-delete type="button" class="btn-block-option">
                                <i class="fa fa-trash"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                        </div>
                    </div>
                    <div class="block-content">

                        <div class="form-group">
                            <div class="form-material">
                                <textarea class="form-control listfield" name="name" data-name="name" rows="2" placeholder=""></textarea>
                                <label for="name">Nombre</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <input type="hidden" name="link" class="listfield" data-name="link" value="" />                      
                                <label for="link">Link</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <div class="css-control css-control-info css-checkbox">
                                    <input class="css-control-input2 listfield" name="blank" data-name="blank" type="checkbox" value="1">
                                    <span class="css-control-indicator"></span> Abrir en pestaña nueva
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div> {{-- data-repeater-item  --}}


            @isset($fields->list)
            @foreach($fields->list as $i)

                <div data-repeater-item>
                    <div class="block">

                        <div class="block-header bg-gray">
                            <h3 class="block-title">Elemento</h3>
                            <div class="block-options">
                                <button data-repeater-delete type="button" class="btn-block-option">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>

                            </div>
                        </div>
                        <div class="block-content">

                            <div class="form-group">
                                <div class="form-material">
                                    <textarea class="form-control listfield" name="name" data-name="name" rows="2" placeholder="">{{ $i->fields->name or '' }}</textarea>
                                    <label for="name">Nombre</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <input type="hidden" name="link" class="listfield" data-name="link" value="{{$i->fields->link or ''}}" />                      
                                    <label for="link">Link</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <div class="css-control css-control-info css-checkbox">
                                        <input class="css-control-input2 listfield" name="blank" data-name="blank" type="checkbox" {{ gg($i->fields->blank)==1?'checked=""':'' }}  value="1">
                                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div> {{-- data-repeater-item  --}}

            @endforeach
            @endisset

            <div class="form-group">
               <button data-repeater-create type="button"  class="btn btn-secondary" data-original-title="Agregar"><i class="fa fa-plus"></i></button>
            </div>


        </div> {{-- data-repeater-list --}}
    </div> {{-- repeater --}}


    <h4>Banner Publicidad Izquierda</h4>

    <div class="form-group">
        <div class="form-material">
            <input type="hidden" class="field" name="adimage1" data-name="adimage1" value="{{$fields->adimage1 or ''}}">
            <label for="adimage1">Imagen</label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-material">
            <input type="hidden" name="adlink1" class="field" value="{{$fields->adlink1 or ''}}" />                      
            <label for="adlink1">Link</label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-material">
            <div class="css-control css-control-info css-checkbox">
                <input class="css-control-input field" name="adblank1" type="checkbox" id="adblank1"  {{ gg($fields->adblank1)==1?'checked=""':'' }}  value="1">
                <span class="css-control-indicator"></span> Abrir en pestaña nueva
            </div>
        </div>
    </div>

    <h4>Banner Publicidad Derecha</h4>

    <div class="form-group">
        <div class="form-material">
            <input type="hidden" class="field" name="adimage2" data-name="adimage2" value="{{$fields->adimage2 or ''}}">
            <label for="adimage2">Imagen</label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-material">
            <input type="hidden" name="adlink2" class="field" value="{{$fields->adlink2 or ''}}" />                      
            <label for="adlink2">Link</label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-material">
            <div class="css-control css-control-info css-checkbox">
                <input class="css-control-input field" name="adblank2" type="checkbox" id="adblank2"  {{ gg($fields->adblank2)==1?'checked=""':'' }}  value="1">
                <span class="css-control-indicator"></span> Abrir en pestaña nueva
            </div>
        </div>
    </div>


@endsection


@section('componentvalidations')

    <script type="text/javascript">

        component_rules = {
            // 'title': {
            //     required: true,
            //     minlength: 3
            // },
            // 'slug': {
            //     required: true,
            //     pattern: /^[A-Za-z\d-.]+$/
            // },
            // 'layout': {
            //     required: true
            // }
        }

        component_messages = {
            // 'title': {
            //     required: 'Debe ingresar un título',
            //     minlength: 'El título debe tener al menos 3 caracteres'
            // },
            // 'slug': {
            //     required: 'Debe ingresar un slug',
            //     pattern: 'El slug contiene caracteres inválidos'
            // },
            // 'layout': 'Debe seleccionar una plantilla'
        }

    </script>

@endsection


@section('componentjs')


<script type="text/javascript">

    $(document).ready(function() {

        $('input[name="linka"],input[name="linka1"],input[name="linka2"],input[name="linkb"],input[name="linkb1"],input[name="linkb2"]').formLink({
            service: {
                search: '{{route('admin.folder.search')}}',
                getbyid: '{{route('admin.folder.getby.id')}}'             
            }
        });

        $('input[data-name="imagea1"], input[data-name="imagea2"], input[data-name="imageb1"], input[data-name="imageb2"]').formImage({
            service: {
                url: '{{ route('service.uploader.image.upload') }}',
                archive: 'contents',
                validation: {
                    rules: [
                        {'image': 'max:102400|dimensions:min_width=100,min_height=100'}
                    ],
                    messages: [
                        {'image.image': 'El archivo seleccionado no es una imagen.'},
                        {'image.mimes': 'La imagen debe ser jpeg,png,jpg,gif o svg.'},
                        {'image.dimensions': 'La imagen debe tener al menos 100px de ancho X 100px de alto.'},
                        {'image.max': 'La imagen debe pesar 10MB como máximo.'}
                    ]
                }
            }
        });

        // ADS
        $('input[data-name="adimage1"], input[data-name="adimage2"]').formImage({
            service: {
                url: '{{ route('service.uploader.image.upload') }}',
                archive: 'contents',
                validation: {
                    rules: [
                        {'image': 'max:102400|dimensions:min_width=500,min_height=100'}
                    ],
                    messages: [
                        {'image.image': 'El archivo seleccionado no es una imagen.'},
                        {'image.mimes': 'La imagen debe ser jpeg,png,jpg,gif o svg.'},
                        {'image.dimensions': 'La imagen debe tener al menos 500px de ancho X 100px de alto.'},
                        {'image.max': 'La imagen debe pesar 10MB como máximo.'}
                    ]
                }
            }
        });



        $('.repeater').repeater({
            ready: function (item) {

                item.parent().sortable({
                    handle: '.block-header',
                });

                 item.find('input[data-name="link"]').formLink({
                    service: {
                        search: '{{route('admin.folder.search')}}',
                        getbyid: '{{route('admin.folder.getby.id')}}'             
                    }
                });

            },
            hide: function (el) {
                $(this).slideUp(el);
            }
        });





        var selectFormatSearch =  {
            text: 'text',
            id: 'id',
        };

        var folderSelect = $('select[name="folders"]');
        var folders = folderSelect.select2({
             placeholder: 'empiece a escribir el nombre de la pagina..',
             allowClear: true,
             templateResult: function(data) {
                 if (data.loading) return data.text;

                 var markup = "<div class='select2-result-data clearfix'>" +
                 "<div class='select2-result-data__meta'>" +
                   "<div class='select2-result-data__title'>" + data.text + "</div>" ;

                 if(data.subtitle){
                     markup += "<div class='select2-result-data__subtitle'>" + data.subtitle + "</div>";
                 }

                 markup += "</div></div>";

                 return markup;
             },
             templateSelection: function(data) {
                return data.text || data.id;
            },
             escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
             minimumInputLength: 1,
             maximumInputLength: 50,
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
                         data[i].text = data[i][selectFormatSearch.text];
                         // data[i].extra = data[i][selectFormatSearch.extra];
                     };

                     return {
                         results: data
                     };
                 }
             }

        });//.select2Sortable();

        folderSelect.next(".select2-container").find("ul.select2-selection__rendered").sortable({
            containment: 'parent',
            stop: function() {
                var ul = folderSelect.next(".select2-container").first("ul.select2-selection__rendered");
                $( $(ul).find(".select2-selection__choice").get().reverse() ).each(function() {
                    // console.log(this);
                    var title = $(this).attr("title");
                    var option = folderSelect.find( "option:contains(" + title + ")" );
                    // console.log(option);
                    folderSelect.prepend(option);
                });
            }
        });


        // array con preseleccion de folders
        var preselectedItems = [];
        @isset($fields->folders)
            @php($items = fieldObjectsOfArray($fields->folders,\App\Folder::class) )
            preselectedItems = [
                @foreach($items as $i)
                     { id: '{{ $i->id }}', text: '{{ $i->name }}' },
                @endforeach
            ];
        @endisset

        $.each(preselectedItems, function( index, value ) {
            var option = new Option(value.text, value.id, true, true);
            folders.append(option).trigger('change');
            folders.trigger({
                type: 'select2:select',
                params: {
                    data: value
                }
            });
        });


    });

</script>


@endsection