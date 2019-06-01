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
                                <input type="hidden" class="listfield" name="image" data-name="image" value="">
                                <label for="image">Imagen</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <input type="text" class="form-control listfield" name="name" data-name="name" placeholder="" value="">
                                <label for="name">Nombre</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <textarea class="form-control listfield" name="description" data-name="description" rows="2" placeholder=""></textarea>
                                <label for="description">Descripción</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <input type="text" class="form-control listfield" name="cta" data-name="cta" placeholder="" value="">
                                <label for="name">Etiqueta del Link</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <input type="hidden" name="link" class="listfield" data-name="link" value="" />                      
                                <label for="link">Link</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-material">
                                <div class="css-control css-control-info css-checkbox">
                                    <input class="css-control-input2 listfield" name="blank" data-name="blank" type="checkbox" value="1">
                                    <span class="css-control-indicator"></span> Abrir en pestaña nueva
                                </div>
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
                                    <input type="hidden" class="listfield" name="image" data-name="image" value="{{$i->fields->image or ''}}">
                                    <label for="image">Imagen</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control listfield" name="name" data-name="name" placeholder="" value="{{$i->fields->name or ''}}">
                                    <label for="name">Nombre</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <textarea class="form-control listfield" name="description" data-name="description" rows="2" placeholder="">{{ $i->fields->description or '' }}</textarea>
                                    <label for="description">Descripción</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control listfield" name="cta" data-name="cta" placeholder="" value="{{$i->fields->cta or ''}}">
                                    <label for="name">Etiqueta del Link</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <input type="hidden" name="link" class="listfield" data-name="link" value="{{$i->fields->link or ''}}" />                      
                                    <label for="link">Link</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <div class="css-control css-control-info css-checkbox">
                                        <input class="css-control-input2 listfield" name="blank" data-name="blank" type="checkbox" {{ gg($i->fields->blank)==1?'checked=""':'' }}  value="1">
                                        <span class="css-control-indicator"></span> Abrir en pestaña nueva
                                    </div>
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


                    item.find('input[data-name="image"]').formImage({
                        service: {
                            url: '{{ route('service.uploader.image.upload') }}',
                            archive: 'contents',
                            validation: {
                                rules: [
                                    {'image': 'max:102400|dimensions:min_width=50,min_height=50'}
                                ],
                                messages: [
                                    {'image.image': 'El archivo seleccionado no es una imagen.'},
                                    {'image.mimes': 'La imagen debe ser jpeg,png,jpg,gif o svg.'},
                                    {'image.dimensions': 'La imagen debe tener al menos 50px de ancho X 50px de alto.'},
                                    {'image.max': 'La imagen debe pesar 10MB como máximo.'}
                                ]
                            }
                        }
                    });


                    item.find('textarea[data-name="description"]').summernote({
                        lang: 'es-ES',
                        placeholder: '',
                        toolbar: [
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


                    item.find('input[data-name="link"]').formLink({
                        service: {
                            search: '{{route('admin.folder.search')}}',
                            getbyid: '{{route('admin.folder.getby.id')}}'             
                        }
                    });




                },
                hide: function (el) {
                    $(this).slideUp(el);
                }
            });


        });

    </script>

@endsection