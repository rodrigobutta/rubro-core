<div class="layout layout-sidebarded">

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="holder holder-main" data-holder="main">@include('folder.print', ['holder' => 'main', 'action' => $action])</div>
            </div>
            <div class="col-md-4">
                <div class="js-sticky holder holder-sidebar" data-holder="sidebar">@include('folder.print', ['holder' => 'sidebar', 'action' => $action])</div>
            </div>
        </div>
    </div>

</div>

<script>

    @if(!$isEditing)
        $('.js-sticky').stick_in_parent({
            offset_top: 100
        });
    @endif

</script>
