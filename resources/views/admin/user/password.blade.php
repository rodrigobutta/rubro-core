@extends('admin.master.app')

@section('bodyclass', 'user-password-page')

@section('content')
    
    <div class="container">


        <div class="row">
            <div class="col-md-6">
                <!-- Static Labels -->
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Cambiar Contraseña</h3>
                        {{-- <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div> --}}
                    </div>
                    <div class="block-content">
                        <p>La contraseña actual no se muestra, pero al ingresar una nueva y guardar, la misma quedará actualizada.</p>

                  
                        <form name="formPassword" method="POST" action="" aria-label="">
                            @csrf

                            <input type="hidden" name="_method" value="PATCH" />

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" name="password">                                
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Repetir Contraseña</label>
                                <input type="password" class="form-control" name="password_confirmation">                            
                            </div>

                            <div class="form-group">
                                <div class="text-md-right">
                                    <button id="btn-save" type="submit" class="btn btn-alt-primary action-button" on="rest"><i class="fa fa-spin fa-asterisk mr-5 on-working"></i><span class="on-rest">Confirmar Nueva Contraseña</span></button>
                                    <button id="btn-cancel" type="button" class="btn btn-alt-secondary">Cerrar</button>
                                </div>
                            </div>

                        </form>
                    
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('js')

<script type="text/javascript">

    var formInit = function() {
        var form = $('form[name="formPassword"]');
        var submitButton = form.find('#btn-save');
        var cancelButton = form.find('#btn-cancel');
        var submitUrl = '{{ route('admin.user.password',[ 'id' => $item->id] ) }}';

        // Validaciones del lado del cliente que dejo de lado (aunque funcionan bien), porque meto todas las validaciones en el controller, salvo forms que puedan ser pesados y quiera agarrarlos antes de que el usiuario se clave uploads
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
        //             // 'name': {
        //             //     required: true,
        //             //     minlength: 3
        //             // },
        //             // 'slug': {
        //             //     required: true,
        //             //     pattern: /^[A-Za-z\d-.]+$/
        //             // },
        //             // 'layout': {
        //             //     required: true
        //             // }
        //         },
        //         messages: {
        //             // 'name': {
        //             //     required: 'Debe ingresar un nombre',
        //             //     minlength: 'El nombre debe tener al menos 3 caracteres'
        //             // },
        //             // 'slug': {
        //             //     required: 'Debe ingresar un slug',
        //             //     pattern: 'El slug contiene caracteres inválidos'
        //             // },
        //             // 'layout': 'Debe seleccionar una plantilla'
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

            setTimeout(function() {

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
                form.find('.invalid-feedback').remove();

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


        var initComponents = function(){


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

                    window.history.back();

                    // closeModal();
                })

                initComponents();

            }
        };
    }();
    $(function(){
        formInit.init();
    });


</script>

@endsection
