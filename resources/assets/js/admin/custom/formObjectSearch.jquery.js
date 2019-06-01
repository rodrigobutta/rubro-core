(function($) {

    $.formObjectSearch = function(element, options) {

        var defaults = {
            name: null,
            value: null,
			service: {
                search: null,                                
                getbyid: null,   
            },
            format:  {
                text: 'text',
                id: 'id',
            },    
            extraData: null,
			placeholder: 'Buscar..',
            valueChanged: function() {},
            clear: function() {}
        }

        var plugin = this;
        	plugin.settings = {}

        var $element = $(element),
            element = element;

		var $plugin_container = null;
        var $input_select2 = null;
        var $select = null;
        // var $link_input = null;
        // var $loading_frame = null;


        plugin.clear = function() {         
            $select.val(null).trigger('change');
        }

        plugin.init = function() {
          	plugin.settings = $.extend({}, defaults, options);

            // si vino un atributo value cargado en el elemento origen y no se especifico un value en la isntancia, entonces tomo ese valor
            if(plugin.settings.name==null && $element.attr('name')){
            	plugin.settings.name = $element.attr('name');
            }

            // si vino un atributo value cargado en el elemento origen y no se especifico un value en la isntancia, entonces tomo ese valor
            if(plugin.settings.value==null && $element.attr('value')){
                plugin.settings.value = $element.attr('value');
                // plugin.settings.placeholder = plugin.settings.value;
            }
            
            if($element.hasClass('mounted')){
                return true;
            }

			$plugin_container = $("<div/>", {
			    class: 'form-input-link'
			}).insertAfter($element);
         

			$input_select2 = $("<select/>", {
			    class: 'js-select2 form-control',
                'data-placeholder': plugin.settings.placeholder,
                style: 'width: 100%;'
			}).appendTo($plugin_container);

			$empty_option = $("<option/>", {
			}).appendTo($input_select2);

            $element.addClass('mounted');

			binds();
        }

        
        var binds = function() {


            $select = $input_select2.select2({
                 placeholder: plugin.settings.placeholder,
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
                 minimumInputLength: 0,             
                 ajax: {
                     dataType: 'json',
                     url: plugin.settings.service.search,
                     delay: 250,
                     type: 'GET',
                     data: function(params) {

                        if (typeof plugin.settings.extraData === 'function'){
                            var data = plugin.settings.extraData();
                                data.term = params.term;
                        }
                        else{
                            var data = {
                                term: params.term                              
                            }
                        }

                         return data;
                     },
                     processResults: function (data, page) {
    
                         for (var i = 0; i < data.length; i++) {
                             data[i].text = data[i][plugin.settings.format.text];
                             // data[i].extra = data[i][plugin.settings.format.extra];
                         };
    
                         return {
                             results: data
                         };
                     }
                },            
                language: {
                    noResults: function() {             
                        
                        var currentTypedText = $input_select2.data('select2').$dropdown.find("input").val();

                        return '<div class="not-found-add" data-value="'+currentTypedText+'">No encontramos nada para <strong>'+currentTypedText+'</strong></div>';                        
                    },
                    searching: function(){
                        return "<span><i class='fa fa-spin fa-spinner'></i> Buscando…</span>"
                    },
                    inputTooShort: function( e ){
                        var t = e.minimum - e.input.length;
                        n = "Ingrese " + t + " letras más para iniciar la búsqueda";
                        return n;
                    }
                },
               
            
            });

            // en cada cambio por busqueda o lo que sea, tengo que actualizar mi hidden que deja el valor final
            $input_select2.on('select2:select', function (e) {
                // console.log('channnnnnnnged')
                // console.log(newItem);                
                var newItem = e.params.data;
                valueChanged(newItem);

            });

            
            $input_select2.on('select2:unselecting', function (e) {
                
                $element.val('');
                $element.attr('data-value-text','');

            });


            // si existe un valor previo, en caso que sea id (encuentre en el servicio) obtengo el nombre para mostrarlo mas lindo
            if(plugin.settings.value!=null && plugin.settings.value!=''){
                    
                jQuery.ajax({
                    url: plugin.settings.service.getbyid,
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: plugin.settings.value
                    },                    
                    success: function(response){
                        // console.log(response)

                        var fetchItem = {             
                            id: response[plugin.settings.format.id], 
                            text: response[plugin.settings.format.text]             
                        };
                        
                        var option = new Option(fetchItem.text, fetchItem.id, true, true);
                        $select.append(option).trigger('change');
                        $select.trigger({
                            type: 'select2:select',
                            params: {
                                data: fetchItem
                            }
                        });

                        valueChanged(fetchItem);

                    },
                    error: function (response) {
                        console.log('formObjectSearch getbyid error')
                        // console.log(response);
                        // console.log(response.responseJSON);

                        // si no encontré el valor, es porque no era un ID (podria ser una url) o porque no había nada
                        var preselectedItem = {             
                            id: plugin.settings.value, 
                            text: plugin.settings.value             
                        };

                        console.log(preselectedItem.text);

                        var option = new Option(preselectedItem.text, preselectedItem.id, true, true);
                        $select.append(option).trigger('change');
                        $select.trigger({
                            type: 'select2:select',
                            params: {
                                data: preselectedItem
                            }
                        });

                        valueChanged(preselectedItem);

                    }
                });

            }

            
        }


        var valueChanged = function(response){
            // console.log('valueChanged')

            $element.val(response.id);
            $element.attr('data-value-text', response.text);

            // $element.val(response[plugin.settings.format.id]);
            // $element.attr('data-value-text', response[plugin.settings.format.text]);

            if (typeof plugin.settings.valueChanged === 'function'){
                plugin.settings.valueChanged(plugin,response)
            }

        };


  
        plugin.init();

    }

    $.fn.formObjectSearch = function(options) {

        return this.each(function() {
            if (undefined == $(this).data('formObjectSearch')) {
                var plugin = new $.formObjectSearch(this, options);
                $(this).data('formObjectSearch', plugin);
            }
        });

    }

})(jQuery);
