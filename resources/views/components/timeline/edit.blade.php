@extends('admin.master.component.standard', ['dynamics' => true])

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')

    <div class="form-group">
        <div class="form-material">
            <textarea class="form-control field" name="day" rows="2" placeholder="">{{ $fields->day or '' }}</textarea>
            <label for="day">Fecha</label>
        </div>
    </div>

    <div class="repeater">

        <div data-repeater-list="list">


            <div data-repeater-item style="display:none;">
                <div class="block block-themed">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Elemento</h3>
                        <div class="block-options">
                            <button data-repeater-delete type="button" class="btn-block-option">
                                <i class="fa fa-trash"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                        </div>
                    </div>
                    <div class="block-content">

                        <div class="form-group">
                            <div class="form-material">
                                <input type="text" class="form-control listfield" name="hour" data-name="hour" placeholder="" value="">
                                <label for="hour">Hora</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <textarea class="form-control listfield" name="title" data-name="title" rows="2" placeholder=""></textarea>
                                <label for="title">Título</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <textarea class="form-control listfield" name="body" data-name="body" rows="2" placeholder=""></textarea>
                                <label for="body">Cuerpo</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div> {{-- data-repeater-item  --}}


            @isset($fields->list)
            @foreach($fields->list as $i)

                <div data-repeater-item>
                    <div class="block">

                        <div class="block-header bg-gray">
                            <h3 class="block-title">Elemento</h3>
                            <div class="block-options">
                                <button data-repeater-delete type="button" class="btn-block-option">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>

                            </div>
                        </div>
                        <div class="block-content">

                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control listfield" name="hour" data-name="hour" placeholder="" value="{{$i->fields->hour or ''}}">
                                    <label for="hour">Hora</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <textarea class="form-control listfield" name="title" data-name="title" rows="2" placeholder="">{{ $i->fields->title or '' }}</textarea>
                                    <label for="title">Título</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <textarea class="form-control listfield" name="body" data-name="body" rows="2" placeholder="">{{ $i->fields->body or '' }}</textarea>
                                    <label for="body">Cuerpo</label>
                                </div>
                            </div>

                        </div>
                    </div>

                </div> {{-- data-repeater-item  --}}

            @endforeach
            @endisset

            <div class="form-group">
               <button data-repeater-create type="button"  class="btn btn-secondary" data-original-title="Agregar"><i class="fa fa-plus"></i></button>
            </div>


        </div> {{-- data-repeater-list --}}
    </div> {{-- repeater --}}


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


            $('.repeater').repeater({
                ready: function (item) {

                    item.parent().sortable({
                        handle: '.block-header',
                    });
{{--
                    item.find('textarea[name="body"]').summernote({
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
                    }); --}}

                     item.find('textarea[name="title"]').summernote({
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


                },
                hide: function (el) {
                    $(this).slideUp(el);
                }
            });


        });

    </script>

@endsection
