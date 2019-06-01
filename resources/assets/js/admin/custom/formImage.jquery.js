(function($) {

    $.formImage = function(element, options) {



        var defaults = {
            name: null,
            value: null,
            preview: {
                path: "{name}" // path: window.location.protocol + "//" + window.location.host + "/image/{name}"
			},
			service: {
				url: null,
				archive: 'media',
                validation: {
                    rules: [],
                    messages: []
                }
			},
			init: function() {},
            imageChanged: function() {}
        }

        var plugin = this;
        	plugin.settings = {}

        var $element = $(element),
             element = element;

        var $original_preview_value = '';

		var $plugin_container = null;
        var $button_open = null;
        var $button_clear = null;
        var $file_input = null;
        var $loading_frame = null;
        var $image_preview = null;

        var is_ajax = false;

        plugin.init = function() {
          	plugin.settings = $.extend({}, defaults, options);

          	if( plugin.settings.service.url!=null && plugin.settings.service.url!='' ){
          		is_ajax=true;
          	}

            // si vino un atributo value cargado en el elemento origen y no se especifico un value en la isntancia, entonces tomo ese valor
            if(plugin.settings.name==null && $element.attr('name')){
            	plugin.settings.name = $element.attr('name');
            }

            // si vino un atributo value cargado en el elemento origen y no se especifico un value en la isntancia, entonces tomo ese valor
            if(plugin.settings.value==null && $element.attr('value')){
            	plugin.settings.value = $element.attr('value');
            }

            $original_preview_value = get_image_path(plugin.settings.value);

			$plugin_container = $("<div/>", {
			    class: 'form-input-image-wrapper'
			}).insertAfter($element);

			$button_container = $("<div/>", {
			    class: 'form-input-image-button-container'
			});

			$button_clear = $("<button/>", {
				type: 'button',
				class: 'btn btn-secondary btn-sm form-input-image-btn form-input-image-btn-clear',
			    html: '<i class="fa fa-close"></i>',
			}).appendTo($button_container);

			$button_open = $("<button/>", {
				type: 'button',
				class: 'btn btn-secondary btn-sm form-input-image-btn form-input-image-btn-open',
			    html: '<i class="fa fa-folder-open"></i>',
			}).appendTo($button_container)

            $button_container.appendTo($plugin_container)

			$loading_frame = $("<span/>", {
				class: 'form-input-image-loading',
			    html: '<i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw"></i><span class="sr-only">Cargando..</span>'
			});

			$image_preview = $("<img/>", {
				class: 'form-input-image-image-preview',
			    src: $original_preview_value
			}).appendTo($plugin_container);

			check_preview();

			var file_wrapper = $("<div/>", {
			    class: 'form-input-image-hide'
			}).appendTo($plugin_container);

			$file_input = $("<input/>", {
				type: 'file',
				name: plugin.settings.name + '_file'
			}).appendTo(file_wrapper);

			if(!is_ajax){
				$file_input.attr('name',plugin.settings.name);
				$element.attr('name',plugin.settings.name + '_file');
			}
			// else{
				// $file_input.attr('name',plugin.settings.name + '_file');
				// $element.attr('name',plugin.settings.name);
			// }


			binds();

			if (typeof plugin.settings.init === 'function')
				plugin.settings.init()
        }

        plugin.public_method = function() {
        }


        var get_image_path = function(name) {
        	// console.log('get_image_path ' + name)

        	if(name==null || name==''){
        		return '';
        	}

            var url = plugin.settings.preview.path;
                url = url.replace("{name}", name);
            return url;
        }

        var check_preview = function (){

			if($image_preview.attr('src') != ''){
				$image_preview.show();
				$button_clear.show();

				if($image_preview.attr('src').indexOf('.png') !== -1) {
		    		$plugin_container.addClass('png');
		    	}
		    	else {
		    		$plugin_container.removeClass('png');
		    	}
			}
			else {
				$image_preview.hide();
				$button_clear.hide();
			}

        }



        var clearImage = function(){

            $file_input.val('');
            $image_preview.attr('src', '');
            check_preview();

            $element.val('');

            $plugin_container.removeClass('png');

            $loading_frame.remove();

        }

        var binds = function() {
            // console.log('formImage binds')

			$button_open.click(function(){
				// console.log('$button_open.click');
				$file_input.trigger('click');
			});

	        $button_clear.on('click',function(){
	           clearImage();
	        });

			$file_input.change(function(){
				// console.log('$file_input.change');

	            var el = $(this)[0];
	            if (el.files && el.files[0]) {

                    var image = el.files[0];

	            	$loading_frame.appendTo($plugin_container).css('opacity',1);

                    var validationRules = [];
                    var validationMessages = [];

                    if(plugin.settings.service.validation){
                        validationRules = JSON.stringify(plugin.settings.service.validation.rules);
                        validationMessages = JSON.stringify(plugin.settings.service.validation.messages);
                    }


	                var reader = new FileReader();
	                reader.onload = function (e) {

	                    $image_preview.attr('src', e.target.result);
	                    check_preview();

	                    var data = new FormData();
                            data.append('image', image);
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

								if (typeof plugin.settings.imageChanged === 'function'){
									plugin.settings.imageChanged(response.url, $file_input)
                                }

                                // var reg_ext = /(?:\.([^.]+))?$/;
						    	// if(reg_ext.exec( response.url )[1] != undefined && reg_ext.exec( response.url )[1] == 'png') {
						    	// 	$plugin_container.addClass('png');
						    	// }
						    	// else {
						    	// 	$plugin_container.removeClass('png');
						    	// }

						    	$loading_frame.remove();

						    	$element.val( response.url );

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
	                reader.readAsDataURL(image);

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

            clearImage();

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

            clearImage();

        };


        plugin.init();

    }

    $.fn.formImage = function(options) {

        return this.each(function() {
            if (undefined == $(this).data('formImage')) {
                var plugin = new $.formImage(this, options);
                $(this).data('formImage', plugin);
            }
        });

    }

})(jQuery);