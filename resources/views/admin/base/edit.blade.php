@extends('admin.master.app')

@section('bodyclass', 'base-edit-page')

@section('content')

    <div class="container">

        <h2 class="content-heading js-appear-enabled animated fadeIn" data-toggle="appear">                    
            <a href="javascript:history.back()" class="btn btn-sm btn-rounded btn-secondary float-right">X</a>
            {!! $item->id==0?'Nuevo':'Editar' !!} Base
        </h2>

        <form name="formBaseEdit" method="POST" action="" aria-label="">
            @csrf

            <input type="hidden" name="id" value="{{ $item->id or '0' }}" />
            <input type="hidden" name="_method" value="PATCH" />
                  
            <div class="row">
                <div class="col-md-12">
                    
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
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" placeholder="" value="{{ $item->name }}">                                
                            </div>
                    
                            <div class="form-group row">
                                <label class="col-12" for="sidenotes">Notas</label>
                                <div class="col-12">
                                    <textarea class="form-control" name="sidenotes" rows="6" placeholder="">{{ $item->sidenotes }}</textarea>
                                </div>
                            </div>

                            <br>
                            
                            <div class="form-group">                                
                                <label class="css-control css-control-primary css-checkbox">
                                    <input type="checkbox" id="active" name="active" class="css-control-input" {{ $item->active==1?'checked':'' }}  value="1">
                                    <span class="css-control-indicator"></span> Consolidada
                                </label>                              
                            </div>
    
                        </div>
                    </div>
                  
                </div>
                {{-- <div class="col-md-6">

                    <div class="block block-fix-height">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Usuarios Asociados</h3>                                                                        
                        </div>
                        <div class="block-content">
                    
                            <div class="form-group">   
                                <table class="table table-sm table-vcenter">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Empresa</th>
                                            <th class="d-none d-sm-table-cell" style="width: 15%;">Rol</th>
                                            <th class="text-center" style="width: 100px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($item->users as $key => $user)
                                        
                                            <tr>                                                
                                                <td>{{ $user->fullname }}</td>
                                                <td>{{ $user->getBusiness()->name }}</td>
                                                <td class="d-none d-sm-table-cell">
                                                    @if($user->pivot->is_primary==1)
                                                        <span class="badge badge-success">Primario</span>                                                  
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">                                                       
                                                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="" data-original-title="Delete">
                                                            <i class="fa fa-times text-danger"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="form-group">
                                <input type="hidden" id="select_user_new" class="field" value=""/>                                
                            </div>
                                                        
                        </div>
                    </div>
        
                </div> --}}

                <div class="col-md-12">

                    <div class="block">                         
                        <div class="block-content">
                                  
                            <div class="form-group text-md-right" style="clear:both">                                
                                
                                @if($item->isEmpty())
                                    <button id="btn-save" type="submit" class="btn btn-alt-success action-button" on="rest"><i class="fa fa-spin fa-asterisk mr-5 on-working"></i><span class="on-rest">Guardar y Seleccionar Excel..</span></button>
                                @else
                                    <button id="btn-save" type="submit" class="btn btn-alt-primary action-button" on="rest"><i class="fa fa-spin fa-asterisk mr-5 on-working"></i><span class="on-rest">Guardar</span></button>
                                @endif
                                
                                
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
    
    $(document).ready(function() {

        initUsers();
      
    });

    var initUsers = function() {

        $('#select_user_new').formObjectSearch({            
            service: {
                search: '{{route('admin.user.search')}}',
                getbyid: '{{route('admin.user.getby.id')}}'             
            },
            format:  {
                text: 'name',
                id: 'id',
            },    
            valueChanged: function(e,data){
                console.log(data)

                e.clear();

            },
            placeholder: "Agregar usuario.."
        });
        

        $('#btn_users').on('click',function(e){
            e.preventDefault();
            openUsersWindow();
        });

        function openUsersWindow(){

            $("#modal-users").on("shown.bs.modal",function(a){

            }).on('hidden.bs.modal', function (e) {

            }).modal("show");

        }

    }


    var formInit = function() {
        var form = $('form[name="formBaseEdit"]');
        var submitButton = form.find('#btn-save');
        var cancelButton = form.find('#btn-cancel');
        var submitUrl = '{{ route('admin.base.patch',[ 'id' => $item->id] ) }}';

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


            // agregar campo sort a todos los elementos del repeater
            form.find('div[data-repeater-list]').each(function(){                
                var sort = 0  
                $(this).find('div[data-repeater-item]').each(function(){
                    sort++;
                    $(this).find('input[data-name="sort"]').val(sort);
                })                
            })


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

            @if($item->isEmpty())

                console.log(response)
                
                var url = '{{route('admin.base.data', ['id' => 'xxx'])}}';
                
                url = url.replace('xxx',response.id)

                window.location.href = url;                

                

            @endif
            
            $.notify({
                message: 'Todo perfecto!',
            },{
                type: 'success',
                placement: { from: 'top', align: 'center'}
            });

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

                    // document.location = '{{route('admin.base.list')}}';
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