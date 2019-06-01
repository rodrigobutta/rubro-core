@extends('admin.master.component.standard')

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')

    <div class="form-group">
        <div class="col-lg-8">
            <div class="form-material">
                <select class="form-control js-select2 field" name="folders" style="width: 100%;" data-placeholder="Buscá la página.." multiple>
                    <option></option>
                </select>
                <label for="folders">Páginas</label>
            </div>
        </div>
    </div>


@endsection


@section('componentvalidations')

    <script type="text/javascript">

        component_rules = {
            'title': {
                required: true,
                minlength: 3
            },
            // 'slug': {
            //     required: true,
            //     pattern: /^[A-Za-z\d-.]+$/
            // },
            // 'layout': {
            //     required: true
            // }
        }

        component_messages = {
            'title': {
                required: 'Debe ingresar un título',
                minlength: 'El título debe tener al menos 3 caracteres'
            },
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



            var selectFormatSearch =  {
                text: 'text',
                id: 'id',
            };

            var folderSelect = $('select[name="folders"]');
            var folders = folderSelect.select2({
                language: "es",
                 // placeholder: 'empiece a escribir el nombre de la pagina..',
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

            })

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