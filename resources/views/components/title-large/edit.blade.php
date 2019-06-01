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
        </div>
    </div>

@endsection


@section('componentvalidations')

    <script type="text/javascript">

        component_rules = {
            'title': {
                required: true,
                minlength: 2
            }
        }

        component_messages = {
            'title': {
                required: 'Debe ingresar un título',
                minlength: 'El título debe tener al menos 2 caracteres'
            }
        }

    </script>

@endsection


@section('componentjs')

@endsection