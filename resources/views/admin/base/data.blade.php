@extends('admin.master.app')

@section('bodyclass', 'base-edit-page')

@section('content')

    <div class="container">

        <h2 class="content-heading js-appear-enabled animated fadeIn" data-toggle="appear">                    
            <a href="javascript:history.back()" class="btn btn-sm btn-rounded btn-secondary float-right">X</a>            
            Datos de {{$item->name}}
        </h2>

        <div class="row">

            <div class="col-md-12">
                
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Excels</h3>                        
                    </div>
                    <div class="block-content">


                        <table class="table table-hover table-vcenter">
                            <thead>
                                <tr>
                                    <th>Fuente de datos</th>
                                    <th>Estado</th>
                                    <th>Archivo actualmente cargado</th>
                                    <th></th>                                    
                                </tr>
                            </thead>
                            <tbody>                                
                                <tr>                                                                                        
                                    <td>Universo</td>   
                                    <td>{!! $item->getUniversoExcelAttachName()?'<i class="fa fa-check fa-2x text-success"></i>':'<i class="fa fa-times fa-2x text-warning" data-toggle="tooltip" data-original-title="No se subió ningun Excel"></i>' !!}</td>   
                                    <td>{{$item->getUniversoExcelAttachName()}}</td>   
                                    <td class="text-center">
                                        <div class="btn-group">
                                                <a href="" id="btn_import_universo" class="btn btn-sm btn-alt-primary" style="margin-right: 10px" data-toggle="tooltip" data-original-title="Subir archivo desde la computadora.."><i class="fa fa-file"></i></a>                                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr>                                                                                        
                                    <td>MAD</td>   
                                    <td>{!! $item->getMadExcelAttachName()?'<i class="fa fa-check fa-2x text-success"></i>':'<i class="fa fa-times fa-2x text-warning" data-toggle="tooltip" data-original-title="No se subió ningun Excel"></i>' !!}</td>   
                                    <td>{{$item->getMadExcelAttachName()}}</td>   
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="" id="btn_import_mad" class="btn btn-sm btn-alt-primary" style="margin-right: 10px" data-toggle="tooltip" data-original-title="Subir archivo desde la computadora.."><i class="fa fa-file"></i></a>                            
                                        </div>
                                    </td>
                                </tr>
                                <tr>                                                                                        
                                    <td>Mediana</td>   
                                    <td>{!! $item->getMedianaExcelAttachName()?'<i class="fa fa-check fa-2x text-success"></i>':'<i class="fa fa-times fa-2x text-warning" data-toggle="tooltip" data-original-title="No se subió ningun Excel"></i>' !!}</td>   
                                    <td>{{$item->getMedianaExcelAttachName()}}</td>   
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="" id="btn_import_mediana" class="btn btn-sm btn-alt-primary" style="margin-right: 10px" data-toggle="tooltip" data-original-title="Subir archivo desde la computadora.."><i class="fa fa-file"></i></a>                            
                                        </div>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                            
                        

                    </div>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="block block-themed2" style="margin-bottom:0px;">
                    <div class="block-header bg-secondary2 block-header-default ">
                        <h3 class="block-title">Datos Actuales</h3>                                
                    </div>
                    <div class="block-content">

                        <form name="filterFormImport" method="POST" action="" aria-label="">
                            @csrf
                
                            <input type="hidden" name="id" value="{{ $item->id or '0' }}" />
                            <input type="hidden" name="_method" value="POST" />

                            <div class="row">     
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="zone_id">Zona</label>                                
                                        <input type="hidden" name="filter_zone_id" value="{{ $filter_zone_id }}"/>                                
                                    </div>      
                                                    
                                    <div class="form-group">
                                        <label for="family_id">Familia de Productos</label>                                
                                        <input type="hidden" name="filter_family_id" value="{{ $filter_family_id }}"/>                                
                                    </div>    
                                
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="business_id">Negocio</label>                                
                                        <input type="hidden" name="filter_business_id" value="{{ $filter_business_id }}"/>                                
                                    </div>      
                                    <div class="form-group">
                                        <label for="source_id">Tabla</label>                                
                                        <input type="hidden" name="filter_source_id" value="{{ $filter_source_id }}"/>                                
                                    </div>    
                        
                                </div>   
                            
                            </div>   
                            <div class="row">
                                
                                <div class="col-md-12">
                                
                                    <div class="form-group">                                
                                        <label class="css-control css-control-primary css-checkbox" style="margin-top: 25px">
                                            <input type="checkbox" id="active" name="filter_notempty" class="css-control-input" {{ $filter_notempty==1?'checked':'' }}  value="1">
                                            <span class="css-control-indicator"></span> Sólo tablas que contengan valores
                                        </label>                              
                                    </div>
                                
                                </div>

                            </div>
                            <div class="row">     
                                <div class="col-md-12">

                                    <div class="form-group text-md-right" style="clear:both">                                
                                        <button type="submit" class="btn-save btn btn-sm2 btn-alt-primary action-button" on="rest"><i class="fa fa-spin fa-asterisk mr-5 on-working"></i><span class="on-rest">Aplicar Filtros</span></button>
                                    </div>
        
                                </div>                                                                                              
                            </div>

                        </form>

                        <hr>
                            
                    </div>
                </div>
                
            </div>
            
        </div>
        
                
        <div class="row">

            <div class="col-md-12">
                
                <div class="block">
                 
                    <div class="block-content">

                        <table class="table table-hover table-vcenter">
                            <thead>
                                <tr>
                                    <th>Negocio</th>
                                    <th>Familia</th>
                                    <th>Zona</th>
                                    <th>Tabla</th>
                                    <th>Código</th>
                                    <th>Valores</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($report as $i)
                                    <tr>                                                                                        
                                        <td>{{$i->business_name}}</td>   
                                        <td>{{$i->family_name}}</td>   
                                        <td>{{$i->zone_name}}</td>   
                                        <td>{{$i->source_name}}</td>   
                                        <td class="text-gray">{{$i->table_id}}</td>   
                                        <td>{{$i->total}}</td>   
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{route('admin.base.table', ['id' => $item->id, 'tableId' => getTableIdField($item->id,$i->business_id,$i->zone_id,$i->family_id,$i->source_id)])}}" class="btn btn-sm btn-alt-secondary" data-toggle="tooltip" title="Editar" data-original-title="Editar">
                                                    <i class="fa fa-table"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                
            </div>
        
        </div>


    </div>



    <!-- Add Modal Universo -->
    <div class="modal fade" id="modal_import_universo" tabindex="-1" role="dialog" aria-labelledby="modal_import_universo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">

                <form name="formImportUniverso" method="POST" action="" aria-label="">
                    @csrf
        
                    <input type="hidden" name="id" value="{{ $item->id or '0' }}" />
                    <input type="hidden" name="_method" value="PUT" />

                        
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header">
                            <h3 class="block-title">Universo</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal_import_universo" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            
                            <p>El excel debe cumplir con el formato definido, donde las solapas cuyo nombre coincida con la nomenclatura del Cluster, serán abiertas y se importaran los datos de las tablas dentro de ella (segun especificaciones).</p>
                            <p>Tener en cuenta que el importar un nuevo Excel, va a reemplazar todos los datos actuales, por mas que los nuevos datos no estén consolidados.</p>

                            {{-- <div class="form-group">
                                <label for="created_at">Fecha de la última importación</label><br>
                                <span>{{ $item->getCreatedDate()->format('l jS \\d\\e F Y')}}</span>
                            </div> --}}

                            <div class="form-group">
                                <label for="attach">Archivo Excel</label>
                                <input type="hidden" name="attach" data-name="attach" value="{{ $item->attach }}">                                    
                            </div>

                            {{-- <p><strong>Dependiendo la cantidad de clusters a importar, el proceso puede demorar unos minutos. Espere hasta que esta ventana se cierre y se recargue la página.</strong></p> --}}

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-cancel btn btn-alt-secondary" data-dismiss="modal_import_universo">Cancelar</button>
                        <button type="submit" class="btn-save btn btn-alt-primary action-button" on="rest"><span class="on-working"><i class="fa fa-spin fa-asterisk mr-5"></i> Importando..</span><span class="on-rest">Aceptar</span></button>                        
                    </div>
             
                </form>

            </div>
        </div>
    </div>
    <!-- END Add Modal Universo -->
    




    <!-- Add Modal Mad -->
    <div class="modal fade" id="modal_import_mad" tabindex="-1" role="dialog" aria-labelledby="modal_import_mad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">

                <form name="formImportMad" method="POST" action="" aria-label="">
                    @csrf
        
                    <input type="hidden" name="id" value="{{ $item->id or '0' }}" />
                    <input type="hidden" name="_method" value="PUT" />

                        
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header">
                            <h3 class="block-title">MAD</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal_import_mad" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            
                            {{-- <p>El excel debe cumplir con el formato definido, donde las solapas cuyo nombre coincida con la nomenclatura del Cluster, serán abiertas y se importaran los datos de las tablas dentro de ella (segun especificaciones).</p> --}}
                            {{-- <p>Tener en cuenta que el importar un nuevo Excel, va a reemplazar todos los datos actuales, por mas que los nuevos datos no estén consolidados.</p> --}}

                            <div class="form-group">
                                <label for="attach">Archivo Excel</label>
                                <input type="hidden" name="attach" data-name="attach" value="{{ $item->attach_mad }}">                                    
                            </div>

                            {{-- <p><strong>Dependiendo la cantidad de clusters a importar, el proceso puede demorar unos minutos. Espere hasta que esta ventana se cierre y se recargue la página.</strong></p> --}}

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-cancel btn btn-alt-secondary" data-dismiss="modal_import_mad">Cancelar</button>
                        <button type="submit" class="btn-save btn btn-alt-primary action-button" on="rest"><span class="on-working"><i class="fa fa-spin fa-asterisk mr-5"></i> Importando..</span><span class="on-rest">Aceptar</span></button>                        
                    </div>
             
                </form>

            </div>
        </div>
    </div>
    <!-- END Add Modal Mad -->



    <!-- Add Modal Mediana -->
    <div class="modal fade" id="modal_import_mediana" tabindex="-1" role="dialog" aria-labelledby="modal_import_mediana" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">

                <form name="formImportMediana" method="POST" action="" aria-label="">
                    @csrf
        
                    <input type="hidden" name="id" value="{{ $item->id or '0' }}" />
                    <input type="hidden" name="_method" value="PUT" />

                        
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header">
                            <h3 class="block-title">Mediana</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal_import_mediana" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            
                            {{-- <p>El excel debe cumplir con el formato definido, donde las solapas cuyo nombre coincida con la nomenclatura del Cluster, serán abiertas y se importaran los datos de las tablas dentro de ella (segun especificaciones).</p> --}}
                            {{-- <p>Tener en cuenta que el importar un nuevo Excel, va a reemplazar todos los datos actuales, por mas que los nuevos datos no estén consolidados.</p> --}}

                            <div class="form-group">
                                <label for="attach">Archivo Excel</label>
                                <input type="hidden" name="attach" data-name="attach" value="{{ $item->attach_mediana }}">                                    
                            </div>

                            {{-- <p><strong>Dependiendo la cantidad de clusters a importar, el proceso puede demorar unos minutos. Espere hasta que esta ventana se cierre y se recargue la página.</strong></p> --}}

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-cancel btn btn-alt-secondary" data-dismiss="modal_import_mediana">Cancelar</button>
                        <button type="submit" class="btn-save btn btn-alt-primary action-button" on="rest"><span class="on-working"><i class="fa fa-spin fa-asterisk mr-5"></i> Importando..</span><span class="on-rest">Aceptar</span></button>                        
                    </div>
             
                </form>

            </div>
        </div>
    </div>
    <!-- END Add Modal Mediana -->


