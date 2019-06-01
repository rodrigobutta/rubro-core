@extends('admin.master.app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

            <h2 class="content-heading" data-toggle="appear">
                <button type="button" class="btn btn-sm btn-rounded btn-primary d-md-none float-right ml-5" data-toggle="class-toggle" data-target=".js-inbox-nav" data-class="d-none d-md-block">Menu</button>
                <a href="{{ route('admin.user.add') }}" class="btn btn-sm btn-rounded btn-success float-right" >Nuevo Usuario</a>
                Usuarios
            </h2>

            <div class="row gutters-tiny invisible" data-toggle="appear">
                <div class="col-12">

                    <div class="block">
                        <div class="block-header block-header-default">
                            <div class="block-title">
                                <strong>{{$items->firstItem()}}-{{$items->lastItem()}}</strong> de <strong>{{$items->total()}}</strong>
                            </div>
                            <div class="block-options">
                                <a href="{{$items->previousPageUrl()}}" class="btn-block-option {{$items->onFirstPage()?'disabled':''}}">
                                    <i class="si si-arrow-left"></i>
                                </a>
                                <a href="{{$items->nextPageUrl()}}" class="btn-block-option">
                                    <i class="si si-arrow-right"></i>
                                </a>
                                <a href="javascript:location.reload();" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </a>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                            </div>
                        </div>
                        <div class="block-content">
                            <!-- Messages Options -->
                            <div class="push">
                                
                                <form class="form-inline float-right" action="{{route('admin.user.list')}}" style="padding-top: 10px;">
                            

                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="{{$q}}" name="q" id="q">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-secondary">Buscar</button>
                                        </div>
                                        @if($q!='')
                                            <a href="{{route('admin.user.list')}}" class="btn btn-secondary" title="Limpiar búsqueda" style="margin-left:10px"><i class="fa fa-times"></i> Limpiar búsqueda</a>
                                        @endif
                                    </div>

                                    
                                </form>
                                                                    
                                {{-- <button type="button" class="btn btn-rounded btn-alt-secondary">
                                    <i class="fa fa-archive text-primary mx-5"></i>
                                    <span class="d-none d-sm-inline"> Archive</span>
                                </button>
                                <button type="button" class="btn btn-rounded btn-alt-secondary">
                                    <i class="fa fa-star text-warning mx-5"></i>
                                    <span class="d-none d-sm-inline"> Star</span>
                                </button> --}}
                            </div>
                            <!-- END Messages Options -->
        
                            <!-- Messages -->
                            <!-- Checkable Table (.js-table-checkable class is initialized in Codebase() -> uiHelperTableToolsCheckable()) -->
                            <table class="table table-hover table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>E-Mail</th>
                                        <th>Perfiles Especiales</th>
                                        <th>Zonas</th>
                                        <th>Negocios</th>
                                        <th>Familias</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $i)
                                        <tr>
                                            <td>{{$i->name}} {{$i->lastname}}</td>
                                            <td>{{$i->email}}</td>                                
                                            <td>{!!$i->hasProfile('admin')?'Superadmin':$i->commaProfiles('<br />')!!}</td>                                
                                            <td>{!!$i->commaZones('<br />')!!}</td>                                
                                            <td>{!!$i->commaBusiness('<br />')!!}</td>   
                                            <td>{!!$i->commaFamilies('<br />')!!}</td>   
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{route('admin.user.edit', ['id' => $i->id])}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Editar" data-original-title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    <a href="{{route('admin.user.password', ['id' => $i->id])}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Contraseña" data-original-title="Contraseña">
                                                        <i class="fa fa-lock"></i>
                                                    </a>

                                                    <a href="{{route('admin.user.delete', ['id' => $i->id])}}" class="btn btn-sm btn-secondary btn-delete" data-toggle="tooltip" title="Eliminar" data-original-title="Delete" data-id="{{ $i->id }}">
                                                        <i class="fa fa-times text-danger"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- END Messages -->
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->


@endsection

@section('js')


<script type="text/javascript">

    var listInit = function() {
        var list = $('table tbody');
        
        return {
            init: function () {

                list.find('.btn-delete').on('click', function(e) {
                    e.preventDefault();
                    var $this = $(this);


                    var $item =  $this.closest('tr');

                    
                    if(confirm('Eliminar elemento seleccionado?')) {
                        $.ajax({
                            url: $this.attr('href'),
                            method: 'post',
                            success: function(response) {
                                console.log(response)

                                $item.fadeOut(function(){
                                    $item.delete();
                                    window.location.href = window.location.href;
                                })

                                
                            }
                        });
                    }

                });


            }
        };
    }();
    $(function(){
        listInit.init();
    });


</script>


@endsection