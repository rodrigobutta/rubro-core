@extends('admin.master.component.standard')

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')

    <div class="row justify-content-center">
        <div class="col-xl-6">

{{--
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="title" placeholder="" value="{{ $fields->title or '' }}">
                    <label for="title">Título</label>
                </div>
            </div> --}}
            <div class="form-group">
                 <div class="form-material">
                     <input type="text" class="form-control field" name="cta" placeholder="" value="{{ $fields->cta or '' }}">
                     <label for="cta">Etiqueta del Link</label>
                 </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" name="link" class="field" value="{{$fields->link or ''}}" />
                    <label for="link">Link</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input2 field" name="blank" type="checkbox" id="blank"  {{ gg($fields->blank)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>


            <h4>Primer bloque</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" class="field" name="image1" data-name="image1" value="{{$fields->image1 or ''}}">
                    <label for="image1">Imagen</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="appendix1" placeholder="" value="{{ $fields->appendix1 or '' }}">
                    <label for="appendix1">Volanta</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="title1" rows="2" placeholder="">{{ $fields->title1 or '' }}</textarea>
                    <label for="title1">Título</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="subtitle1" rows="2" placeholder="">{{ $fields->subtitle1 or '' }}</textarea>
                    <label for="subtitle1">Subtítulo</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" name="link1" class="field" value="{{$fields->link1 or ''}}" />
                    <label for="link1">Link</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input2 field" name="blank1" type="checkbox" id="blank1"  {{ gg($fields->blank1)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>

            <h4>Segundo bloque</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="appendix2" placeholder="" value="{{ $fields->appendix2 or '' }}">
                    <label for="appendix">Volanta</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="title2" rows="2" placeholder="">{{ $fields->title2 or '' }}</textarea>
                    <label for="title">Título</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="subtitle2" rows="2" placeholder="">{{ $fields->subtitle2 or '' }}</textarea>
                    <label for="subtitle">Subtítulo</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" name="link2" class="field" value="{{$fields->link2 or ''}}" />
                    <label for="link2">Link</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input2 field" name="blank2" type="checkbox"   {{ gg($fields->blank2)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>

            <h4>Tercer bloque</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="appendix3" placeholder="" value="{{ $fields->appendix3 or '' }}">
                    <label for="appendix3">Volanta</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="title3" rows="2" placeholder="">{{ $fields->title3 or '' }}</textarea>
                    <label for="title3">Título</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="subtitle3" rows="2" placeholder="">{{ $fields->subtitle3 or '' }}</textarea>
                    <label for="subtitle3">Subtítulo</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" name="link3" class="field" value="{{$fields->link3 or ''}}" />
                    <label for="link3">Link</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input2 field" name="blank3" type="checkbox"  {{ gg($fields->blank3)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>

            <h4>Cuarto bloque</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="appendix4" placeholder="" value="{{ $fields->appendix4 or '' }}">
                    <label for="appendix">Volanta</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="title4" rows="2" placeholder="">{{ $fields->title4 or '' }}</textarea>
                    <label for="title">Título</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="subtitle4" rows="2" placeholder="">{{ $fields->subtitle4 or '' }}</textarea>
                    <label for="subtitle">Subtítulo</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" name="link4" class="field" value="{{$fields->link4 or ''}}" />
                    <label for="link4">Link</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input2 field" name="blank4" type="checkbox"  {{ gg($fields->blank4)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>

            <h4>Quinto bloque</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="appendix5" placeholder="" value="{{ $fields->appendix5 or '' }}">
                    <label for="appendix">Volanta</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="title5" rows="2" placeholder="">{{ $fields->title5 or '' }}</textarea>
                    <label for="title">Título</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="subtitle5" rows="2" placeholder="">{{ $fields->subtitle5 or '' }}</textarea>
                    <label for="subtitle">Subtítulo</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" name="link5" class="field" value="{{$fields->link5 or ''}}" />
                    <label for="link5">Link</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input2 field" name="blank5" type="checkbox" {{ gg($fields->blank5)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>

        </div>
    </div>

    <h4>Fechas</h4>

    <div class="repeater">

        <div data-repeater-list="list">


            <div data-repeater-item style="display:none;">
                <div class="block block-themed">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Elemento</h3>
                        <div class="block-options">
                            <button data-repeater-delete type="button" class="btn-block-option">
                                <i class="fa fa-trash"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                        </div>
                    </div>
                    <div class="block-content">

                        <div class="form-group">
                            <div class="form-material">
                                <input type="text" class="form-control listfield" name="day" data-name="day" placeholder="" value="">
                                <label for="day">Día</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <input type="text" class="form-control listfield" name="date" data-name="date" placeholder="" value="">
                                <label for="date">Nro</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <input type="text" class="form-control listfield" name="name" data-name="name" placeholder="" value="">
                                <label for="name">Nombre</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <input type="hidden" name="link" class="listfield" data-name="link" value="" />
                                <label for="link">Link</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <div class="css-control css-control-info css-checkbox">
                                    <input class="css-control-input2 listfield" name="blank" data-name="blank" type="checkbox" value="1">
                                    <span class="css-control-indicator"></span> Abrir en pestaña nueva
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div> {{-- data-repeater-item  --}}


            @isset($fields->list)
            @foreach($fields->list as $i)

                <div data-repeater-item>
                    <div class="block">

                        <div class="block-header bg-gray">
                            <h3 class="block-title">Elemento</h3>
                            <div class="block-options">
                                <button data-repeater-delete type="button" class="btn-block-option">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>

                            </div>
                        </div>
                        <div class="block-content">

                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control listfield" name="day" data-name="day" placeholder="" value="{{$i->fields->day or ''}}">
                                    <label for="day">Día</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control listfield" name="date" data-name="date" placeholder="" value="{{$i->fields->date or ''}}">
                                    <label for="date">Nro</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control listfield" name="name" data-name="name" placeholder="" value="{{$i->fields->name or ''}}">
                                    <label for="name">Nombre</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <input type="hidden" name="link" class="listfield" data-name="link" value="{{$i->fields->link or ''}}" />
                                    <label for="link">Link</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <div class="css-control css-control-info css-checkbox">
                                        <input class="css-control-input2 listfield" name="blank" data-name="blank" type="checkbox" {{ gg($i->fields->blank)==1?'checked=""':'' }}  value="1">
                                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div> {{-- data-repeater-item  --}}

            @endforeach
            @endisset

            <div class="form-group">
               <button data-repeater-create type="button"  class="btn btn-secondary" data-original-title="Agregar"><i class="fa fa-plus"></i></button>
            </div>


        </div> {{-- data-repeater-list --}}
    </div> {{-- repeater --}}


    {{-- <h4>Banner Publicidad</h4>

    <div class="form-group">
        <div class="form-material">
            <input type="hidden" class="field" name="adimage1" data-name="adimage1" value="{{$fields->adimage1 or ''}}">
            <label for="adimage1">Imagen</label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-material">
            <input type="hidden" name="adlink1" class="field" value="{{$fields->adlink1 or ''}}" />
            <label for="adlink1">Link</label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-material">
            <div class="css-control css-control-info css-checkbox">
                <input class="css-control-input2 field" name="adblank1" type="checkbox" id="adblank1"  {{ gg($fields->adblank1)==1?'checked=""':'' }}  value="1">
                <span class="css-control-indicator"></span> Abrir en pestaña nueva
            </div>
        </div>
    </div> --}}



