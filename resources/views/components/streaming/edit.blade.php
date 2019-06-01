@extends('admin.master.component.standard')

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')

    <div class="row justify-content-center">
        <div class="col-xl-6">


            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input2 field" name="visible" type="checkbox" id="visible"  {{ gg($fields->visible)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Visible
                    </div>
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
                    <input type="text" class="form-control field" name="label" placeholder=""  value="{{ $fields->label or '' }}">
                    <label for="label">Etiqueta</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="video" placeholder=""  value="{{ $fields->video or '' }}">
                    <label for="video">Youtube Video ID</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="cta" placeholder=""  value="{{ $fields->cta or '' }}">
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

            <div class="form-group">
                <div class="form-material">
                    <input type="text" name="subscribelink" class="form-control field" value="{{$fields->subscribelink or ''}}" />
                    <label for="subscribelink">Canal de Youtube</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input2 field" name="blank2" type="checkbox" id="blank2"  {{ gg($fields->blank2)==1?'checked=""':'' }}  value="1">
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

        $('input[name="link"]').formLink({
            service: {
                search: '{{route('admin.folder.search')}}',
                getbyid: '{{route('admin.folder.getby.id')}}'
            }
        });

    });

</script>


@endsection