@endsection


@section('js')


<script type="text/javascript">

    var modalUniverso = $('#modal_import_universo');
    var modalMad = $('#modal_import_mad');
    var modalMediana = $('#modal_import_mediana');


    $(document).ready(function() {

        $('#btn_import_universo').on('click',function(e){
            e.preventDefault();
            modalUniverso.modal('show');
        })
        
        $('#btn_import_mad').on('click',function(e){
            e.preventDefault();
            modalMad.modal('show');
        })

        $('#btn_import_mediana').on('click',function(e){
            e.preventDefault();
            modalMediana.modal('show');
        })

    });



    var formImportUniversoInit = function() {
        var form = $('form[name="formImportUniverso"]');
        var submitButton = form.find('.btn-save');
        var cancelButton = form.find('.btn-cancel');
        var submitUrl = '{{ route('admin.base.data.universo',[ 'id' => $item->id] ) }}';

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

            $.notify({
                message: 'Todo perfecto!',
            },{
                type: 'success',
                placement: { from: 'top', align: 'center'}
            });

            location.reload();

        };

        // al cancelar el modal
        var closeModal = function(){

            modalUniverso.modal('hide');

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

            form.find('input[data-name="attach"]').formFile({
                service: {
                    url: "{{ route('service.uploader.file.upload') }}",
                    archive: 'bases',
                    validation: {
                        rules: [
                            {'file': 'max:51200'}
                        ],
                        messages: [
                            {'file.max': 'El archivo pesa mas de lo permitido (50MB).'}
                        ]
                    }
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

                    // document.location = '{{route('admin.base.list')}}';
                    // window.history.back();
                    closeModal();
                })

                initComponents();


            }
        };
    }();
    $(function(){
        formImportUniversoInit.init();
    });







    var formImportMadInit = function() {
        var form = $('form[name="formImportMad"]');
        var submitButton = form.find('.btn-save');
        var cancelButton = form.find('.btn-cancel');
        var submitUrl = '{{ route('admin.base.data.mad',[ 'id' => $item->id] ) }}';

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

            $.notify({
                message: 'Todo perfecto!',
            },{
                type: 'success',
                placement: { from: 'top', align: 'center'}
            });

            location.reload();

        };

        
        // al cancelar el modal
        var closeModal = function(){

            modalMad.modal('hide');

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

            form.find('input[data-name="attach"]').formFile({
                service: {
                    url: "{{ route('service.uploader.file.upload') }}",
                    archive: 'bases',
                    validation: {
                        rules: [
                            {'file': 'max:51200'}
                        ],
                        messages: [
                            {'file.max': 'El archivo pesa mas de lo permitido (50MB).'}
                        ]
                    }
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

                    // document.location = '{{route('admin.base.list')}}';
                    // window.history.back();
                    closeModal();
                })

                initComponents();


            }
        };
    }();
    $(function(){
        formImportMadInit.init();
    });







    var formImportMedianaInit = function() {
        var form = $('form[name="formImportMediana"]');
        var submitButton = form.find('.btn-save');
        var cancelButton = form.find('.btn-cancel');
        var submitUrl = '{{ route('admin.base.data.mediana',[ 'id' => $item->id] ) }}';

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

            $.notify({
                message: 'Todo perfecto!',
            },{
                type: 'success',
                placement: { from: 'top', align: 'center'}
            });

            location.reload();

        };

        
        // al cancelar el modal
        var closeModal = function(){

            modalMediana.modal('hide');

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

            form.find('input[data-name="attach"]').formFile({
                service: {
                    url: "{{ route('service.uploader.file.upload') }}",
                    archive: 'bases',
                    validation: {
                        rules: [
                            {'file': 'max:51200'}
                        ],
                        messages: [
                            {'file.max': 'El archivo pesa mas de lo permitido (50MB).'}
                        ]
                    }
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

                    // document.location = '{{route('admin.base.list')}}';
                    // window.history.back();
                    closeModal();
                })

                initComponents();


            }
        };
    }();
    $(function(){
        formImportMedianaInit.init();
    });





    var filterFormInit = function() {
        var filterForm = $('form[name="filterFormImport"]');
        var submitButton = filterForm.find('.btn-save');
        var cancelButton = filterForm.find('.btn-cancel');
        var submitUrl = '{{ route('admin.base.data',[ 'id' => $item->id] ) }}';


        var filterFormSubmit = function(){

            if(submitButton.attr('on')=='working') return false;
            submitButton.attr('on','working');


            // corro las validaciones y si me da ok, es que podemos enviar el filterForm
            if(filterForm.valid()){

                var filterFormdata = false;
                if (window.FormData){
                    filterFormdata = new FormData(filterForm[0]);
                }

                filterForm.attr('action',submitUrl).submit();

                // var data = filterFormdata ? filterFormdata : filterForm.serialize();

                // $.ajax({
                //     url: submitUrl,
                //     type: 'POST',
                //     data: data,
                //     cache       : false,
                //     contentType : false,
                //     processData : false,
                //     dataType: 'JSON',
                //     success: function (response) {
                //         submitButton.attr('on','rest');

                //         filterFormSubmitedOk(response);

                //     },
                //     error: function (response) {
                //         submitButton.attr('on','rest');
                //         // console.log(response);

                //         if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION

                //             filterFormHasValidations(response);

                //         }
                //         else{ // ERROR

                //             filterFormHasErrors(response);

                //         }

                //     }
                // });

            }
            else{
                submitButton.attr('on','rest');
            }

        };

        // el filterFormulario se envió y volvio OK
        var filterFormSubmitedOk = function(response){

            $.notify({
                message: 'Todo perfecto!',
            },{
                type: 'success',
                placement: { from: 'top', align: 'center'}
            });

            
            // setTimeout(function() {

            //     location.reload();

            // }, 500);


        };

        // el filterFormulario se enviópero surgieron validaciones del lado del controller
        var filterFormHasValidations = function(response){

            if(typeof response.responseJSON.validations != 'undefined'){

                // el controller nos está infilterFormando validaciones del lado del server
                var validations = response.responseJSON.validations;
                Object.keys(validations).forEach(function(k){
                    // console.log(k + ' - ' + validations[k]);

                    var fieldGroup = filterForm.find('*[name="'+k+'"]').closest('.filterForm-group');
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

        // el filterFormulario al enviarse devolvió algún error (controlado o no)
        var filterFormHasErrors = function(response){

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


            filterForm.find('input[name="filter_zone_id"]').formObjectSearch({            
                service: {
                    search: '{{route('admin.zone.search')}}',
                    getbyid: '{{route('admin.zone.getby.id')}}'             
                },
                format:  {
                    text: 'name',
                    id: 'id',
                }
            });

            filterForm.find('input[name="filter_family_id"]').formObjectSearch({            
                service: {
                    search: '{{route('admin.family.search')}}',
                    getbyid: '{{route('admin.family.getby.id')}}'             
                },
                format:  {
                    text: 'name',
                    id: 'id',
                }
            });

            filterForm.find('input[name="filter_business_id"]').formObjectSearch({            
                service: {
                    search: '{{route('admin.business.search')}}',
                    getbyid: '{{route('admin.business.getby.id')}}'             
                },
                format:  {
                    text: 'name',
                    id: 'id',
                }
            });

            filterForm.find('input[name="filter_source_id"]').formObjectSearch({            
                service: {
                    search: '{{route('admin.source.search')}}',
                    getbyid: '{{route('admin.source.getby.id')}}'             
                },
                format:  {
                    text: 'name',
                    id: 'id',
                }
            });




        };

        

        return {
            init: function () {

                // filterFormValidationInit();

                submitButton.on('click', function(e){
                    e.preventDefault();
                    filterFormSubmit();
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
        filterFormInit.init();
    });
    

</script>


@endsection
