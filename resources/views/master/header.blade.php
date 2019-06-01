<div class="menu-overlay js-menu-overlay"></div>
<header class="main-header fixedHeader">

        <div class="main-header__search-nav visible-sm">
            <div class="container">
                <div class="main-header__subindex">
                    <a href="{{$header_item1_link}}" target="_self" class="main-header__link">¿Cómo funciona?</a>
                    <a href="{{$header_item2_link}}" target="_self" class="main-header__link">{{$header_item2_text}}</a>
                </div>

                <div class="main-header__social">
                    <a href="https://www.facebook.com/pages/Consejo-Profesional-de-Ciencias-Econ%C3%B3micas-CABA/120113161403761" target="_blank" class="main-header__link"><i class="icon icon-facebook"></i></a>
                    <a href="https://twitter.com/#!/ConsejoCABA" target="_blank" class="main-header__link"><i class="icon icon-twitter"></i></a>
                    <a href="https://www.youtube.com/channel/UClxcBE0D2idSr0Nzxp96MSw/playlists?view=1&flow=grid&sort=lad" target="_blank" class="main-header__link"><i class="icon icon-youtube"></i></a>
                    <a class="main-header__link" href="https://www.linkedin.com/company/consejo-profesional-de-ciencias-econ-micas-de-la-ciudad-aut-noma-de-buenos-aires/" target="_blank"><i class="icon icon-linkedin"></i></a>
                </div>

                <div id="sb-search" class="main-header__search sb-search" >
                    <form method="get" action="{{route('search_results')}}">
                        <p class="main-header__search--text sb-search-text">Buscar</p>
                        <input class="main-header__search--input sb-search-input" onkeyup="buttonUp();" placeholder="" onblur="monkey();" type="search" value="{{$q or ''}}" name="q" id="search">
                        <input class="main-header__search--submit sb-search-submit" type="submit">
                        <span class="main-header__search--icon sb-icon-search">
                        <svg id="search-icon" data-name="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M40,15A25,25,0,1,1,15,40,25,25,0,0,1,40,15Zm0-4A29,29,0,1,0,59,61.84L85.59,88.41a2.08,2.08,0,0,0,2.85,0,2.11,2.11,0,0,0,0-2.88L61.87,59A29,29,0,0,0,40,11Z"/></svg>
                        </span>
                    </form>
                </div>
            </div><!-- .container -->
        </div>

        <div class="main-header__primary-nav">
            <div class="container">

                <button class="header-nav-toggle js-header-nav-toggle d-none d-md-block">
                    <span class="header-nav-toggle__text">¿Qué estás buscando?</span>                    
                </button>

                <div class="header-nav-toggle header-nav-toggle--burger js-header-nav-toggle d-md-none">
                    <span class="header-nav-toggle__span"></span>
                    <span class="header-nav-toggle__span"></span>
                    <span class="header-nav-toggle__span"></span>
                </div>

                <nav class="header-nav js-header-nav">

                    <div class="header-nav__wrapper">

                        <div class="js-header-search header-nav__search__container">
                            <form method="get" action="{{route('search_results')}}" class="header-nav__search">
                                <div class="header-nav__search__wrapper">
                                    <input type="search" value="{{$q or ''}}" name="q" class="js-search-input header-nav__search__input" id="header-nav__search__input">
                                    <label for="header-nav__search__input" class="header-nav__search__placeholder">
                                        <span class="header-nav__search__placeholder__text">Buscar</span>
                                        <span class="header-nav__search__placeholder__icon"><i class="fas fa-search"></i></span>
                                    </label>
                                </div>
                                <button class="header-nav__search__button" type="submit" id="search"><i class="fas fa-search"></i></button>
                            </form>
                        </div>

                        @if (count($root_folders) > 0)
                            <ul class="header-nav__list">
                            @foreach ($root_folders as $folder)
                                @include('master.partials.folder-menu', $folder)
                            @endforeach
                            </ul>
                        @endif

                        <ul class="header-nav__list header-nav__list--border d-md-none">
                            <li class="header-nav__item">
                                <a class="header-nav__link header-nav__link--medium" href="{{$header_item3_link}}">
                                    <span class="header-nav__link__text">Registrate y conseguí clientes</span>
                                </a>
                            </li>
                            <li class="header-nav__item">
                                <a class="header-nav__link header-nav__link--medium" href="{{$header_item4_text}}">
                                    <span class="header-nav__link__text">Webmail</span>
                                </a>
                            </li>
                        </ul>

                        <ul class="header-nav__list header-nav__list--other-nav d-md-none">
                            <li class="header-nav__item">
                                <a class="header-nav__link header-nav__link--btn" href="{{$header_item1_link}}">
                                    <span class="header-nav__link__text">ss{{$header_item1_text}}</span>
                                </a>
                            </li>
                            <li class="header-nav__item">
                                <a class="header-nav__link header-nav__link--btn" href="{{$header_item2_text}}">
                                    <span class="header-nav__link__text">{{$header_item2_text}}</span>
                                </a>
                            </li>
                            <li class="header-nav__item header-nav__item--social">
                                <a class="header-nav__link" target="_blank" href="https://www.facebook.com/pages/Consejo-Profesional-de-Ciencias-Econ%C3%B3micas-CABA/120113161403761">
                                    <img src="/images/fb.svg" alt="Facebook" class="header-nav__link__icon">
                                </a>
                                <a class="header-nav__link" target="_blank" href="https://twitter.com/#!/ConsejoCABA">
                                    <img src="/images/tw.svg" alt="Twitter" class="header-nav__link__icon">
                                </a>
                                <a class="header-nav__link" target="_blank" href="https://www.youtube.com/channel/UClxcBE0D2idSr0Nzxp96MSw/playlists?view=1&flow=grid&sort=lad">
                                    <img src="/images/yt.svg" alt="YouTube" class="header-nav__link__icon">
                                </a>
                                <a class="header-nav__link" target="_blank" href="https://www.linkedin.com/company/consejo-profesional-de-ciencias-econ-micas-de-la-ciudad-aut-noma-de-buenos-aires/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                        </ul>

                    </div>

                </nav>

                <a href="/" class="main-header__logo-link">
                  <img class="main-header__logo visible-sm" src="../images/header-logo.png" alt="" />
                  <img class="main-header__logo hidden-sm" src="../images/header-logo_mobile.svg" alt=""/>
                </a>


                {{-- <button class="cta-register d-none d-md-block">
                    <span class="cta-register__text">Anotate</span>                    
                </button> --}}

                
                <nav class="main-header__account visible-sm">
                    <a href="{{$header_item3_link}}" target="_self" class="btn-nav">¿Querés trabajar? Registrate</a>
                    <a href="{{$header_item4_link}}" target="_self" class="btn-nav">{{$header_item4_text}}</a>
                </nav>

                <button class="js-header-search-btn main-header__search hidden-sm"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </header>

    <div class="overlay"></div>
