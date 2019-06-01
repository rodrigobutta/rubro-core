@extends('admin.master.component.standard', ['dynamics' => true])

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')

    <div class="form-group">
        <div class="form-material">
            <textarea class="form-control field" name="title" rows="2" placeholder="">{{ $fields->title or '' }}</textarea>
            <label for="title">Título</label>
        </div>
    </div>

    <h4>Botón de Link</h4>

    <div class="form-group">
        <div class="form-material">
            <input type="text" class="form-control field" name="cta" placeholder="" value="{{ $fields->cta or '' }}">
            <label for="cta">Etiqueta del botón</label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-material">
            <input type="hidden" name="link" class="field main-link" value="{{$fields->link or ''}}" />
            <label for="link">Link del botón</label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-material">
            <div class="css-control css-control-info css-checkbox">
                <input class="css-control-input field" name="blank" type="checkbox" id="blank"  {{ gg($fields->blank)==1?'checked=""':'' }}  value="1">
                <span class="css-control-indicator"></span> Abrir en pestaña nueva
            </div>
        </div>
    </div>

    <h4>Botón de Descarga</h4>

    <div class="form-group">
        <div class="form-material">
            <input type="text" class="form-control field" name="cta2" placeholder="" value="{{ $fields->cta2 or '' }}">
            <label for="cta2">Etiqueta del botón</label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-material">
            <input type="hidden" class="field" name="attach" value="{{$fields->attach or ''}}">
            <label for="attach">Archivo</label>
        </div>
    </div>


    <h4>Listado de detalles</h4>

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
                                <label for="image">Icono</label>
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
                                <label for="body">Descripción</label>
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
                                   <label for="image">Icono</label>
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
                                    <label for="body">Descripción</label>
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


    <h4>Selector</h4>

    <div class="repeater">

        <div data-repeater-list="list2">


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
                                <input type="text" class="form-control listfield" name="name" data-name="name" placeholder="" value="">
                                <label for="name">Nombre</label>
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


            @isset($fields->list2)
            @foreach($fields->list2 as $i)

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
                                    <input type="text" class="form-control listfield" name="name" data-name="name" placeholder="" value="{{$i->fields->name or ''}}">
                                    <label for="name">Nombre</label>
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
        }

        component_messages = {
        }

    </script>

@endsection


@section('componentjs')


    <script type="text/javascript">

        $(document).ready(function() {


            $('input[name="link"].main-link').formLink({
                service: {
                    search: '{{route('admin.folder.search')}}',
                    getbyid: '{{route('admin.folder.getby.id')}}'
                }
            });


            $('input[name="attach"]').formFile({
                service: {
                    url: "{{ route('service.uploader.file.upload') }}",
                    archive: 'attachments',
                    validation: {
                        rules: [
                            {'file': 'max:102400'}
                        ],
                        messages: [
                            {'file.max': 'El archivo pesa mas de lo permitido (10MB).'}
                        ]
                    }
                }
            });


            $('.repeater').repeater({
                ready: function (item) {

                    item.parent().sortable({
                        handle: '.block-header',
                    });

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

                    console.log('assdadas')

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
