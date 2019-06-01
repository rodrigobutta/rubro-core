@extends('admin.master.app')

@section('bodyclass', 'user-profile-page')

@section('content')

    <div class="container">

    
        <h2 class="content-heading js-appear-enabled animated fadeIn" data-toggle="appear">                    
            <a href="javascript:history.back()" class="btn btn-sm btn-rounded btn-secondary float-right">X</a>
            {!! $item->id==0?'Nuevo':'Editar' !!} Usuario
        </h2>

        <form name="formProfile" method="POST" action="" aria-label="">
                    
            <input type="hidden" name="id" value="{{ $item->id or '0' }}" />
            <input type="hidden" name="_method" value="PATCH" />
            
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <!-- Static Labels -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Información</h3>
                            {{-- <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div> --}}
                        </div>
                        <div class="block-content">
                        
                                                
                            <div class="form-group">                                
                                <label for="email">E-Mail</label>
                                <input type="text" class="form-control" name="email" placeholder="" value="{{ $item->email }}">                                    
                            </div>
                            <div class="form-group">                                
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" placeholder="" value="{{ $item->name }}">                                    
                            </div>
                            <div class="form-group">                                
                                <label for="name">Apellido</label>
                                <input type="text" class="form-control" name="lastname" placeholder="" value="{{ $item->lastname }}">                                    
                            </div>
                            {{-- <div class="form-group row">                                                                
                                <label class="col-12 col-form-label">Documento</label>
                                <div class="col-4">                                                                
                                    <select class="form-control" name="document_type">
                                        <option value=""></option>
                                        <option value="dni" {!! $item->document_type=='dni'?'selected':'' !!}>DNI</option>
                                        <option value="lc" {!! $item->document_type=='lc'?'selected':'' !!}>LC</option>
                                        <option value="pas" {!! $item->document_type=='pas'?'selected':'' !!}>PAS</option>
                                    </select>
                                </div>
                                <div class="col-8">                                                                
                                    <input type="text" class="form-control" name="document_number" placeholder="" value="{{ $item->document_number }}">                                    
                                </div>
                            </div> --}}
                            <div class="form-group">                                
                                <label for="phone">Teléfono</label>
                                <input type="text" class="form-control" name="phone" placeholder="" value="{{ $item->phone }}">                                    
                            </div>
                        
                        </div>
                    </div>
                    <!-- END Static Labels -->
                </div>
                <div class="col-md-6">
                    
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Clusters Habilitados</h3>
                            {{-- <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div> --}}
                        </div>
                        <div class="block-content">

                            <p>En caso que el usuario cuente con el perfil de Todos los Clusters, este modulo queda sin vigencia.</p>

                            <div class="form-group">
                                <label for="zones[]">Zonas</label>                                                                
                                <select class="form-control" name="zones[]" multiple="multiple">
                                    @foreach($zones as $i)
                                        <option value="{{$i->id}}" {!! $item->zones->contains($i->id)?'selected="selected"':'' !!}>{{$i->name}}</option>
                                    @endforeach
                                </select>
                            </div>      

                            <div class="form-group">
                                <label for="families[]">Familias</label>                                                                
                                <select class="form-control" name="families[]" multiple="multiple">
                                    @foreach($families as $i)
                                        <option value="{{$i->id}}" {!! $item->families->contains($i->id)?'selected="selected"':'' !!}>{{$i->name}}</option>
                                    @endforeach
                                </select>
                            </div>   

                            <div class="form-group">
                                <label for="business[]">Negocios</label>                                                                
                                <select class="form-control" name="business[]" multiple="multiple">
                                    @foreach($business as $i)
                                        <option value="{{$i->id}}" {!! $item->business->contains($i->id)?'selected="selected"':'' !!}>{{$i->name}}</option>
                                    @endforeach
                                </select>
                            </div>   
                            
                        </div>
                    </div>
                    
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Permisos Especiales</h3>
                            {{-- <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div> --}}
                        </div>
                        <div class="block-content">
                        
                            {{-- <div class="form-group">                                
                                <div class="css-control css-control-info css-checkbox">
                                <input class="css-control-input2 listfield" name="blank" data-name="blank" type="checkbox" value="1" {!! $item->god?'checked':''  !!}>
                                    <span class="css-control-indicator"></span> Es Administrador<small>&nbsp;&nbsp;(control total sobre todos los modulos y contenidos)</small>
                                </div>                                
                            </div> --}}
    
                            <div class="form-group row">                                            
                                <div class="col-6">
                                    <label for="profiles">Habilitados</label>
                                    <input type="hidden" name="profiles" value="{{ $item->profiles->implode('id',',') }}">
                                    <ul id="available_profiles" class="profile-list connectedSortable">
                                        @foreach($item->profiles as $profile)
                                            <li data-id="{{$profile->id}}" class="ui-state-default" data-toggle="tooltip" data-original-title="{{$profile->description}}">{{$profile->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <label for="profiles">Disponibles</label>
                                    <ul id="selected_profiles" class="profile-list connectedSortable">
                                        @foreach($availableProfiles as $profile)
                                    <li data-id="{{$profile->id}}" class="ui-state-default" data-toggle="tooltip" data-original-title="{{$profile->description}}">{{$profile->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>

                <div class="col-md-12">

                    <div class="block">                         
                        <div class="block-content">
                                  
                            <div class="form-group text-md-right" style="clear:both">                                
                                <button id="btn-save" type="submit" class="btn btn-alt-primary action-button" on="rest"><i class="fa fa-spin fa-asterisk mr-5 on-working"></i><span class="on-rest">Guardar</span></button>
                                {{-- <button id="btn-cancel" type="button" class="btn btn-alt-secondary">Cerrar</button> --}}                                
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            
        </form>

            
    </div>

@endsection


@section('js')
    
    <script type="text/javascript">

        var formInit = function() {
            var form = $('form[name="formProfile"]');
            var submitButton = form.find('#btn-save');
            var cancelButton = form.find('#btn-cancel');
            var submitUrl = '{{ route('admin.user.patch',[ 'id' => $item->id] ) }}';

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


                 form.find('select[name="zones[]"]').select2({ containerCssClass : "form-control222" });
                 form.find('select[name="business[]"]').select2();
                 form.find('select[name="families[]"]').select2();

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

                        // document.location = '{{route('admin.user.list')}}';
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
