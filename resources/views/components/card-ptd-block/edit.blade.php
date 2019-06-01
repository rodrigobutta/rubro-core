@extends('admin.master.component.standard')

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')

    <div class="row justify-content-center">
        <div class="col-xl-6">

            <h4>Primer bloque</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" class="field" name="image" data-name="image" value="{{$fields->image or ''}}">
                    <label for="image">Imagen</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="title" rows="2" placeholder="">{{ $fields->title or '' }}</textarea>
                    <label for="title">Título</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="subtitle" rows="2" placeholder="">{{ $fields->subtitle or '' }}</textarea>
                    <label for="subtitle">Subtítulo</label>
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

            <h4>Segundo bloque</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" class="field" name="image2" data-name="image2" value="{{$fields->image2 or ''}}">
                    <label for="image">Imagen</label>
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
                        <input class="css-control-input2 field" name="blank2" type="checkbox" {{ gg($fields->blank2)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>

            <h4>Tercer bloque</h4>

            <div class="form-group">
                <div class="form-material">
                    <input type="hidden" class="field" name="image3" data-name="image3" value="{{$fields->image3 or ''}}">
                    <label for="image">Imagen</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="title3" rows="2" placeholder="">{{ $fields->title3 or '' }}</textarea>
                    <label for="title">Título</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="subtitle3" rows="2" placeholder="">{{ $fields->subtitle3 or '' }}</textarea>
                    <label for="subtitle">Subtítulo</label>
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
                        <input class="css-control-input2 field" name="blank3" type="checkbox" {{ gg($fields->blank3)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('componentvalidations')

    <script type="text/javascript">

        component_rules = {
            'title': {
                required: true,
                minlength: 3
            },
        }

        component_messages = {
            'title': {
                required: 'Debe ingresar un título',
                minlength: 'El título debe tener al menos 3 caracteres'
            },
        }

    </script>

@endsection


@section('componentjs')


<script type="text/javascript">

    $(document).ready(function() {

        $('input[data-name="image"], input[data-name="image2"], input[data-name="image3"]').formImage({
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

        $('input[name="link"], input[name="link2"], input[name="link3"]').formLink({
            service: {
                search: '{{route('admin.folder.search')}}',
                getbyid: '{{route('admin.folder.getby.id')}}'
            }
        });

    });

</script>


@endsection
