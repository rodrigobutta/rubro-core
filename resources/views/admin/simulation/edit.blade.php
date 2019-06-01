@extends('admin.master.app')

@section('bodyclass', 'simulation-edit-page')

@section('content')

    <div class="container">

        <h2 class="content-heading js-appear-enabled animated fadeIn" data-toggle="appear">                    
            <a href="javascript:history.back()" class="btn btn-sm btn-rounded btn-secondary float-right">X</a>
            <a href="{{route('admin.simulation.play', ['id' => $item->id])}}" class="btn btn-sm btn-secondary float-right" style="margin-right:10px">Ir a la Simulación</a>
            {!! $item->id==0?'Nueva':'Editar' !!} Simulación
        </h2>

     
        <form name="formSimulation" method="POST" action="" aria-label="">
            @csrf

            <input type="hidden" name="id" value="{{ $item->id or '0' }}" />
            <input type="hidden" name="_method" value="PATCH" />
                       
            <div class="row">
                <div class="col-md-6">
                    
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
                        
                            
                            {{-- <div class="form-group">                                
                                <label class="css-control css-control-primary css-checkbox">
                                    <input type="checkbox" id="active" name="active" class="css-control-input" {{ $item->active==1?'checked':'' }}  value="1">
                                    <span class="css-control-indicator"></span> Verificado
                                </label>                              
                            </div> --}}
                    
                            {{-- <div class="form-group">                                                                
                                <label class="col-form-label">SLA</label>                            
                                <select class="form-control" name="family_id">
                                    <option value=""></option>
                                    @foreach($slas as $i)
                                        <option value="{{$i->id}}" {!! $item->family_id==$i->id?'selected':'' !!}>{{$i->name}}</option>
                                    @endforeach
                                </select>                            
                            </div> --}}
                            
                            <div class="form-group row">
                                <label class="col-12" for="sidenotes">Notas</label>
                                <div class="col-12">
                                    <textarea class="form-control" name="sidenotes" rows="6" placeholder="">{{ $item->sidenotes }}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="base_id">Base</label>                                
                                <input type="hidden" name="base_id" value="{{ $item->base_id }}"/>                                
                            </div>      
                            
                        </div>
                    </div>
                    
                    
                    <div class="block block-themed2">
                        <div class="block-header bg-secondary2 block-header-default ">
                            <h3 class="block-title">Cluster</h3>
                            {{-- <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div> --}}
                        </div>
                        <div class="block-content">

                            <div class="form-group">
                                <label for="zone_id">Zona</label>                                
                                <input type="hidden" name="zone_id" value="{{ $item->zone_id }}"/>                                
                            </div>      
                            <div class="form-group">
                                <label for="business_id">Negocio</label>                                
                                <input type="hidden" name="business_id" value="{{ $item->business_id }}"/>                                
                            </div>                               
                            <div class="form-group">
                                <label for="family_id">Familia de Productos</label>                                
                                <input type="hidden" name="family_id" value="{{ $item->family_id }}"/>                                
                            </div>    
                
    
                            
                        </div>
                    </div>


                    
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Segmento </h3>                            
                        </div>
                        <div class="block-content">
                        
                            <div class="form-group">
                                <label for="segment_id">Segmento</label>                                
                                <input type="hidden" name="segment_id" value="{{ $item->segment_id }}"/>                                
                            </div>      

                        </div>
                    </div>

                    
                        
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Usuarios Asociados</h3>                            
                            {{-- <div class="block-options">                                
                                <button id="btn_users" class="btn btn-sm btn-rounded btn-primary">+</button>
                            </div> --}}                            
                        </div>
                        <div class="block-content">
                    
                            <div class="form-group">   
                                <table class="table table-sm table-vcenter">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nombre</th>
                                            <th class="d-none d-sm-table-cell" style="width: 15%;">Rol</th>
                                            <th class="text-center" style="width: 100px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($item->users as $key => $user)
                                        
                                            <tr>                                                
                                                <td>{{ $user->fullname }}</td>
                                                <td class="d-none d-sm-table-cell">
                                                    @if($user->pivot->is_primary==1)
                                                        <span class="badge badge-success">Primario</span>                                                  
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        {{-- <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </button> --}}
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

                    
                    
                </div>
                <div class="col-md-6">

                    <div class="block block-themed2">
                        <div class="block-header bg-success2 block-header-default">
                            <h3 class="block-title">Rubros</h3>                            
                        </div>
                        <div class="block-content">
                                                
                            <div class="repeater" id="areas">
                                <div data-repeater-list="areas">
                        
                                    <div data-repeater-item style="display:none;">

                                        <input type="hidden" data-name="sort" name="sort" value="0" />

                                        <div class="form-group row">
                                            <div class="col-md-5">
                                                <select class="form-control" name="area_id">                                                    
                                                    @foreach($areas as $a)
                                                        <option value="{{$a->id}}">{{$a->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-5">                                               
                                                <select class="form-control" name="scenario_id">                                                    
                                                    @foreach($scenarios as $s)
                                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                                    @endforeach
                                                </select>                                                    
                                            </div>
                                            <div class="col-md-2">                                                
                                                <button data-repeater-delete type="button" class="btn btn-sm btn-secondary"><i class="fa fa-times text-danger"></i></button>
                                            </div>
                                        </div>

                                    </div> {{-- data-repeater-item  --}}

                                    <div class="form-group" >
                                        <button data-repeater-create type="button"  class="btn btn-secondary" data-original-title="Agregar"><i class="fa fa-plus"></i></button>
                                    </div>
                        
                                    @foreach($item->areas as $key => $i)
                        
                                        <div data-repeater-item>

                                            <input type="hidden" data-name="sort" name="sort" value="{{$key+1}}" />
                                            
                                            <div class="form-group row">
                                                <div class="col-md-5">
                                                    <select class="form-control" name="area_id">                                                           
                                                        @foreach($areas as $area)
                                                            <option value="{{$area->id}}" {!! $area->id==$i->id?'selected="selected"':'' !!}>{{$area->name}}</option>
                                                        @endforeach                                                        
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                    <select class="form-control" name="scenario_id">   
                                                        @foreach($scenarios as $scenario)
                                                            <option value="{{$scenario->id}}" {!! (isset($i->pivot->scenario_id)&&$scenario->id==$i->pivot->scenario_id)?'selected="selected"':'' !!}>{{$scenario->name}}</option>
                                                        @endforeach
                                                    </select>    
                                                </div>
                                                <div class="col-md-2">                                                
                                                    <button data-repeater-delete type="button" class="btn btn-sm btn-secondary"><i class="fa fa-times text-danger"></i></button>
                                                </div>
                                            </div>
            
                                        </div> 
                        
                                    @endforeach
                        
                                </div> {{-- data-repeater-list --}}
                            </div> {{-- repeater --}}



                        </div>
                    </div>


                    <div class="block block-themed2">
                        <div class="block-header bg-success2 block-header-default">
                            <h3 class="block-title">Tamaño de Empresa </h3>                            
                        </div>
                        <div class="block-content">
                                                
                            <div class="repeater" id="companysizes">
                                <div data-repeater-list="companysizes">
                        
                                    <div data-repeater-item style="display:none;">

                                        <input type="hidden" data-name="sort" name="sort" value="0" />

                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <select class="form-control" name="company_size_id">                                                    
                                                    @foreach($companysizes as $a)
                                                        <option value="{{$a->id}}">{{$a->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>                                                
                                            <div class="col-md-2">                                                
                                                <button data-repeater-delete type="button" class="btn btn-sm btn-secondary"><i class="fa fa-times text-danger"></i></button>
                                            </div>
                                        </div>

                                    </div> {{-- data-repeater-item  --}}

                                    <div class="form-group" >
                                        <button data-repeater-create type="button"  class="btn btn-secondary" data-original-title="Agregar"><i class="fa fa-plus"></i></button>
                                    </div>
                        
                                    @foreach($item->companysizes as $key => $i)
                        
                                        <div data-repeater-item>

                                            <input type="hidden" data-name="sort" name="sort" value="{{$key+1}}" />
                                            
                                            <div class="form-group row">
                                                <div class="col-md-10">
                                                    <select class="form-control" name="company_size_id">                                                           
                                                        @foreach($companysizes as $companysize)
                                                            <option value="{{$companysize->id}}" {!! $companysize->id==$i->id?'selected="selected"':'' !!}>{{$companysize->name}}</option>
                                                        @endforeach                                                        
                                                    </select>
                                                </div>
                                                <div class="col-md-2">                                                
                                                    <button data-repeater-delete type="button" class="btn btn-sm btn-secondary"><i class="fa fa-times text-danger"></i></button>
                                                </div>
                                            </div>
            
                                        </div> 
                        
                                    @endforeach
                        
                                </div> {{-- data-repeater-list --}}
                            </div> {{-- repeater --}}



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

    
    $(document).ready(function() {

        initUsers();


        initAreas();
      
    });



    var initAreas = function() {

        $('#select_area_new').formObjectSearch({            
            service: {
                search: '{{route('admin.area.search')}}',
                getbyid: '{{route('admin.area.getby.id')}}'             
            },
            format:  {
                text: 'name',
                id: 'id',
            },    
            valueChanged: function(e,data){
                console.log(data)

                e.clear();

            },
            placeholder: "Agregar area.."
        });


        $('#btn_areas').on('click',function(e){
            e.preventDefault();
            openAreasWindow();
        });

        function openAreasWindow(){

            $("#modal-areas").on("shown.bs.modal",function(a){

            }).on('hidden.bs.modal', function (e) {

            }).modal("show");

        }   

    }





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
        var form = $('form[name="formSimulation"]');
        var submitButton = form.find('#btn-save');
        var cancelButton = form.find('#btn-cancel');
        var submitUrl = '{{ route('admin.simulation.patch',[ 'id' => $item->id] ) }}';

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

            form.find('input[name="zone_id"]').formObjectSearch({            
                service: {
                    search: '{{route('admin.zone.search')}}',
                    getbyid: '{{route('admin.zone.getby.id')}}'             
                },
                format:  {
                    text: 'name',
                    id: 'id',
                }
            });

            form.find('input[name="family_id"]').formObjectSearch({            
                service: {
                    search: '{{route('admin.family.search')}}',
                    getbyid: '{{route('admin.family.getby.id')}}'             
                },
                format:  {
                    text: 'name',
                    id: 'id',
                }
            });

            form.find('input[name="business_id"]').formObjectSearch({            
                service: {
                    search: '{{route('admin.business.search')}}',
                    getbyid: '{{route('admin.business.getby.id')}}'             
                },
                format:  {
                    text: 'name',
                    id: 'id',
                }
            });

            form.find('input[name="segment_id"]').formObjectSearch({            
                service: {
                    search: '{{route('admin.segment.search')}}',
                    getbyid: '{{route('admin.segment.getby.id')}}'             
                },
                format:  {
                    text: 'name',
                    id: 'id',
                }
            });

            form.find('input[name="base_id"]').formObjectSearch({            
                service: {
                    search: '{{route('admin.base.search')}}',
                    getbyid: '{{route('admin.base.getby.id')}}'             
                },
                format:  {
                    text: 'name',
                    id: 'id',
                }
            });


            form.find('.repeater#areas').repeater({
                ready: function (item) {

                    item.parent().sortable({
                        // stop: function( event, ui ) {
                        //     var sort = 0
                        //     form.find('div[data-repeater-list="areas"] div[data-repeater-item]').each(function(){
                        //         sort++;
                        //         $(this).find('input[data-name="sort"]').val(sort);
                        //     })
                        // }
                    });

                },
                hide: function (el) {
                    $(this).slideUp(el);
                }
            });

            form.find('.repeater#companysizes').repeater({
                ready: function (item) {

                    item.parent().sortable({
                        // stop: function( event, ui ) {                            
                        //     var sort = 0
                        //     form.find('div[data-repeater-list="companysizes"] div[data-repeater-item]').each(function(){
                        //         sort++;
                        //         $(this).find('input[data-name="sort"]').val(sort);
                        //     })
                        // }
                    });

                },
                hide: function (el) {
                    $(this).slideUp(el);
                }
            });
 
 
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

                    // document.location = '{{route('admin.simulation.list')}}';
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
