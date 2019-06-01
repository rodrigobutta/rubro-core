@extends('admin.master.component.standard')

{{-- CREAMOS UN PARENT COMPONENT CON SUPERESTRUCTURA Y VARIABLE DE PLAIN PARA CASOS EXTREMOS? --}}
@section('componenthtml')

        <div class="row justify-content-center">
            <div class="block-content">

                <div class="form-group">
                    <div class="form-material">
                        <textarea class="form-control field" name="name" data-name="name" rows="2" placeholder="">{{$fields->name or ''}}</textarea>
                        <label for="name">Nombre</label>
                    </div>
                </div>

                <h4>Destino de Link (URL)</h4>
                <div class="form-group">
                    <div class="form-material">
                        <input type="hidden" name="link" class="field" value="" />
                        <label for="link">Link</label>
                    </div>
                </div>

                <h4>Destino de descarga (Adjunto)</h4>
                <div class="form-group">
                    <div class="form-material">
                        <input type="hidden" class="field" name="attach" data-name="attach" value="">
                        <label for="attach">Archivo</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-material">
                        <div class="css-control css-control-info css-checkbox">
                            <input class="css-control-input2 field" name="blank" type="checkbox" value="1">
                            <span class="css-control-indicator"></span> Abrir en pestaña nueva
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

<script type="text/javascript">

    $(document).ready(function() {

        $('input[name="attach"]').formFile({
            service: {
                url: "{{ route('service.uploader.file.upload') }}",
                archive: 'attachments',
                validation: {
                    rules: [
                        // {'file': 'max:51200'}
                    ],
                    messages: [
                        // {'file.max': 'El archivo pesa mas de lo permitido (50MB).'}
                    ]
                }
            }
        });

        $('input[name="link"]').formLink({
            service: {
                search: '{{route('admin.folder.search')}}',
                getbyid: '{{route('admin.folder.getby.id')}}'
            }
        });

    });

</script>

@endsection
