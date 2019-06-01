<section class="component component-list-ptd-date" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    @if($item->origin==1 && isset($p_pointer))
        @php( $items = \App\Folder::find($p_pointer)->getChildren($item->getParams()) )
        @if(sizeof($items)>0)

            <ul class="component-list-ptd-date__container">

            @foreach($items as $i)

                <li class="component-list-ptd-date__item">
                    <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="component-list-ptd-date__link">
                        
                        <div class="component-list-ptd-date__col left">
                            
                            @if(isset($i->cover->date) && $i->cover->date != '')
                                <span class="component-list-ptd-date__date">{{$i->cover->getDate('d/m')}}</span>
                            @endif

                            <div class="component-list-ptd-date__img" style="background:url('{{Resizer::widen(600,$i->cover->image)}}') no-repeat center;background-size:cover;"></div>
                        </div>
                        
                        <div class="component-list-ptd-date__col right">
                            <h3 class="component-list-ptd-date__title">{{$i->cover->title}}</h3>
                            <p class="component-list-ptd-date__text">{{$i->cover->description}}</p>
                            <p class="component-list-ptd-date__text"><strong>{{$i->cover->subtitle}}</strong></p>
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

        <ul class="component-list-ptd-date__container">

        @php($items = fieldObjectsOfArray($fields->folders,\App\Folder::class) )

        @foreach($items as $key => $i)

            <li class="component-list-ptd-date__item">
                <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="component-list-ptd-date__link">
                    <div class="component-list-ptd-date__col left">
                        
                        @if(isset($i->cover->date) && $i->cover->date != '')
                            <span class="component-list-ptd-date__date">{{$i->cover->getDate('d/m')}}</span>
                        @endif

                        <div class="component-list-ptd-date__img" style="background:url('{{Resizer::widen(600,$i->cover->image)}}') no-repeat center;background-size:cover;"></div>
                    </div>
                    <div class="component-list-ptd-date__col right">
                        <h3 class="component-list-ptd-date__title">{{$i->cover->title}}</h3>
                        <p class="component-list-ptd-date__text">{{$i->cover->description}}</p>
                        <p class="component-list-ptd-date__text"><strong>{{$i->cover->subtitle}}</strong></p>
                    </div>
                </a>
            </li>

        @endforeach

        </ul>

    @else

        @isset($fields->list)
            <ul class="component-list-ptd-date__container">
                @foreach($fields->list as $i)

                    <li class="component-list-ptd-date__item">
                        <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="component-list-ptd-date__link">
                            <div class="component-list-ptd-date__col left">
                                <span class="component-list-ptd-date__date">{{$i->fields->date or ''}}</span>
                                <div class="component-list-ptd-date__img" style="background:url(images/img_list-pt_01.png) no-repeat center;background-size:cover;"></div>
                            </div>
                            <div class="component-list-ptd-date__col right">
                                <h3 class="component-list-ptd-date__title">{!! field($i->fields->name, '') !!}</h3>
                                <p class="component-list-ptd-date__text">{!! field($i->fields->description, '') !!}</p>
                                <p class="component-list-ptd-date__text"><strong>{!! field($i->fields->tail, '') !!}</strong></p>
                            </div>
                        </a>
                    </li>

                @endforeach
            </ul>
        @else

            <ul class="component-list-ptd-date__container">
                <li class="component-list-ptd-date__item">
                    <a href="#" target="_blank" class="component-list-ptd-date__link">
                        <div class="component-list-ptd-date__col left">
                            <span class="component-list-ptd-date__date">19/4</span>
                            <div class="component-list-ptd-date__img" style="background:url(images/img_list-pt_01.png) no-repeat center;background-size:cover;"></div>
                        </div>
                        <div class="component-list-ptd-date__col right">
                            <h3 class="component-list-ptd-date__title">Rubik-Bold 25 line-height 30 #565655</h3>
                            <p class="component-list-ptd-date__text">Rubik-Regular 16 line-height 21 #464646</p>
                            <p class="component-list-ptd-date__text"><strong>Rubik-Medium line-height 21 #464646</strong></p>
                        </div>
                    </a>
                </li>
                <li class="component-list-ptd-date__item">
                <a href="#" target="_blank" class="component-list-ptd-date__link">
                    <div class="component-list-ptd-date__col left">
                        <span class="component-list-ptd-date__date">19/4</span>
                        <div class="component-list-ptd-date__img" style="background:url(images/img_list-pt_02.png) no-repeat center;background-size:cover;"></div>
                    </div>
                    <div class="component-list-ptd-date__col right">
                        <h3 class="component-list-ptd-date__title">Rubik-Bold 25 line-height 30 #565655</h3>
                        <p class="component-list-ptd-date__text">Rubik-Regular 16 line-height 21 #464646</p>
                        <p class="component-list-ptd-date__text"><strong>Rubik-Medium line-height 21 #464646</strong></p>
                    </div>
                </a>
                </li>
                <li class="component-list-ptd-date__item">
                <a href="#" target="_blank" class="component-list-ptd-date__link">
                    <div class="component-list-ptd-date__col left">
                        <span class="component-list-ptd-date__date">19/4</span>
                        <div class="component-list-ptd-date__img" style="background:url(images/img_list-pt_03.png) no-repeat center;background-size:cover;"></div>
                    </div>
                    <div class="component-list-ptd-date__col right">
                        <h3 class="component-list-ptd-date__title">Rubik-Bold 25 line-height 30 #565655</h3>
                        <p class="component-list-ptd-date__text">Rubik-Regular 16 line-height 21 #464646</p>
                        <p class="component-list-ptd-date__text"><strong>Rubik-Medium line-height 21 #464646</strong></p>
                    </div>
                </a>
                </li>
            </ul>

        @endif

    @endif



</section>