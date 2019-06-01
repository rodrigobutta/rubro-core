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
                    <textarea class="form-control field" name="body" rows="5" placeholder="">{{ $fields->body or '' }}</textarea>
                    <label for="body">Cuerpo</label>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('componentvalidations')

    <script type="text/javascript">

        component_rules = {
            // 'title': {
            //     required: true,
            //     minlength: 2
            // }
        }

        component_messages = {
            // 'title': {
            //     required: 'Debe ingresar un título',
            //     minlength: 'El título debe tener al menos 2 caracteres'
            // }
        }

    </script>

@endsection


@section('componentjs')

    <script type="text/javascript">

        jQuery(function(){

            $('textarea[name="body"]').summernote({
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