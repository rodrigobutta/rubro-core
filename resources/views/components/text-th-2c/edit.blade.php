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

            <h4>Primer Columna</h4>

            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="body" rows="5" placeholder="">{{ $fields->body or '' }}</textarea>
                    <label for="body">Cuerpo</label>
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
                        <input class="css-control-input22 field" name="blank" type="checkbox"  {{ gg($fields->blank)==1?'checked=""':'' }}  value="1">
                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                    </div>
                </div>
            </div>

            <h4>Segunda Columna</h4>

            <div class="form-group">
                <div class="form-material">
                    <textarea class="form-control field" name="body2" rows="5" placeholder="">{{ $fields->body2 or '' }}</textarea>
                    <label for="body2">Cuerpo</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="cta2" placeholder=""  value="{{ $fields->cta2 or '' }}">
                    <label for="cta2">Etiqueta del Link</label>
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
                        <input class="css-control-input22 field" name="blank2" type="checkbox"  {{ gg($fields->blank2)==1?'checked=""':'' }}  value="1">
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
            // 'title': {
            //     required: true,
            //     minlength: 3
            // },
            // 'slug': {
            //     required: true,
            //     pattern: /^[A-Za-z\d-.]+$/
            // },
            // 'layout': {
            //     required: true
            // }
        }

        component_messages = {
            // 'title': {
            //     required: 'Debe ingresar un título',
            //     minlength: 'El título debe tener al menos 3 caracteres'
            // },
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

        $('textarea[name="body"],textarea[name="body2"]').summernote({
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
            styleTags: ['p', 'blockquote', 'h2', 'h3'],
            //colors: [["#464646", "#4b3427"]]
        });

        $('input[name="link"],input[name="link2"]').formLink({
            service: {
                search: '{{route('admin.folder.search')}}',
                getbyid: '{{route('admin.folder.getby.id')}}'             
            }
        });

    });

</script>


@endsection