@extends('admin.master.component.standard')

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')

    <div class="row justify-content-center">
        <div class="col-xl-6">

            <div class="form-group">
                <div class="form-material">
                    <div class="css-control css-control-info css-checkbox">
                        <input class="css-control-input2 field" name="margins" type="checkbox" {{ gg($fields->margins)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Agregar márgenes
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('componentvalidations')

    <script type="text/javascript">

    </script>

@endsection


@section('componentjs')

@endsection
