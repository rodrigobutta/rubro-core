@extends('admin.master.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top:40px">
                    <div class="card-header">Camapaña</div>

                    <div class="card-body">
    
                        <form method="post" action="{{$action === 'add' ? route('admin.campanias.post') : route('admin.campanias.edit', ['id' => $campaign->id])}}">
                            @csrf
                            <div class="form-group">
                                <label for="description">Nombre</label>
                                <input class="form-control @if($errors->has('name')) is-invalid @endif" type="text" name="name" id="name" placeholder="Nombre de la campaña" value="{{old('name', $campaign->name)}}">
                                @if ($errors->has('name'))
                                <div class="invalid-feedback">El campo es requerido.</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Nombre para analytics</label>
                                <input class="form-control @if($errors->has('name_analytics')) is-invalid @endif" type="text" name="name_analytics" id="name_analytics" placeholder="nombre_de_la_campaña" value="{{old('name_analytics', $campaign->name_analytics)}}">
                                @if ($errors->has('name_analytics'))
                                <div class="invalid-feedback">El campo es requerido.</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Prioridad</label>
                                <input type="number" step="1" min="0" class="form-control @if($errors->has('priority')) is-invalid @endif" type="text" name="priority" id="priority" placeholder="" value="{{old('priority', $campaign->priority or '1')}}">
                                @if ($errors->has('priority'))
                                <div class="invalid-feedback">El campo es requerido.</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label><input type="checkbox" id="is_active" name="is_active" value="true" @if(($action==='edit' && $campaign->is_active) || $action === 'add')checked @endif/> Campaña activa</label>
                            </div>

                            <div class="form-group">
                                <label><input type="checkbox" id="is_permanent" name="is_permanent" value="true" @if(($action==='edit' && $campaign->is_permanent) || $action === 'add')checked @endif/> Campaña permanente</label>
                            </div>

                            <div id="datetime_range_container">
                                <div class="form-group">
                                    <label for="date">Fecha de inicio</label>
                                    <input type="text"
                                        class="form-control @if($errors->has('start_date')) is-invalid @endif"
                                        id="start_date"
                                        name="start_date"
                                        data-week-start="1"
                                        data-autoclose="true"
                                        data-today-highlight="true"
                                        data-date-format="dd/mm/yyyy"
                                        placeholder="dd/mm/yyyy"
                                        @if($campaign->start_datetime)
                                        value="{{old('start_datetime', $campaign->start_datetime !== null ? $campaign->start_datetime->format('d/m/Y') : '')}}"
                                        @endif
                                    />
                                    @if ($errors->has('event_date'))
                                    <div class="invalid-feedback">El campo fecha es requerido.</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Hora de inicio </label>
                                    <div class="input-group">
                                        <select class="form-control col-2" name="start_hour" id="start_hour">
                                            @for($i = 0; $i < 24; $i++)
                                            <option value="{{ $i < 10 ? '0' . $i : $i }}" {{ intval(substr($campaign->start_datetime, 11,2)) === $i ? 'selected' : '' }}>{{ $i < 10 ? '0' . $i : $i }}</option>
                                            @endfor
                                        </select>
                                        &nbsp;&nbsp;:&nbsp;&nbsp;
                                        <select class="form-control col-2" name="start_minute" id="start_minute">
                                            @for($i = 0; $i < 60; $i+=1)
                                            <option value="{{ $i < 10 ? '0' . $i : $i }}" {{ intval(substr($campaign->start_datetime, 14,2)) === $i ? 'selected' : '' }}>{{ $i < 10 ? '0' . $i : $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="date">Fecha de fin</label>
                                    <input type="text"
                                        class="form-control @if($errors->has('end_date')) is-invalid @endif"
                                        id="end_date"
                                        name="end_date"
                                        data-week-start="1"
                                        data-autoclose="true"
                                        data-today-highlight="true"
                                        data-date-format="dd/mm/yyyy"
                                        placeholder="dd/mm/yyyy"
                                        @if($campaign->end_datetime)
                                        value="{{old('end_datetime', $campaign->end_datetime !== null ? $campaign->end_datetime->format('d/m/Y') : '')}}"
                                        @endif
                                    >
                                    @if ($errors->has('event_date'))
                                    <div class="invalid-feedback">El campo fecha es requerido.</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Hora de fin </label>
                                    <div class="input-group">
                                        <select class="form-control col-2" name="end_hour" id="end_hour">
                                            @for($i = 0; $i < 24; $i++)
                                            <option value="{{ $i < 10 ? '0' . $i : $i }}" {{ intval(substr($campaign->end_datetime, 11,2)) === $i ? 'selected' : '' }}>{{ $i < 10 ? '0' . $i : $i }}</option>
                                            {{-- <option value="{{ $i < 10 ? '0' . $i : $i }}">{{ $i < 10 ? '0' . $i : $i }}</option> --}}
                                            @endfor
                                        </select>
                                        &nbsp;&nbsp;:&nbsp;&nbsp;
                                        <select class="form-control col-2" name="end_minute" id="end_minute">
                                            @for($i = 0; $i < 60; $i+=1)
                                            <option value="{{ $i < 10 ? '0' . $i : $i }}" {{ intval(substr($campaign->end_datetime, 14,2)) === $i ? 'selected' : '' }}>{{ $i < 10 ? '0' . $i : $i }}</option>
                                            {{-- <option value="{{ $i < 10 ? '0' . $i : $i }}">{{ $i < 10 ? '0' . $i : $i }}</option> --}}
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>


                            @if($action === 'edit')
                            <div class="form-group"><hr/></div>

                            
                            <div class="form-group">
                                <h3>Espacios utilizados</h3>
                                @if($used_slots->count() > 0)
                                <table class="table table-hover table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Analytics</th>
                                            <th>Página</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($used_slots as $slot)
                                        <tr>
                                            <td>{{ $slot->name }}</td>
                                            <td>{{ $slot->name_analytics }}</td>
                                            <td><a href="{{ route('folder.view', ['id' => $slot->folder->url]) }}" target="_blank">{{ $slot->folder->name }} ({{ $slot->folder->url }})</a></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.campanias.slot.edit', ['campaign_id' => $campaign->id, 'slot_uuid' => $slot->uuid]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" title="Editar espacio" data-toggle="modal" data-target="#slotModal">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('admin.campanias.slot.delete', ['campaign_id' => $campaign->id, 'slot_uuid' => $slot->uuid]) }}" class="btn btn-sm btn-secondary btn-delete js-tooltip-enabled" data-toggle="tooltip" title="Eliminar espacio" data-original-title="Eliminar espacio">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <p>No hay espacios utilizados</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <h3>Espacios disponibles</h3>
                                @if($unused_slots->count() > 0)
                                <table class="table table-hover table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Analytics</th>
                                            <th>Página</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($unused_slots as $slot)
                                        <tr>
                                            <td>{{ $slot->name }}</td>
                                            <td>{{ $slot->name_analytics }}</td>
                                            <td><a href="{{ route('folder.view', ['id' => $slot->folder->url]) }}" target="_blank">{{ $slot->folder->name }} ({{ $slot->folder->url }})</a></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.campanias.slot.edit', ['campaign_id' => $campaign->id, 'slot_uuid' => $slot->uuid]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" title="Utilizar espacio" data-toggle="modal" data-target="#slotModal">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    {{-- <a href="#" class="btn btn-sm btn-secondary btn-delete js-tooltip-enabled" data-toggle="tooltip" title="Eliminar" data-original-title="Delete">
                                                        <i class="fa fa-times"></i>
                                                    </a> --}}
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <p>No quedan espacios sin utilizar</p>
                                @endif
                            </div>

                            
                            @endif


                            <div class="form-group">
                                <label><input type="checkbox" name="keep_editing" value="true"/> Seguir editando</label>
                            </div>


                            <div class="form-group">
                                <button class="btn btn-success">Guardar</button>
                                <a class="btn btn-default" href="{{ route('admin.campanias.index') }}">Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- modal start --}}
    <div class="modal fade" id="slotModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar espacio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                cargando...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
            </div>
        </div>
    </div>
    {{-- modal end --}}

