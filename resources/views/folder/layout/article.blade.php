<div class="layout layout-sidebarded">

    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="article-header">
                    {{-- <h3 class="article-header__subtitle">{{$item->parent->name}}</h3> --}}
                    {{-- <h2 class="article-header__title">{{$item->cover->title}}</h2> --}}
                    <div class="article-header__data">
                        <p class="article-header__date">{{$item->getCreatedDate()->formatLocalized('%d/%m/%Y')}}</p>
                        <div class="article-header__social">
                            <a class="article-header__social-icon" href="https://www.facebook.com/sharer/sharer.php?u={{$item->getLink()['href']}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a class="article-header__social-icon" href="https://twitter.com/home?status={{$item->getLink()['href']}}" target="_blank"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>

                <div class="holder holder-main" data-holder="main">@include('folder.print', ['holder' => 'main', 'action' => $action])</div>
            </div>
            <div class="col-md-4">
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
