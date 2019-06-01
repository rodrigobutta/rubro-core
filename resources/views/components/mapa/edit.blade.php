@extends('admin.master.component.standard')

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')

    <div class="row justify-content-center">
        <div class="col-xl-6">

            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="title" rows="2" placeholder="">{{ $fields->title or '' }}</textarea>
                    <label for="title">Título</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="description" rows="2" placeholder="">{{ $fields->description or '' }}</textarea>
                    <label for="description">Descripción</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="lat" placeholder="lat por ej -34.5974168"  value="{{ $fields->lat or '' }}">
                    <label for="lat">Latitud</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="lng" placeholder="lng por ej -58.5117254"  value="{{ $fields->lng or '' }}">
                    <label for="lng">Longitud</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="zoom" placeholder="zoom por ej 15"  value="{{ $fields->zoom or '' }}">
                    <label for="zoom">Zoom</label>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('componentvalidations')

    <script type="text/javascript">

        component_rules = {
            'lat': {
                required: true,
                minlength: 5
            },
            'lng': {
                required: true,
                minlength: 5
            }
            // 'slug': {
            //     required: true,
            //     pattern: /^[A-Za-z\d-.]+$/
            // },
            // 'layout': {
            //     required: true
            // }
        }

        component_messages = {
            'lat': {
                required: 'Debe ingresar la latitud',
                minlength: 'El formato de latitud parece inválido.'
            },
            'lng': {
                required: 'Debe ingresar la longitud',
                minlength: 'El formato de longitud parece inválido.'
            }
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