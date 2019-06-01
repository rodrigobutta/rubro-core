@extends('admin.master.component.standard', ['dynamics' => true])

@section('componenthtml')

    <div class="row justify-content-center">
        <div class="col-xl-12">

            <div class="code-container">
                <input type="hidden" name="html" class="field" value="{{ $fields->html or '' }}" />            
                <textarea id="html" class="field">{{ $fields->html or '' }}</textarea>

                
            </div>

        </div>
    </div>


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


    <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/codemirror.js" ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/xml/xml.js" ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/css/css.js" ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/javascript/javascript.js" ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/htmlmixed/htmlmixed.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.39.2/codemirror.min.css" />

    <script type="text/javascript">

        $(document).ready(function() {
      
            var htmlEditor = CodeMirror.fromTextArea(document.getElementById("html"), {
                lineNumbers: true,
                mode: 'htmlmixed'
            });

            htmlEditor.on("change", function(){
                var val = htmlEditor.getValue();  
                $('input[name="html"]').val(val);
            });
            
        });

    </script>

@endsection