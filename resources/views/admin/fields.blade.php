@extends('admin.master.app')

@section('content')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

            <h2 class="content-heading" data-toggle="appear">Encabezado y Pié de sitio</h2>
    
            <form class="form" action="{{route('admin.fields.save')}}" method="post">
                @csrf

                <div class="block">
                    <div class="block-header block-header-default">
                        <div class="block-title">
                            Encabezado
                        </div>                                   
                    </div>
                    <div class="block-content">

                        @foreach($sections['header'] as $field)
                        <div class="form-group">
                            <label for="{{$field->name}}">{{$field->description}}</label>
                            @if ($field->big)
                                <textarea class="form-control" name="{{$field->name}}" id="{{$field->name}}" data-html="{{$field->html}}" cols="30" rows="10">{{$field->content}}</textarea>
                            @else
                                <input type="text" class="form-control" name="{{$field->name}}" id="{{$field->name}}" value="{{$field->content}}">
                            @endif
                        </div>
                        @endforeach
                    
                    </div>
                </div>

                <div class="block">
                    <div class="block-header block-header-default">
                        <div class="block-title">
                            Pié
                        </div>                                   
                    </div>
                    <div class="block-content">
                            
                        @foreach($sections['footer'] as $field)
                        <div class="form-group">
                            <label for="{{$field->name}}">{{$field->description}}</label>
                            @if ($field->big)
                                <textarea class="form-control" name="{{$field->name}}" id="{{$field->name}}" data-html="{{$field->html}}" cols="30" rows="10">{{$field->content}}</textarea>
                            @else
                                <input type="text" class="form-control" name="{{$field->name}}" id="{{$field->name}}" value="{{$field->content}}">
                            @endif
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="row gutters-tiny invisible" data-toggle="appear">
                    <div class="col-9">
                         <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->


@endsection

@section('js')


<script type="text/javascript">

    $(document).ready(function() {



        $('textarea[data-html="1"]').summernote({
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
