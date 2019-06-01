@extends('admin.master.app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

            <h2 class="content-heading" data-toggle="appear">
                <button type="button" class="btn btn-sm btn-rounded btn-primary d-md-none float-right ml-5" data-toggle="class-toggle" data-target=".js-inbox-nav" data-class="d-none d-md-block">Menu</button>
                <a href="{{ route('admin.campanias.add') }}" class="btn btn-sm btn-rounded btn-success float-right">Nueva</a>
                Campañas
            </h2>
           
            <div class="row gutters-tiny invisible" data-toggle="appear">
                <div class="col-12">
                @if($campaigns->count() > 0)
                <div class="block">
                        <div class="block-header block-header-default">
                            <div class="block-title">
                                <strong>{{$campaigns->firstItem()}}-{{$campaigns->lastItem()}}</strong> de <strong>{{$campaigns->total()}}</strong>
                            </div>
                            <div class="block-options">
                                <a href="{{$campaigns->previousPageUrl()}}" class="btn-block-option {{$campaigns->onFirstPage()?'disabled':''}}">
                                    <i class="si si-arrow-left"></i>
                                </a>
                                <a href="{{$campaigns->nextPageUrl()}}" class="btn-block-option">
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
                                
                                {{-- <form class="form-inline float-right" action="{{route(($category === 'a') ? 'admin.calendar.index' : 'admin.calendar_vencimientos.index')}}" style="padding-top: 10px;">
                            

                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="{{$q}}" name="q" id="q">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-secondary">Buscar</button>
                                        </div>
                                        @if($q!='')
                                            <a href="{{route(($category === 'a') ? 'admin.calendar.index' : 'admin.calendar_vencimientos.index')}}" class="btn btn-secondary" title="Limpiar búsqueda" style="margin-left:10px"><i class="fa fa-times"></i> Limpiar búsqueda</a>
                                        @endif
                                    </div>

                                    
                                </form> --}}
                                                                    
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
                                        <th>Duración</th>
                                        <th>Prioridad</th>
                                        <th>Activa</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($campaigns as $campaign)
                                    <tr>
                                        <td>{{$campaign->name}}</td>
                                        {{-- <td>{{$event->description}}</td>
                                        <td>{{$event->event_date->format('d/m/y H:i')}}</td> --}}
                                        <td>{{$campaign->duration}}</td>
                                        <td>{{$campaign->priority}}</td>
                                        <td>{{$campaign->is_active ? 'Si' : 'No'}}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{route('admin.campanias.edit', ['id' => $campaign->id])}}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Editar" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{route('admin.campanias.delete', ['id' => $campaign->id])}}" class="btn btn-sm btn-secondary btn-delete js-tooltip-enabled" data-toggle="tooltip" title="Eliminar" data-original-title="Delete" data-id="{{ $campaign->id }}">
                                                    <i class="fa fa-times"></i>
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

                    
                    
                    {{$campaigns->links()}}
                </div>
                @else
                <div class="block">No hay campañas creadas</div>
                @endif
            </div>
            
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->


@endsection

@section('js')
    <script>
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        var $this = $(e.currentTarget);
        if(confirm('Eliminar elemento seleccionado?')) {
            $.ajax({
                url: $this.attr('href'),
                method: 'post',
                success: function() {
                    window.location.href = window.location.href;
                }
            });
        }
    });
    </script>
@endsection