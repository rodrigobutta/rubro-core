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
                    <input class="form-control field" name="cta" placeholder="" value="{{ $fields->cta or '' }}" />
                    <label for="cta">Texto del Link</label>
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