@endsection

@section('js')
<script type="text/javascript">
    $(function () {

        $('#start_date').datepicker();
        $('#end_date').datepicker();

        $('#is_permanent').on('click', function(e) {
            setDateTimeRangeDisplay();
        });

        function setDateTimeRangeDisplay() {
            $('#datetime_range_container').css({
                display: $('#is_permanent').is(':checked') ? 'none' : 'block'
            });
        }
        
        $('#event_date').datepicker();

        
        $('input[name="url"]').formLink({
            service: {
                search: '{{route('admin.folder.search')}}',
                getbyid: '{{route('admin.folder.getby.id')}}'
            }
        });

        setDateTimeRangeDisplay();

        $('#slotModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var modal = $(this)
            modal.find('.modal-body').load(button.attr('href'), function() {
                modal.find('input[data-name="image"]').formImage({
                    service: {
                        url: '{{ route('service.uploader.image.upload') }}',
                        archive: 'contents',
                        validation: {
                            rules: [
                                {'image': 'max:102400|dimensions:min_width=80,min_height=60'}
                            ],
                            messages: [
                                {'image.image': 'El archivo seleccionado no es una imagen.'},
                                {'image.mimes': 'La imagen debe ser jpeg,png,jpg,gif o svg.'},
                                {'image.dimensions': 'La imagen debe tener al menos 80px de ancho X 60px de alto.'},
                                {'image.max': 'La imagen debe pesar 10MB como máximo.'}
                            ]
                        }
                    }
                });

                modal.find('input[data-name="link"]').formLink({
                    service: {
                        search: '{{route('admin.folder.search')}}',
                        getbyid: '{{route('admin.folder.getby.id')}}'             
                    }
                });
            })
        })

        $('.btn-delete').on('click', function (event) {
            event.preventDefault();
            var button = $(event.currentTarget);
            if(confirm('Desea dejar de utilizar el espacio seleccionado?')) {
                $.post({
                    url: button.attr('href'),
                    success: function() {
                        window.location.href = window.location.href
                    },
                    error: function() {
                        alert('Error');
                    }
                });
            }
        });

        $('.modal .btn-primary').on('click', function(event) {
            event.preventDefault();
            var $form = $('.modal form');
            $form.submit();
        });

        
    });
</script>
@endsection