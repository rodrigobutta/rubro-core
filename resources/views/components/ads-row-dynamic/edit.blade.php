@extends('admin.master.component.standard', ['dynamics' => true])

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')

    <div class="form-group">
        <div class="form-material">
            <div class="css-control css-control-info css-checkbox">
                <input class="css-control-input2 field" name="home" type="checkbox" id="home"  {{ gg($fields->home)==1?'checked=""':'' }}  value="1">
                <span class="css-control-indicator"></span> Ubicado en la Home
            </div>
        </div>
    </div>

    <div class="repeater">

        <div data-repeater-list="list">


            <div data-repeater-item style="display:none;">
                <div class="block block-themed">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Espacio</h3>
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
                                <input type="text" class="form-control listfield" name="name" data-name="name" placeholder=""/>
                                <label for="name">Nombre</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-material">
                                <input type="text" class="form-control listfield" name="name_analytics" data-name="name_analytics" placeholder=""/>
                                <label for="name">Nombre Analytics</label>
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
                            <h3 class="block-title">Espacio</h3>
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
                                    <input type="text" class="form-control listfield" name="name" data-name="name" value="{{ $i->fields->name or '' }}"/>
                                    <label for="name">Nombre</label>
                                    <input type="hidden" class="form-control listfield" name="uuid" data-name="uuid" value="{{ $i->fields->uuid or '' }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-material">
                                    <input type="text" class="form-control listfield" name="name_analytics" data-name="name_analytics" value="{{ $i->fields->name_analytics or '' }}"/>
                                    <label for="name">Nombre Analytics</label>
                                    <input type="hidden" class="form-control listfield" name="uuid" data-name="uuid" value="{{ $i->fields->uuid or '' }}"/>
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
            'name': {
                required: true,
                minlength: 3
            }
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
            'name': {
                required: 'Debe ingresar un nombre al espacio',
                minlength: 'El nombre debe tener al menos 3 caracteres'
            }
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

                },
                hide: function (el) {
                    $(this).slideUp(el);
                }
            });


        });

    </script>

@endsection