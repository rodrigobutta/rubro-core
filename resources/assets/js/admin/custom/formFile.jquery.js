(function($) {

    $.formFile = function(element, options) {

        var defaults = {
            name: null,
            value: null,
            preview: {
                path: "{name}" // path: window.location.protocol + "//" + window.location.host + "/image/{name}/{recipe}"
            },
			service: {
				url: null,
				archive: 'documents'
			},
			placeholder: 'Suba un archivo...',
            fileChanged: function() {}
        }

        var plugin = this;
        	plugin.settings = {}

        var $element = $(element),
            element = element;

		var $plugin_container = null;
		var $input_display = null;
        var $button_open = null;
        // var $button_clear = null;
        var $file_input = null;
        var $loading_frame = null;


        plugin.init = function() {
          	plugin.settings = $.extend({}, defaults, options);

            // si vino un atributo value cargado en el elemento origen y no se especifico un value en la isntancia, entonces tomo ese valor
            if(plugin.settings.name==null && $element.attr('name')){
            	plugin.settings.name = $element.attr('name');
            }

            // si vino un atributo value cargado en el elemento origen y no se especifico un value en la isntancia, entonces tomo ese valor
            if(plugin.settings.value==null && $element.attr('value')){
            	plugin.settings.value = $element.attr('value');
            }

            if($element.hasClass('mounted')){
                return true;
            }


			$plugin_container = $("<div/>", {
			    class: 'form-input-file'
			}).insertAfter($element);

			$input_display = $("<div/>", {
			    class: 'form-input-file-display',
			    placeholder: plugin.settings.placeholder
			}).appendTo($plugin_container);

			$button_container = $("<div/>", {
			    class: 'form-input-file-button-container'
			}).appendTo($plugin_container);

			$button_open = $("<button/>", {
				type: 'button',
				class: 'btn btn-secondary btn-sm form-input-file-btn form-input-file-btn-open ',
			    html: '<i class="fa fa-folder-open"></i>',
                'data-toggle':'tooltip',
                'title': 'Seleccionar..'
			}).appendTo($button_container);


			$loading_frame = $("<span/>", {
				class: 'form-input-file-loading',
			    html: '<span class="sr-only">Cargando..</span>'
			});


			var file_wrapper = $("<div/>", {
			    class: 'form-input-file-hide'
			}).insertAfter($element);

			$file_input = $("<input/>", {
				type: 'file',
				name: plugin.settings.name + '_file'
			}).appendTo(file_wrapper);

			// $file_input.attr('name',plugin.settings.name);

            $element.addClass('mounted');


			$input_display.each(function() {
				if($(element).val() == '') {
					$(this).addClass('empty').text( $(this).attr('placeholder') );
				}
				else {
					$(this).removeClass('empty').text( $(element).val() );
				}
			});

			binds();
        }


        var binds = function() {

			$button_open.click(function(){
				$file_input.trigger('click');
			});

	        // $button_clear.on('click',function(){
	        //     $file_input.val('');
	        //     $input_display.addClass('empty').text( plugin.settings.placeholder );
	        //     $element.val('');
	        // });

            $input_display.on('click',function(){
                var url = get_file_path(plugin.settings.value);
                window.open(url);
            });

			$file_input.change(function(){

	            var el = $(this)[0];
	            if (el.files && el.files[0]) {

                    var file = el.files[0];

	            	$loading_frame.appendTo($plugin_container).css('opacity',1);


                    var validationRules = [];
                    var validationMessages = [];

                    if(plugin.settings.service.validation){
                        validationRules = JSON.stringify(plugin.settings.service.validation.rules);
                        validationMessages = JSON.stringify(plugin.settings.service.validation.messages);
                    }


                    var data = new FormData();
					    data.append('file', file);
    					data.append('archive', plugin.settings.service.archive);
                        data.append('validation_rules', validationRules);
                        data.append('validation_messages', validationMessages);


                    jQuery.ajax({
                        url: plugin.settings.service.url,
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST',
                        success: function(response){
                            console.log(response)

                            if (typeof plugin.settings.fileChanged === 'function'){
                                plugin.settings.fileChanged(response.url, $file_input)
                            }


                            $loading_frame.remove();

                            $element.val( response.url );

                            $input_display.removeClass('empty').text(response.name);

                        },
                        error: function (response) {
                            console.log(response);

                            if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION

                                uploadHasValidations(response);

                            }
                            else{ // ERROR

                                uploadHasErrors(response);

                            }

                        }
                    });

	            }
	        });
        }


        var uploadHasValidations = function(response){

            var msg = 'El archivo no es del todo correcto';

            if(typeof response.responseJSON.validations != 'undefined'){
                msg = '';

                // el controller nos está informando validaciones del lado del server
                var validations = response.responseJSON.validations;
                Object.keys(validations).forEach(function(k){
                    msg = msg + '<br>' + validations[k];
                    // console.log(k + ' - ' + validations[k]);
                });

            }

            $.notify({
                message: msg,
            },{
                type: 'danger',
                placement: { from: 'top', align: 'center'}
            });

            clearFile();

        };

        // el formulario al enviarse devolvió algún error (controlado o no)
        var uploadHasErrors = function(response){

            // Veo si es un error de Laravel, devuelve un Json con la info de debug, caso contrario, asumo que es un texto que devuelvo desde el Controller
            var errorDescription = '';
            if(typeof response.responseJSON != 'undefined'){
                errorDescription = '<strong>Error:</strong> '  + response.responseJSON.message + '<br /><strong>Lugar:</strong> ' + response.responseJSON.file + '<br /><strong>Linea:</strong> ' + response.responseJSON.line;
            }
            else{
                errorDescription = response.responseText;
            }

            swal('Mmm.. tenemos un problema', errorDescription, 'error');

            clearFile();

        };


        var clearFile = function(){

            $file_input.val('');

            $element.val('');

            $loading_frame.remove();

        }

        var get_file_path = function(name) {

            if(name==null || name==''){
                return '';
            }

            var url = plugin.settings.preview.path;
                url = url.replace("{name}", name);
            return url;
        }

        plugin.init();

    }

    $.fn.formFile = function(options) {

        return this.each(function() {
            if (undefined == $(this).data('formFile')) {
                var plugin = new $.formFile(this, options);
                $(this).data('formFile', plugin);
            }
        });

    }

})(jQuery);
