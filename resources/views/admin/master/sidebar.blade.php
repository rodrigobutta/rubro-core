 <!-- Sidebar -->

    {{-- @php(var_dump($route)) --}}
<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            {{-- <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                        <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                    </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="/">
                            Sullair Forecast
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div> --}}
            <!-- END Side Header -->

            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
                <!-- Visible only in mini mode -->
                <div class="sidebar-mini-visible-b align-v animated fadeIn">
                    {{-- <img class="img-avatar img-avatar32" src="/images/tmp/avatars/avatar15.jpg" alt=""> --}}
                    <img class="logo" src="/images/logo2.svg" alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="sidebar-mini-hidden-b text-center">
                    <a class="img-link" href="/admin/">
                        {{-- <img class="img-avatar" src="/images/tmp/avatars/avatar15.jpg" alt=""> --}}
                        <img class="logo" src="/images/logo2.svg" alt="">
                    </a>
                    <ul class="list-inline mt-10">
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="be_pages_generic_profile.php">{{$auth->name}}</a>
                        </li>
                        {{-- @if($auth->hasProfile('admin'))
                        <li class="list-inline-item">                            
                            <a class="link-effect text-dual-primary-dark" href="{{ route('admin.user.edit') }}">
                                <i class="si si-user"></i>
                            </a>
                        </li>
                        @endif --}}
                        <li class="list-inline-item">                                
                            <a class="link-effect text-dual-primary-dark" href="{{ route('admin.user.password') }}">
                                <i class="si si-lock"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark" href="{{ route('logout') }}">
                                <i class="si si-logout"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