@endsection


@section('componentvalidations')

    <script type="text/javascript">

        component_rules = {
            'title': {
                required: true,
                minlength: 3
            },
            // 'slug': {
            //     required: true,
            //     pattern: /^[A-Za-z\d-.]+$/
            // },
            // 'layout': {
            //     required: true
            // }
        }

        component_messages = {
            'title': {
                required: 'Debe ingresar un título',
                minlength: 'El título debe tener al menos 3 caracteres'
            },
            // 'slug': {
            //     required: 'Debe ingresar un slug',
            //     pattern: 'El slug contiene caracteres inválidos'
            // },
            // 'layout': 'Debe seleccionar una plantilla'
        }

    </script>

@endsection


@section('componentjs')


<script type="text/javascript">

    $(document).ready(function() {

        $('input[data-name="image1"]').formImage({
            service: {
                url: '{{ route('service.uploader.image.upload') }}',
                archive: 'contents',
                validation: {
                    rules: [
                        {'image': 'max:102400|dimensions:min_width=100,min_height=100'}
                    ],
                    messages: [
                        {'image.image': 'El archivo seleccionado no es una imagen.'},
                        {'image.mimes': 'La imagen debe ser jpeg,png,jpg,gif o svg.'},
                        {'image.dimensions': 'La imagen debe tener al menos 100px de ancho X 100px de alto.'},
                        {'image.max': 'La imagen debe pesar 10MB como máximo.'}
                    ]
                }
            }
        });


        $('input[data-name="adimage1"]').formImage({
            service: {
                url: '{{ route('service.uploader.image.upload') }}',
                archive: 'contents',
                validation: {
                    rules: [
                        {'image': 'max:102400|dimensions:min_width=1000,min_height=90'}
                    ],
                    messages: [
                        {'image.image': 'El archivo seleccionado no es una imagen.'},
                        {'image.mimes': 'La imagen debe ser jpeg,png,jpg,gif o svg.'},
                        {'image.dimensions': 'La imagen debe tener al menos 1000px de ancho X 90px de alto.'},
                        {'image.max': 'La imagen debe pesar 10MB como máximo.'}
                    ]
                }
            }
        });

        $('input[name="adlink1"],.field[name="link"],input[name="link1"],input[name="link2"],input[name="link3"],input[name="link4"],input[name="link5"]').formLink({
            service: {
                search: '{{route('admin.folder.search')}}',
                getbyid: '{{route('admin.folder.getby.id')}}'
            }
        });




        $('.repeater').repeater({
            ready: function (item) {

                item.parent().sortable({
                    handle: '.block-header',
                });

                item.find('input[data-name="link"]').formLink({
                    service: {
                        search: '{{route('admin.folder.search')}}',
                        getbyid: '{{route('admin.folder.getby.id')}}'
                    }
                });

            },
            hide: function (el) {
                $(this).slideUp(el);
            }
        });


    });

</script>


@endsection
