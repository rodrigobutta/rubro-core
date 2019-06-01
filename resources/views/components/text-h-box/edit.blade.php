@extends('admin.master.component.standard')

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')

    <div class="row justify-content-center">
        <div class="col-xl-6">

            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="description" rows="5" placeholder="">{{ $fields->description or '' }}</textarea>
                    <label for="description">Cuerpo</label>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('componentvalidations')

    <script type="text/javascript">

        component_rules = {
            'description': {
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
            'description': {
                required: 'Debe ingresar una descripción',
                minlength: 'La descripción debe tener al menos 3 caracteres'
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

        $('textarea[name="description"]').summernote({
            lang: 'es-ES',
            placeholder: '',
            toolbar: [
                ['insert', ['link', 'table', 'hr']],
                ['para', ['style', 'ul', 'ol', 'paragraph']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                //['fontsize', ['fontsize']],
                ['color', ['color']],
                ['misc', ['undo', 'redo', 'codeview']],
                // ['height', ['height']]
            ],
            styleTags: ['p', 'blockquote', 'h2'],
            //colors: [["#464646", "#4b3427"]]
        });

    });

</script>


@endsection
