@extends('admin.master.app')

@section('bodyclass', 'folder-panel-page')


@section('topbar')

@endsection


@section('content')

    {{-- @include('admin.master.floatbar') --}}

    

    <!-- Main Container -->
    <main id="main-container">
            <!-- Page Content -->
        <div class="content">

            <h2 class="content-heading">
                
                @if (session('folder_cut'))       
                    @if($item)       
                        <a href="{{ route('admin.folder.cut.paste',['id'=>$item->id]) }}" class="btn btn-rounded btn-primary float-right" style="margin-left:10px;"><i class="fa fa-paste"></i>&nbsp;Pegar {{ str_limit(session('folder_cut')->name, 20, '..') }}</a>                                        
                    @else
                        <a href="{{ route('admin.folder.cut.paste',['id'=>0]) }}" class="btn btn-rounded btn-primary float-right" style="margin-left:10px;"><i class="fa fa-paste"></i>&nbsp;Pegar {{ str_limit(session('folder_cut')->name, 20, '..') }}</a>                                        
                    @endif                
                @endif

                <button type="button" class="btn btn-rounded btn-primary d-md-none float-right ml-5" data-toggle="class-toggle" data-target=".js-inbox-nav" data-class="d-none d-md-block">Menu</button>                                
                
                @if($item)                        

                
                    @if($item->canHandle())
                        {{-- <button type="button" class="btn btn-rounded btn-success float-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i>&nbsp;Crear subpágina </button>                                                 --}}
                        @if($item->id>1)
                            <a href="{{ route('admin.folder.delete',['id'=>$item->id]) }}" class="btn btn-rounded btn-secondary float-right" style="margin-right:10px;"><i class="fa fa-trash"></i>&nbsp;Eliminar Página</a>                                        
                        @endif
                        <a href="{{ route('admin.folder.compose',['id'=>$item->id]) }}" class="btn btn-rounded btn-secondary float-right" style="margin-right:10px;"><i class="fa fa-edit"></i>&nbsp;Editar Contenidos</a>                                        
                        
                    @endif

                    @if($item->hasContents())
                        <a href="{{$item->getLink()['href']}}" target="_blank" class="btn btn-rounded btn-secondary float-right" style="margin-right:10px;"><i class="fa fa-eye"></i>&nbsp;Vista Pública</a>
                    @endif

                    <a href="{{ route('admin.folder.panel') }}" style="color:#6c757d ">{{env('APP_NAME')}}</a> / 
                    @foreach($item->breadcrumb() as $b)
                        <a href="{{ route('admin.folder.panel',['id'=>$b->id]) }}" style="color:#6c757d ">{{$b->name}}</a> / 
                    @endforeach                    
                    <strong>{{$item->name}}</strong>

                @else
                    {{env('APP_NAME')}}
                    @if($user->hasProfile('admin'))
                        <button type="button" class="btn btn-rounded btn-success float-right" data-toggle="modal" data-target="#modal-add">Nueva</button>                                                
                    @endif
                @endif
                
            </h2>
            <div class="row">
                <div class="col-md-5 col-xl-3">


                    @if($item)
                    
                        <!-- Collapsible Inbox Navigation -->
                        <div class="js-inbox-nav d-none d-md-block">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    {{-- <h3 class="block-title">Carpetas</h3> --}}
                                    {{-- <div class="block-options">
                                        <div class="dropdown">
                                            <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-fw fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0)">
                                                    <i class="fa fa-fw fa-flask mr-5"></i>Filter
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="javascript:void(0)">
                                                    <i class="fa fa-fw fa-cogs mr-5"></i>Manage
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="block-content">

                                    @if($item->canHandle())
                                        <a href="{{ route('admin.folder.compose',['id'=>$item->id]) }}" >
                                            <img src="{{$item->getScreenshot()}}" style="width:100%"/>                                                  
                                        </a>
                                    @else
                                        <img src="{{$item->getScreenshot()}}" style="width:100%"/>
                                    @endif     
                                    
                                </div>
                            </div>
                        </div>
                        <!-- END Collapsible Inbox Navigation -->
                    
                    @endif


                    @if($subfolders->count()==0)
                        
                        {{-- <div class="alert alert-primary alert-dismissable" role="alert">
                            <h3 class="alert-heading font-size-h4 font-w400">Carpetas</h3>
                            <p class="mb-0">Esta página no contiene subcarpetas. Se considera Carpeta a cualquier página que contenga al menos otra página.</p>
                        </div> --}}
                        
                    @else

                        <!-- Collapsible Inbox Navigation -->
                        <div class="js-inbox-nav d-none d-md-block">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Subcarpetas</h3>
                                    {{-- <div class="block-options">
                                        <div class="dropdown">
                                            <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-fw fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0)">
                                                    <i class="fa fa-fw fa-flask mr-5"></i>Filter
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="javascript:void(0)">
                                                    <i class="fa fa-fw fa-cogs mr-5"></i>Manage
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="block-content">
                                    <ul class="nav nav-pills flex-column push">

                                        @foreach ($subfolders as $i)
                                        
                                            <li class="nav-item">
                                                <a class="nav-link d-flex align-items-center justify-content-between active2" href="{{ route('admin.folder.panel',['id'=>$i->id]) }}" style="padding-left: 0;" rel="popover"  data-img="{{$i->getScreenshot()}}">                                                    
                                                    <span>
                                                        <i class="si si-folder mr-5"></i>&nbsp;{{$i->name}}                                                        
                                                    </span>
                                                    <span class="badge badge-pill badge-primary">{{$i->getFullChildrenCount()}}</span>
                                                </a>
                                            </li>
                                            
                                        @endforeach
                                                                    
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- END Collapsible Inbox Navigation -->
                    
                    @endif
                    
                    <!-- Collapsible Inbox Navigation -->
                    <div class="js-inbox-nav d-none d-md-block">
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Recientes</h3>                               
                            </div>
                            <div class="block-content">
                                <ul class="nav nav-pills flex-column push">

                                    @foreach ($recent as $i)

                                        @if($i->canHandle())
                                        <li class="nav-item">
                                            <a class="nav-link2 d-flex align-items-center justify-content-between active2" href="{{ route('admin.folder.compose',['id'=>$i->id]) }}">
                                                <span><i class="fa fa-history mr-5"></i> {{$i->name}}</span>                                                
                                            </a>
                                        </li>
                                        @endif

                                    @endforeach
                                                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END Collapsible Inbox Navigation -->

                    @if(sizeof($users)>0)
                    <!-- Recent Contacts -->
                    <div class="block d-none d-md-block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Usuarios habilitados</h3>
                            {{-- <div class="block-options">
                                <div class="dropdown">
                                    <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-fw fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item active" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-users mr-5"></i> All
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-circle text-success mr-5"></i> Online
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-circle text-danger mr-5"></i> Busy
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-circle text-warning mr-5"></i> Away
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-circle text-muted mr-5"></i> Offline
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-cogs mr-5"></i>Manage
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="block-content block-content-full">
                            <ul class="nav-users">

                                @foreach($users as $u)
                                    @if(!$u->hasProfile('admin'))
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img class="img-avatar" src="/images/avatar.jpg" alt="">
                                            {{-- {!! $u->hasProfile('admin')?'<i class="fa fa-circle text-primary"></i>':'' !!} --}}
                                            {{$u->name}}
                                        <div class="font-w400 font-size-xs text-muted"><i class="fa fa-location-arrow"></i> {{$u->commaProfiles()}}</div>
                                        </a>
                                    </li>
                                    @endif
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    <!-- END Recent Contacts -->
                    @endif

                </div>
                <div class="col-md-7 col-xl-9">

                    <!--{{ $items->appends(request()->except('page'))->links() }}-->

                    {{-- @if($items->count()==0)
                        
                        @if($subfolders->count()==0)

                            <div class="alert alert-primary alert-dismissable" role="alert">
                                <h3 class="alert-heading font-size-h4 font-w400">Páginas</h3>
                                <p class="mb-0">Esta página no contiene paginas ni carpetas.
                                    @if($item && $item->canHandle())
                                        <br>Posiblemente quieras <a class="btn-edit" href="{{ route('admin.folder.compose',['id'=>$item->id]) }}"><strong>editar su contenido</strong></a>,<br>o bien, <a class="btn-edit" href="#" data-toggle="modal" data-target="#modal-add">crear una subpagina</a>
                                    @endif                                    
                                </p>                                
                            </div>

                        @else

                            <div class="alert alert-primary alert-dismissable" role="alert">
                                <h3 class="alert-heading font-size-h4 font-w400">Páginas</h3>
                                <p class="mb-0">Esta página no contiene paginas, aunque si carpetas. Puede tratarse de una carpeta con subcarpetas o de una página de descanso
                                    @if($item && $item->canHandle())
                                        en donde podrías llegar a necesitar <a class="btn-edit" href="{{ route('admin.folder.compose',['id'=>$item->id]) }}"><strong>editar su contenido</strong></a>
                                    @endif
                                    .
                                </p>                                
                            </div>

                        @endif

                    @else --}}

                        <!-- Message List -->
                        <div class="block">
                            <div class="block-header block-header-default">

                            
                                <div class="block-title">
                                    @if($items->total()>0)
                                        Páginas&nbsp;<strong>{{$items->firstItem()}} a {{$items->lastItem()}}</strong> de <strong>{{$items->total()}}</strong>                                    
                                    @else
                                        Sin subpáginas
                                    @endif                                    
                                </div>
                                
                                <div class="block-options">
                                    <div class="dropdown">
                                        <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-fw fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">                                                                                      
                                            @for ($i = 10; $i <= 210; $i=$i+50)
                                                <a class="dropdown-item {{$ipp==$i?'active':''}}" href="{{Request::fullUrlWithQuery(['ipp' => $i])}}">
                                                    {{$i}}
                                                </a>        
                                            @endfor                                                                                   
                                        </div>
                                    </div>                                    
                                    <a href="{{$items->previousPageUrl()}}" class="btn-block-option {{$items->onFirstPage()?'hidden':''}}">
                                        <i class="si si-arrow-left"></i>
                                    </a>
                                    <a href="{{$items->nextPageUrl()}}" class="btn-block-option {{!$items->hasMorePages()?'hidden':''}}">
                                        <i class="si si-arrow-right"></i>
                                    </a>
                                    <a href="javascript:location.reload();" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </a>
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                    
                                </div>                                 
                            </div>
                            <div class="block-content">
                                <!-- Messages Options -->
                                <div class="push">

                                    @if(Request::has('published') || Request::has('pinned') || Request::has('fullchildren'))
                                        <a href="{{Request::url() . '?ipp=' . $ipp }}" class="btn btn-rounded btn-alt-secondary float-right">
                                            <i class="fa fa-times text-danger mx-5"></i>
                                            <span class="d-none d-sm-inline"> Limpiar Filtros</span>
                                        </a> 
                                    @endif

                                    @if($item)
                                        @if(isset($item->parent_id) && $item->parent_id != 0 && $item->parent_id != -1)
                                            <a href="{{ route('admin.folder.panel',['id'=>$item->parent_id]) }}" class="btn btn-rounded btn-alt-warning">
                                                <i class="fa fa-mail-reply mx-5"></i>                                   
                                            </a>
                                        @else 
                                            <a href="{{ route('admin.folder.panel') }}" class="btn btn-rounded btn-alt-warning">
                                                <i class="fa fa-mail-reply mx-5"></i>                                   
                                            </a>
                                        @endif
                                    @endif

                                    @if($items->total()>0)
                                        <a href="{{Request::fullUrlWithQuery(['published' => '1'])}}" class="btn btn-rounded btn-alt-secondary {!!Request::get('published')=='1'?'active':''!!}">
                                            <i class="fa fa-eye mx-5"></i>
                                            <span class="d-none d-sm-inline"> Sólo Visibles</span>
                                        </a>
                                        <a href="{{Request::fullUrlWithQuery(['pinned' => '1'])}}" class="btn btn-rounded btn-alt-secondary {!!Request::get('pinned')=='1'?'active':''!!}">
                                            <i class="fa fa-star mx-5"></i>
                                            <span class="d-none d-sm-inline"> Sólo Destacadas</span>
                                        </a>
                                        <a href="{{Request::fullUrlWithQuery(['fullchildren' => '1'])}}" class="btn btn-rounded btn-alt-secondary {!!Request::get('fullchildren')=='1'?'active':''!!}">
                                            <i class="fa fa-sitemap mx-5"></i>
                                            <span class="d-none d-sm-inline"> Toda la familia</span>
                                        </a>                      
                                    @endif              

                                    @if($item)
                                        @if($item->canHandle())
                                            <button type="button" class="btn btn-rounded btn-success float-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i></button>                                                                                     
                                        @endif
                                    @endif


                                    

                                </div>
                                <!-- END Messages Options -->

                                <!-- Messages -->
                                <!-- Checkable Table (.js-table-checkable class is initialized in Codebase() -> uiHelperTableToolsCheckable()) -->
                                <table class="table table-hover22 table-vtop">
                                    
                                    <head>
                                        <tr>
                                            <th>Vista en<br>Miniatura</th>
                                            <th>Nombre</th>
                                            <th data-toggle="tooltip" data-placement="top" title="" data-original-title="La página se encuentra situada fuera del scope de páginas del sitio, por ende, al intentar ser accedida desde el lugar que corresponda, el browser va a redirigir a la página destino.">Página Externa</th>                                                                                        
                                            <th data-toggle="tooltip" data-placement="top" title="" data-original-title="La página tiene subpaginas, esto significa que todas sus subpaginas van a aparece en la URL luego de esta página, o bien, que si esta página es seleccionada para mostrar sus subpáginas en por otro compoennte, la misma va a hacer de carpeta.">Tiene<br>Subpáginas</th>
                                            <th data-toggle="tooltip" data-placement="top" title="" data-original-title="La página tiene contenidos para mostrar por si misma.">Tiene<br>Contenidos</th>
                                            <th data-toggle="tooltip" data-placement="top" title="" data-original-title="La gágina va a aparecer en los componentes que listen dinámicamente otras páginas o bien en el menú principal (si estuviera dentro de los dos primeros niveles)">Visible</th>
                                            <th data-toggle="tooltip" data-placement="top" title="" data-original-title="Si hubiera componentes que listen otras páginas y en su criterio sólo lo hagan con páginas destacadas, este sería el flag para hacer que la página sea listada o no.">Destacada</th>                                                                                                                                    
                                            <th></th>
                                        </tr>
                                    </head>


                                    <tbody id="items">
                                        
                                        @foreach ($items as $i)
                                            
                                            <tr data-id="{{$i->id}}">
                                                
                                                <td class="d-none d-sm-table-cell" style="width: 100px;">
                                                   
                                                    <a href="{{ route('admin.folder.panel',['id'=>$i->id]) }}" rel="popover"  data-img="{{$i->getScreenshot()}}">
                                                        <img src="{{$i->getScreenshot()}}" style="width:100%"/>   
                                                    </a>                                               
                                                                                                       
                                                </td>

                                                <td>
                                                    {{-- <a class="font-w600 {!! $i->published?'text-black':'text-secondary' !!}" href="{{ route('admin.folder.panel',['id'=>$i->id]) }}" rel="popover"  data-img="{{$i->getScreenshot()}}"> --}}
                                                    <a class="text-black" href="{{ route('admin.folder.panel',['id'=>$i->id]) }}">
                                                       {{$i->name}}                                                        
                                                    </a>
                                                    <div class="text-muted mt-5" style="opacity:0.7">
                                                        
                                                        @if(Request::get('fullchildren')=='1')
                                                            @foreach($i->breadcrumb() as $b)
                                                                <a href="{{ route('admin.folder.panel',['id'=>$b->id]) }}" style="color:#6c757d ">{{$b->name}}</a> / 
                                                            @endforeach                                                                  
                                                        @endif

                                                        {{-- @if(isset($i->cover->title) && $i->cover->title != '')
                                                            <span class="text-primary"><strong>Título: </strong>{{ $i->cover->title }}</span><br>
                                                        @endif
                                                        @if(isset($i->cover->subtitle) && $i->cover->subtitle != '')
                                                            <span class="text-primary"><strong>Subtítulo: </strong>{{ $i->cover->subtitle }}</span><br>
                                                        @endif
                                                        @if(isset($i->cover->description) && $i->cover->description != '')
                                                            <span class="text-primary"><strong>Descripción: </strong>{{ $i->cover->description }}</span><br>
                                                        @endif --}}
                                                        @if(isset($i->cover->date) && $i->cover->date != '')
                                                            <br><span class="text-primary"><strong>Fecha: </strong>{{ $i->cover->date }}</span><br>
                                                        @endif
                                                    </div>
                                                </td> 

                                                <td>
                                                    {!! $i->isExternal()?'<i class="fa fa-circle"></i>':'<i style="opacity:0.2" class="fa fa-circle-o"></i>' !!}
                                                </td>                                                
                                                <td>
                                                    {!! $i->hasChildren()?'<i class="fa fa-circle"></i>':'<i style="opacity:0.2" class="fa fa-circle-o"></i>' !!}
                                                </td>
                                                
                                                <td>                                                    
                                                    {!! $i->hasContents()?'<i class="fa fa-circle"></i>':'<i style="opacity:0.2" class="fa fa-circle-o"></i>' !!}                                                    
                                                </td>
                                                <td>
                                                    {!! $i->published?'<i class="fa fa-circle"></i>':'<i style="opacity:0.2" class="fa fa-circle-o"></i>' !!}
                                                </td>
                                                <td>
                                                    {!! $i->pinned?'<i class="fa fa-circle"></i>':'<i style="opacity:0.2" class="fa fa-circle-o"></i>' !!}
                                                </td>
                                                
                                                <td>
                                                    <a href="{{$i->getLink()['href']}} " target="_blank" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i></a>
                                                    @if($i->canHandle())                                                
                                                        <a class="btn btn-sm btn-secondary" href="{{ route('admin.folder.compose',['id'=>$i->id]) }}" ><i class="fa fa-edit" data-toggle="tooltip"  title="" data-original-title="Editar Contenidos"></i></a>                                                        
                                                        <a class="btn btn-sm btn-secondary" href="{{ route('admin.folder.duplicate',['id'=>$i->id]) }}" ><i class="fa fa-copy" data-toggle="tooltip"  title="" data-original-title="Duplicar"></i></a>
                                                        <a class="btn btn-sm btn-secondary folder-cut" data-id="{{ $i->id }}" ><i class="fa fa-cut" data-toggle="tooltip"  title="" data-original-title="Cortar"></i></a>
                                                        <a class="btn btn-sm btn-secondary" href="{{ route('admin.folder.delete',['id'=>$i->id]) }}" ><i class="fa fa-trash" data-toggle="tooltip"  title="" data-original-title="Eliminar"></i></a>                                                                                                                                                                    
                                                    @endif                                                    
                                                </td>

                                            </tr>
                                        
                                        @endforeach
    
                                    </tbody>
                                </table>
                                <!-- END Messages -->
                            </div>
                        </div>
                        <!-- END Message List -->

                    {{-- @endif --}}
                    
                </div>
            </div>

        </div>
    </main>


    
<!-- Compose Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header">
                        <h3 class="block-title">
                            <i class="fa fa-pencil mr-5"></i> Nueva
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form class="form-add" action="" method="post">

                            <input type="hidden" name="parent_id" value="{{$item->id or '-1'}}" />

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material form-material-primary input-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="">
                                        <label for="name">Nombre</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="si si-book-open"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material form-material-primary input-group">
                                        <input type="text" class="form-control" id="message-subject" name="message-subject" placeholder="What is this about?">
                                        <label for="message-subject">Título Alternativo</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="si si-book-open"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material form-material-primary">
                                        <textarea class="form-control" id="description" name="description" rows="6" placeholder=""></textarea>
                                        <label for="description">Descripción</label>
                                    </div>
                                    <div class="form-text font-size-sm text-muted">Este campo se utiliza para SEO y para algunos componentes que obtienen información dinámica de las páginas</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-alt-primary action-button" on="rest">
                                    <i class="fa fa-spin fa-asterisk mr-5 on-working"></i><span class="on-rest">Aceptar</span>
                                </button>
                                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Compose Modal -->


    <script>


    
        var addFormInit = function() {
            // var modal = $('form.form-cover');
            var form = $('form.form-add');
            var submitButton = form.find('.btn-alt-primary');
            var cancelButton = form.find('.btn-alt-secondary');
            var submitUrl = '{{ route('admin.folder.add') }}';

            // Forms Validation https://github.com/jzaefferer/jquery-validation
            // var formValidationInit = function(){
            //     form.validate({
            //         ignore: [],
            //         errorClass: 'invalid-feedback animated fadeInDown',
            //         errorElement: 'div',
            //         errorPlacement: function(error, e) {
            //             $(e).parents('.form-group').append(error);
            //         },
            //         highlight: function(e) {
            //             $(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            //         },
            //         success: function(e) {
            //             $(e).closest('.form-group').removeClass('is-invalid');
            //             $(e).remove();
            //         },
            //         rules: {
            //             'title': {
            //                 required: true,
            //                 minlength: 3
            //             }
            //         },
            //         messages: {
            //             'title': {
            //                 required: 'Debe ingresar un nombre',
            //                 minlength: 'El nombre debe tener al menos 3 caracteres'
            //             }
            //         }
            //     });
            // };


            var formSubmit = function(){

                if(submitButton.attr('on')=='working') return false;
                submitButton.attr('on','working');

                // corro las validaciones y si me da ok, es que podemos enviar el form
                if(form.valid()){

                    var formdata = false;
                    if (window.FormData){
                        formdata = new FormData(form[0]);
                    }

                    var data = formdata ? formdata : form.serialize();

                    $.ajax({
                        url: submitUrl,
                        type: 'POST',
                        data: data,
                        cache       : false,
                        contentType : false,
                        processData : false,
                        dataType: 'JSON',
                        success: function (response) {
                            submitButton.attr('on','rest');

                            formSubmitedOk(response);

                        },
                        error: function (response) {
                            submitButton.attr('on','rest');
                            // console.log(response);

                            if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION

                                formHasValidations(response);

                            }
                            else{ // ERROR

                                formHasErrors(response);

                            }

                        }
                    });

                }
                else{
                    submitButton.attr('on','rest');
                }

            };

            // el formulario se envió y volvio OK
            var formSubmitedOk = function(response){
                console.log(response)

                $.notify({
                    message: 'Todo perfecto!',
                },{
                    type: 'success',
                    placement: { from: 'top', align: 'center'}
                });

                if(typeof response.redirect != 'undefined'){
                    document.location = response.redirect;
                }

                closeModal();

            };

            // el formulario se enviópero surgieron validaciones del lado del controller
            var formHasValidations = function(response){

                if(typeof response.responseJSON.validations != 'undefined'){

                    // el controller nos está informando validaciones del lado del server
                    var validations = response.responseJSON.validations;
                    Object.keys(validations).forEach(function(k){
                        // console.log(k + ' - ' + validations[k]);

                        var fieldGroup = form.find('*[name="'+k+'"]').closest('.form-group');
                            fieldGroup.addClass('is-invalid');
                            fieldGroup.append('<div id="slug-error" class="invalid-feedback animated fadeInDown">'+validations[k]+'</div>');

                    });

                }

                $.notify({
                    message: 'Mejor revisemos antes de enviar',
                },{
                    type: 'danger',
                    placement: { from: 'top', align: 'center'}
                });

            };

            // el formulario al enviarse devolvió algún error (controlado o no)
            var formHasErrors = function(response){

                // Veo si es un error de Laravel, devuelve un Json con la info de debug, caso contrario, asumo que es un texto que devuelvo desde el Controller
                var errorDescription = '';
                if(typeof response.responseJSON != 'undefined'){
                    errorDescription = '<strong>Error:</strong> '  + response.responseJSON.message + '<br /><strong>Lugar:</strong> ' + response.responseJSON.file + '<br /><strong>Linea:</strong> ' + response.responseJSON.line;
                }
                else{
                    errorDescription = response.responseText;
                }

                swal('Mmm.. tenemos un problema', errorDescription, 'error');

            };


            var closeModal = function(){
                $('#modal-add').modal('hide');
            };


            var saveSort = function() {

                var data = {};
                    data.items = [];
                    data.id = '{{ $item->id or '-1'}}';
                
                $('#items tr').each(function(){                   
                    var itemId = $(this).attr("data-id");
                    data.items.push(itemId);
                });

                console.log(data)

                $.ajax({
                    url: '{{ route('admin.folder.panel.sort') }}',
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    success: function (response) {
                        console.log(response)

                        $.notify({
                            message: 'Orden guardado!',
                        },{
                            type: 'success',
                            placement: { from: 'top', align: 'center'}
                        });

                    }
                });


            }


            var folderCut = function($id) {

                var data = {};
                    data.id = $id;

                console.log(data)

                $.ajax({
                    url: '{{ route('admin.folder.cut') }}',
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    success: function (response) {
                        console.log(response)

                        $.notify({
                            message: 'Página cortada',
                        },{
                            type: 'warning',
                            placement: { from: 'top', align: 'center'}
                        });

                    }
                });


            }


            return {
                init: function () {

                    // formValidationInit();

                  
                    submitButton.on('click', function(e){
                        e.preventDefault();
                        formSubmit();
                    })

                    cancelButton.on('click', function(e){
                        e.preventDefault();
                        closeModal();
                    })


                    $('.folder-cut').on('click', function(e){
                        e.preventDefault();

                        var id = $(this).attr('data-id');

                        folderCut(id);

                    })


                    // actualizar hidden con el valor destino de la lista combinada
                    form.find(".profile-list").sortable({
                      connectWith: ".connectedSortable",
                      stop: function(event, ui) {
                          var ids = $.map(
                              $('#available_profiles').children('li'),
                              function(element) {
                                  return $(element).attr('data-id')
                              })
                          .join(',');
                          $('input[name="profiles"]').val(ids);
                      }
                    }).disableSelection();

                    // preview de contenidos de cada pagina
                    $('a[rel="popover"]').popover({
                        html: true,
                        trigger: 'hover',
                        content: function () {
                            return '<img src="'+$(this).data('img') + '" />';
                        }
                    });


                    //items
                    $('#items').sortable({
                        // handle: 'tr',
                        stop: function( event, ui ) {
                            saveSort();
                        }
                    });


                }
            };
        }();
        $(function(){
            addFormInit.init();
        });



    </script>

@endsection