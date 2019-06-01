<section class="component component-list-pvt" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    @if($item->origin==1 && isset($p_pointer))
        @php( $items = \App\Folder::find($p_pointer)->getChildren($item->getParams()) )
        @if(sizeof($items)>0)

            <ul class="component-list-pvt__container">

            @foreach($items as $i)

                <li class="component-list-pvt__item">
                    <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="component-list-pvt__link">
                        <div class="component-list-pvt__img" style="background:url('{{Resizer::widen(900,$i->cover->image)}}') no-repeat center;background-size:cover;"></div>
                        <div class="component-list-pvt__text">
                            <h4 class="component-list-pvt__subtitle">{{$i->parent->cover->title}}</h4>
                            <p class="component-list-pvt__p">
                                {{$i->cover->title}}
                            </p>
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
    @else

        @if(isset($fields->folders) && sizeof($fields->folders)>0)

            <ul class="component-list-pvt__container">

                @php($items = fieldObjectsOfArray($fields->folders,\App\Folder::class) )

                @foreach($items as $key => $i)

                    <li class="component-list-pvt__item">
                        <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="component-list-pvt__link">
                            <div class="component-list-pvt__img" style="background:url('{{Resizer::widen(900,$i->cover->image)}}') no-repeat center;background-size:cover;"></div>
                            <div class="component-list-pvt__text">
                                <h4 class="component-list-pvt__subtitle">{{$i->parent->cover->title}}</h4>
                                <p class="component-list-pvt__p">
                                    {{$i->cover->title}}
                                </p>
                            </div>
                        </a>
                    </li>

                @endforeach

            </ul>

        @else

            <ul class="component-list-pvt__container">
                <li class="component-list-pvt__item">
                    <a href="#" class="component-list-pvt__link">
                        <div class="component-list-pvt__img" style="background:url(images/img_list-pt_01.png) no-repeat center;background-size:cover;"></div>
                        <div class="component-list-pvt__text">
                            <h4 class="component-list-pvt__subtitle">Cultura</h4>
                            <p class="component-list-pvt__p">
                                Rubik-Regular 18 line-height #464646
                            </p>
                        </div>
                    </a>
                </li>
                <li class="component-list-pvt__item">
                    <a href="#" class="component-list-pvt__link">
                        <div class="component-list-pvt__img" style="background:url(images/img_list-pt_01.png) no-repeat center;background-size:cover;"></div>
                        <div class="component-list-pvt__text">
                            <h4 class="component-list-pvt__subtitle">Cultura</h4>
                            <p class="component-list-pvt__p">
                                Rubik-Regular 18 line-height #464646
                            </p>
                        </div>
                    </a>
                </li>
                <li class="component-list-pvt__item">
                    <a href="#" class="component-list-pvt__link">
                        <div class="component-list-pvt__img" style="background:url(images/img_list-pt_01.png) no-repeat center;background-size:cover;"></div>
                        <div class="component-list-pvt__text">
                            <h4 class="component-list-pvt__subtitle">Cultura</h4>
                            <p class="component-list-pvt__p">
                                Rubik-Regular 18 line-height #464646
                            </p>
                        </div>
                    </a>
                </li>
            </ul>

        @endif

    @endif


</section>