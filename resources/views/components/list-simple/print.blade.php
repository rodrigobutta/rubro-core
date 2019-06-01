<section class="component component-list-simple" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if($item->origin==1 && isset($p_pointer))
        @php( $items = \App\Folder::find($p_pointer)->getChildren($item->getParams()) )
        @if(sizeof($items)>0)

            <ul class="component-list-simple__container">

            @foreach($items as $i)

                <li class="component-list-simple__item">
                    <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="component-list-simple__link">                        
                        <div class="component-list-simple__col">
                            <h3 class="component-list-simple__title">{{$i->cover->title}}</h3>
                            <p class="component-list-simple__text">{{$i->cover->description}}</p>
                            <p class="component-list-simple__text"><strong>{{$i->cover->subtitle}}</strong></p>
                        </div>
                    </a>
                </li>

            @endforeach

            </ul>

        @else
            <div class="alert alert-warning alert-dismissable" role="alert">
                <h3 class="alert-heading font-size-h4 font-w400">{{$item->component->title}}</h3>
                <p class="mb-0">El componente dinámico no encontró elementos para mostrar. <a class="btn-edit" href="javascript:void(0)">Revisar configuración</a>!</p>
            </div>
        @endif

    @elseif(isset($fields->folders))

        <ul class="component-list-simple__container">

        @php($items = fieldObjectsOfArray($fields->folders,\App\Folder::class) )

        @foreach($items as $key => $i)

            <li class="component-list-simple__item">
                <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="component-list-simple__link">                  
                    <div class="component-list-simple__col">
                        <h3 class="component-list-simple__title">{{$i->cover->title}}</h3>
                        <p class="component-list-simple__text">{{$i->cover->description}}</p>
                        <p class="component-list-simple__text"><strong>{{$i->cover->subtitle}}</strong></p>
                    </div>
                </a>
            </li>

        @endforeach

        </ul>

    @else

        @isset($fields->list)
            <ul class="component-list-simple__container">
                @foreach($fields->list as $i)

                    <li class="component-list-simple__item">
                        <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="component-list-simple__link">                        
                            <div class="component-list-simple__col">
                                <h3 class="component-list-simple__title">{!! field($i->fields->name, '') !!}</h3>
                                <p class="component-list-simple__text">{!! field($i->fields->description, '') !!}</p>
                                <p class="component-list-simple__text"><strong>{!! field($i->fields->tail, '') !!}</strong></p>
                            </div>
                        </a>
                    </li>

                @endforeach
            </ul>
        @else

            <ul class="component-list-simple__container">
                <li class="component-list-simple__item">
                    <a href="#" target="_blank" class="component-list-simple__link">                   
                        <div class="component-list-simple__col">
                            <h3 class="component-list-simple__title">Rubik-Bold 25 line-height 30 #565655</h3>
                            <p class="component-list-simple__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p class="component-list-simple__text"><strong>Rubik-Medium line-height 21 #464646</strong></p>
                        </div>
                    </a>
                </li>
                <li class="component-list-simple__item">
                <a href="#" target="_blank" class="component-list-simple__link">                   
                    <div class="component-list-simple__col">
                        <h3 class="component-list-simple__title">Rubik-Bold 25 line-height 30 #565655</h3>
                        <p class="component-list-simple__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p class="component-list-simple__text"><strong>Rubik-Medium line-height 21 #464646</strong></p>
                    </div>
                </a>
                </li>
                <li class="component-list-simple__item">
                <a href="#" target="_blank" class="component-list-simple__link">                
                    <div class="component-list-simple__col">
                        <h3 class="component-list-simple__title">Rubik-Bold 25 line-height 30 #565655</h3>
                        <p class="component-list-simple__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p class="component-list-simple__text"><strong>Rubik-Medium line-height 21 #464646</strong></p>
                    </div>
                </a>
                </li>
            </ul>

        @endif

    @endif



</section>