{{-- 
            <div class="block pull-t pull-r-l">
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <form action="be_pages_generic_search.php" method="post">
                        <div class="input-group">
                            <select class="js-select2" id="page_search" style="width: 100%;" data-placeholder="Buscar.." >
                                <option></option>
                            </select>                          
                        </div>
                    </form>
                </div>
            </div> --}}

            
            

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    {{-- <li>
                        <a class="{{in_array($route,['admin.home'])?'active':''}}" href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i><span class="sidebar-mini-hide">Inicio</span></a>
                    </li> --}}
                    <li>
                        <a class="{{in_array($route,['admin.simulation.list'])?'active':''}} {{in_array($route,['admin.simulation.edit'])?'active':''}} {{in_array($route,['admin.simulation.play'])?'active':''}}  " href="{{route('admin.simulation.list')}}"><i class="fa fa-play"></i><span class="sidebar-mini-hide">Simulaciones</span></a>
                    </li>

                    @if($auth->hasProfile('bases'))    

                    <li>
                        <a class="{{in_array($route,['admin.base.list'])?'active':''}} {{in_array($route,['admin.base.edit'])?'active':''}} {{in_array($route,['admin.base.data'])?'active':''}} {{in_array($route,['admin.base.table'])?'active':''}}  " href="{{route('admin.base.list')}}"><i class="fa fa-database"></i><span class="sidebar-mini-hide">Bases</span></a>
                    </li>

                    @endif

                    @if($auth->hasProfile('admin'))    
                    
                        <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Configuración</span></li>
                        <li>
                            <a class="{{in_array($route,['admin.business.list'])?'active':''}} {{in_array($route,['admin.business.edit'])?'active':''}}" href="{{route('admin.business.list')}}"><i class="fa fa-handshake-o"></i><span class="sidebar-mini-hide">Tipos de Negocio</span></a>
                        </li>
                        <li>
                            <a class="{{in_array($route,['admin.zone.list'])?'active':''}} {{in_array($route,['admin.zone.edit'])?'active':''}}" href="{{route('admin.zone.list')}}"><i class="fa fa-map"></i><span class="sidebar-mini-hide">Zonas</span></a>
                        </li>
                        <li>
                            <a class="{{in_array($route,['admin.family.list'])?'active':''}} {{in_array($route,['admin.family.edit'])?'active':''}}" href="{{route('admin.family.list')}}"><i class="fa fa-sitemap"></i><span class="sidebar-mini-hide">Familias de Producto</span></a>
                        </li>                        
                        <li>
                            <a class="{{in_array($route,['admin.company_size.list'])?'active':''}} {{in_array($route,['admin.company_size.edit'])?'active':''}}" href="{{route('admin.company_size.list')}}"><i class="fa fa-industry"></i><span class="sidebar-mini-hide">Tamaño de Empresa</span></a>
                        </li>                        
                        <li>
                            <a class="{{in_array($route,['admin.area.list'])?'active':''}} {{in_array($route,['admin.area.edit'])?'active':''}}" href="{{route('admin.area.list')}}"><i class="fa fa-truck"></i><span class="sidebar-mini-hide">Rubros</span></a>
                        </li>
                        <li>
                            <a class="{{in_array($route,['admin.scenario.list'])?'active':''}} {{in_array($route,['admin.scenario.edit'])?'active':''}}" href="{{route('admin.scenario.list')}}"><i class="fa fa-binoculars"></i><span class="sidebar-mini-hide">Escenarios</span></a>
                        </li>
                        <li>
                            <a class="{{in_array($route,['admin.segment.list'])?'active':''}} {{in_array($route,['admin.segment.edit'])?'active':''}}" href="{{route('admin.segment.list')}}"><i class="fa fa-tags"></i><span class="sidebar-mini-hide">Segmentos</span></a>
                        </li>
                        <li>
                            <a class="{{in_array($route,['admin.source.list'])?'active':''}} {{in_array($route,['admin.source.edit'])?'active':''}}" href="{{route('admin.source.list')}}"><i class="fa fa-table"></i><span class="sidebar-mini-hide">Tablas Fuente</span></a>
                        </li>
                        <li>
                            <a class="{{in_array($route,['admin.user.list'])?'active':''}} {{in_array($route,['admin.user.edit'])?'active':''}}" href="{{route('admin.user.list')}}"><i class="fa fa-user"></i><span class="sidebar-mini-hide">Usuarios</span></a>
                        </li>


                        {{-- <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Seguridad</span></li>
                        <li>                            
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-user"></i><span class="sidebar-mini-hide">Usuarios y Roles</span></a>
                            <ul>
                                <li>
                                    <a class="{{in_array($route,['admin.user.list'])?'active':''}} {{in_array($route,['admin.user.edit'])?'active':''}}" href="{{route('admin.user.list')}}"><span class="sidebar-mini-hide">Usuarios</span></a>
                                </li>
                                <li>
                                    <a href="#">Roles</a>
                                </li>                            
                            </ul>   
                        </li> --}}
                        
                    @endif



                    @if($auth->hasProfile('admin'))
                        <li>
                            <a class="{{in_array($route,['admin.folder.panel'])?'active':''}}" href="{{route('admin.folder.panel')}}"><i class="fa fa-cube"></i><span class="sidebar-mini-hide">Explorador</span></a>
                        </li>                  
                        <li>
                            <a class="{{in_array($route,['admin.calendar.index'])?'active':''}}" href="{{route('admin.calendar.index')}}"><i class="fa fa-calendar"></i><span class="sidebar-mini-hide">Eventos</span></a>
                        </li>
                        <li>
                            <a class="{{in_array($route,['admin.calendar_vencimientos.index'])?'active':''}}" href="{{route('admin.calendar_vencimientos.index')}}"><i class="fa fa-calendar"></i><span class="sidebar-mini-hide">Vencimientos</span></a>
                        </li>
                        <li>
                            <a class="{{in_array($route,['admin.campanias.index'])?'active':''}}" href="{{route('admin.campanias.index')}}"><i class="fa fa-window-restore"></i><span class="sidebar-mini-hide">Campañas</span></a>
                        </li>
                    @endif
                    
                    @if($auth->hasProfile('admin'))
                        <li>
                            <a class="{{in_array($route,['admin.fields.index'])?'active':''}}" href="{{route('admin.fields.index')}}"><i class="fa fa-cog"></i><span class="sidebar-mini-hide">Encabezado y Pié</span></a>
                        </li>
                        <li>
                            <a class="{{in_array($route,['admin.alert.list'])?'active':''}} {{in_array($route,['admin.alert.edit'])?'active':''}}" href="{{route('admin.alert.list')}}"><i class="fa fa-warning"></i><span class="sidebar-mini-hide">Alertas</span></a>
                        </li>
                        <li>
                            <a class="{{in_array($route,['admin.user.list'])?'active':''}} {{in_array($route,['admin.user.edit'])?'active':''}}" href="{{route('admin.user.list')}}"><i class="si si-users"></i><span class="sidebar-mini-hide">Usuarios</span></a>
                        </li>
                    @endif


                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->


