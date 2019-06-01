@extends('admin.master.component.standard')

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')

    <div class="row justify-content-center">
        <div class="col-xl-6">

            <div class="form-group">
                <div class="col-lg-8">
                    <div class="form-material">
                        <select class="js-select2 form-control field" id="tabs" name="tabs" style="width: 100%;" data-placeholder="Buscá la página.." multiple>
                            <option></option>
                        </select>
                        <label for="tabs">Tabs</label>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('componentvalidations')

    <script type="text/javascript">

        component_rules = {
        }

        component_messages = {
        }

    </script>

@endsection


@section('componentjs')

    <script type="text/javascript">

        $(function(){
            // Init page helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)
            Codebase.helpers(['select2']);
        });

        $(document).ready(function() {
            bindContentEdit();
        });

        function bindContentEdit(){


            var tabsFormatSelection = function(data) {
                return data.text || data.id;
            }

            var tabsFormatSearch =  {
                text: 'text',
                id: 'id',
            };

            var tabSelect = $('select[name="tabs"]');
            var tabs = tabSelect.select2({
                language: "es",
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
                templateSelection: tabsFormatSelection,
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
                            data[i].text = data[i][tabsFormatSearch.text];
                            // data[i].extra = data[i][tabsFormatSearch.extra];
                        };

                        return {
                            results: data
                        };
                    }
                }

            });//.select2Sortable();


            setTimeout(function () {
                
                
                tabSelect.next(".select2-container").find("ul.select2-selection__rendered").sortable({
                    containment: 'parent',
                    stop: function() {
                        var ul = tabSelect.next(".select2-container").first("ul.select2-selection__rendered");
                        $( $(ul).find(".select2-selection__choice").get().reverse() ).each(function() {
                            // console.log(this);
                            var title = $(this).attr("title");
                            var option = tabSelect.find( "option:contains(" + title + ")" );
                            // console.log(option);
                            tabSelect.prepend(option);
                        });
                    }
                });


                // tabSelect.next(".select2-container").find("ul.select2-selection__rendered").sortable({
                //     // containment: 'parent',
                //     stop: function() {

                //         console.log('stop');

                //         // tabSelect.empty();

                //         var select2_ul = tabSelect.next(".select2-container").find("ul.select2-selection__rendered").first();

                //         select2_ul.find("li.select2-selection__choice").each(function() {
                //             console.log(this);
                //             var title = $(this).attr("title");
                //             var option = tabSelect.find( "option:contains(" + title + ")" );
                //             // console.log(option);
                //             // tabSelect.prepend(option);
                //         }); 
                //     }
                // });


                
            }, 2000);

            
            // array con preseleccion de tabs
            var preselectedTabs = [];
            @isset($fields->tabs)
                preselectedTabs = [
                    @foreach($fields->tabs as $folder_id)
                        @php($folder = \App\Folder::find($folder_id))
                        { id: '{{ $folder->id }}', text: '{{ $folder->name }}' },
                    @endforeach
                ];
            @endisset

            $.each(preselectedTabs, function( index, value ) {
                var option = new Option(value.text, value.id, true, true);
                tabs.append(option).trigger('change');
                tabs.trigger({
                    type: 'select2:select',
                    params: {
                        data: value
                    }
                });
            });




        }

    </script>

@endsection
