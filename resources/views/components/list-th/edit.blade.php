@extends('admin.master.component.standard', ['dynamics' => true])

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')


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
                                <textarea class="form-control listfield" name="name" data-name="name" rows="2" placeholder=""></textarea>
                                <label for="name">Nombre</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <textarea class="form-control listfield" name="description" data-name="description" rows="2" placeholder=""></textarea>
                                <label for="description">Descripción</label>
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
                                    <textarea class="form-control listfield" name="name" data-name="name" rows="2" placeholder="">{{ $i->fields->name or '' }}</textarea>
                                    <label for="name">Nombre</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <textarea class="form-control listfield" name="description" data-name="description" rows="2" placeholder="">{{ $i->fields->description or '' }}</textarea>
                                    <label for="description">Descripción</label>
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
        }

        component_messages = {
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

                    item.find('textarea[data-name="description"]').summernote({
                        lang: 'es-ES',
                        placeholder: '',
                        toolbar: [
                            ['insert', ['link', 'hr']],
                            ['para', ['style', 'ul', 'ol', 'paragraph']],
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            //['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['misc', ['undo', 'redo', 'codeview']],
                            // ['height', ['height']]
                        ],
                        styleTags: ['p']
                    });

                },
                hide: function (el) {
                    $(this).slideUp(el);
                }
            });


        });

    </script>

@endsection
