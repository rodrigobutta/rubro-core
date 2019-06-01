@extends('admin.master.component.standard', ['dynamics' => true])

@section('componenthtml')

    <div class="row justify-content-center">
        <div class="col-xl-6">           
           
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="url" placeholder=""  value="{{ $fields->url or '' }}">
                    <label for="url">Url</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-material">
                    <input type="text" class="form-control field" name="height" placeholder=""  value="{{ $fields->height or '' }}">
                    <label for="height">Alto (px)</label>
                </div>
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


    <script type="text/javascript">


    </script>

@endsection