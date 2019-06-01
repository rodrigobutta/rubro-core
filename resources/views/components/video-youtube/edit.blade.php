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
                    <input type="text" class="form-control field" name="video" placeholder=""  value="{{ $fields->video or '' }}">
                    <label for="video">Video ID</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input2 field" name="autoplay" type="checkbox"  {{ gg($fields->autoplay)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Reproducir de forma automática
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input2 field" name="nocontrols" type="checkbox"  {{ gg($fields->nocontrols)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Esconder controles
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input2 field" name="loop" type="checkbox"  {{ gg($fields->loop)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Reproducir de forma indefinida
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

       
    });

</script>

@endsection
