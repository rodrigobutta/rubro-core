@if (sizeof($folder->publishedchildren) > 0 && $folder->depth < 1) {{-- reviso si el elemento tiene subs y si ademas es de los primeros niveles (por pedido del usuario) --}}
    <li class="header-nav__item js-header-nav-menu-link js-header-nav-submenu-link">
        <a href="{{$folder->getLink()["href"]}}" target="{{$folder->getLink()["target"]}}" class="header-nav__link ">
            <span class="header-nav__link__text">{{ $folder->name }}</span>
            <span class="header-nav__link__arrow"></span>
        </a>
        <div class="header-nav__submenu__wrapper js-header-nav-submenu-wrapper">
            <div class="header-nav__submenu__wrapper__child">
                <ul class="header-nav__submenu js-header-nav-submenu">
                    <li class="header-nav__item header-nav__item--title">
                        <a class="header-nav__link" href="{{$folder->getLink()["href"]}}" target="{{$folder->getLink()["target"]}}">
                            <span class="header-nav__link__text">{{ $folder->name }}</span>
                        </a>
                    </li>

                    {{-- @if(isset($folder->parent) && $folder->parent->parent_id == -1) --}}
                    @foreach($folder->publishedchildren as $folder)
                        @include('master.partials.folder-menu', $folder)
                    @endforeach
                    {{-- @endif --}}
                </ul>
            </div>
        </div>
    </li>
@else
    <li class="header-nav__item js-header-nav-menu-link">
        <a href="{{$folder->getLink()["href"]}}" target="{{$folder->getLink()["target"]}}" class="header-nav__link">
            <span class="header-nav__link__text">{{ $folder->name }}</span>
        </a>
    </li>
@endif