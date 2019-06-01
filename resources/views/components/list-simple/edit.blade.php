@extends('admin.master.component.standard', ['dynamics' => true])

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')


    <h5>Seleccionar por páginas</h5>

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

    <h5>Carga manual</h5>

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
                                <textarea class="form-control listfield" name="description" data-name="description" rows="2" placeholder=""></textarea>
                                <label for="description">Descripción</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <textarea class="form-control listfield" name="tail" data-name="tail" rows="2" placeholder=""></textarea>
                                <label for="tail">Final</label>
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
                                    <textarea class="form-control listfield" name="description" data-name="description" rows="2" placeholder="">{{ $i->fields->description or '' }}</textarea>
                                    <label for="description">Descripción</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <textarea class="form-control listfield" name="tail" data-name="tail" rows="2" placeholder="">{{ $i->fields->tail or '' }}</textarea>
                                    <label for="tail">Final</label>
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







            // select2

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


            //fin select2


        });

    </script>

@endsection