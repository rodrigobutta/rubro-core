<div class="layout layout-sidebarded">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="holder holder-main" data-holder="main">@include('folder.print', ['holder' => 'main', 'action' => $action])</div>
            </div>
            <div class="col-md-6">
                <div class="holder holder-sidebar" data-holder="sidebar">@include('folder.print', ['holder' => 'sidebar', 'action' => $action])</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="margin-top: 25px;">
                <div class="holder holder-bottom" data-holder="bottom">@include('folder.print', ['holder' => 'bottom', 'action' => $action])</div>
            </div>
        </div>
    </div>

</div>
