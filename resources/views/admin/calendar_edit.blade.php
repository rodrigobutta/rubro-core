@extends('admin.master.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top:40px">
                    <div class="card-header">Evento</div>

                    <div class="card-body">
    
                        <form method="post" action="{{$edit ? route('admin.calendar.put', ['id' => $event->id]) : route('admin.calendar.post')}}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Categoría:</label>
                                <select class="form-control" name="title" id="title">
                                    @foreach ($types as $type)
                                        <option value="{{$type}}" @if($event->title === $type)selected @endif>{{$type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <input class="form-control @if($errors->has('description')) is-invalid @endif" type="text" name="description" id="description" placeholder="Descripción" value="{{old('description', $event->description)}}">
                                @if ($errors->has('description'))
                                <div class="invalid-feedback">El campo descripción es requerido.</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                <input type="text"
                                    class="form-control @if($errors->has('event_date')) is-invalid @endif"
                                    id="event_date"
                                    name="event_date"
                                    data-week-start="1"
                                    data-autoclose="true"
                                    data-today-highlight="true"
                                    data-date-format="dd/mm/yyyy"
                                    placeholder="dd/mm/yyyy"
                                    value="{{old('event_date', $event->event_date !== '' ? $event->event_date->format('d/m/Y') : '')}}"
                                >
                                @if ($errors->has('event_date'))
                                <div class="invalid-feedback">El campo fecha es requerido.</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Hora </label>
                                <div class="input-group">
                                    <select class="form-control col-2" name="hour" id="hour">
                                        @for($i = 0; $i < 24; $i++)
                                        <option value="{{ $i < 10 ? '0' . $i : $i }}" {{ intval(substr($event->event_date, 11,2)) === $i ? 'selected' : '' }}>{{ $i < 10 ? '0' . $i : $i }}</option>
                                        @endfor
                                    </select>
                                    &nbsp;&nbsp;:&nbsp;&nbsp;
                                    <select class="form-control col-2" name="minute" id="minute">
                                        @for($i = 0; $i < 60; $i+=5)
                                        <option value="{{ $i < 10 ? '0' . $i : $i }}" {{ intval(substr($event->event_date, 14,2)) === $i ? 'selected' : '' }}>{{ $i < 10 ? '0' . $i : $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                
                                <div class="col-8">
                                    <label for="link">Link</label>
                                    <input type="hidden" name="url" value="{{$event->url or ''}}" />
                                </div>
                                <div class="col-4">
                                    <label for="link">Abrir en</label>
                                    <select class="form-control" name="window" id="window">
                                        <option value="_self" @if($event->window === '_self')selected @endif>Misma ventana</option>
                                        <option value="_blank" @if($event->window === '_blank')selected @endif>Ventana nueva</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <button class="btn btn-success">Guardar</button>
                                <a class="btn btn-default" onClick="history.back();">Cancelar</a>
                                <input type="hidden" name="category" value="{{ strpos(Request::url(), '_vencimientos') ? 'b' : 'a' }}">
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
    $(function () {
        
        $('#event_date').datepicker();

        
        $('input[name="url"]').formLink({
            service: {
                search: '{{route('admin.folder.search')}}',
                getbyid: '{{route('admin.folder.getby.id')}}'
            }
        });

        
    });
</script>
@endsection