<section class="component component-card-1ptd-4ptd-vertical" data-component="" data-content-id="{{$id}}" data-folder-id="{{$item->folder->id}}">
    @include('admin.master.component.common')

    
    <div class="component-card-1ptd-4ptd-vertical__container">
    

        <div class="component-card-1ptd-4ptd-vertical__wrapper">

            @if($item->origin==1 && isset($p_pointer))
                @php
                $initial_load = 3;
                $page_size = 4;
                $item_params = $item->getParams();
                $max_items = sizeof(\App\Folder::find($p_pointer)->getChildren($item_params));
                $item_params->max = $initial_load;
                $items = \App\Folder::find($p_pointer)->getChildren($item_params);
                @endphp

                @if(sizeof($items)>0)

                    @foreach($items as $key => $i)

                        @if($key==0)

                                <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="component-card-1ptd-4ptd-vertical__card component-card-1ptd-4ptd-vertical__card--highlighted" style="background-image: url('{{Resizer::widen(900,$i->cover->image)}}');background-size:cover;" data-item-id="{{$i->id}}">
                                    <div class="component-card-1ptd-4ptd-vertical__card__bottom">
                                        <h3 class="component-card-1ptd-4ptd-vertical__card-title">{{$i->cover->title}}</h3>
                                    </div>
                                </a>

                            </div>

                            <div class="component-card-1ptd-4ptd-vertical__wrapper children">

                        @else

                            <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="component-card-1ptd-4ptd-vertical__card" style="background-image: url('{{Resizer::widen(900,$i->cover->image)}}');background-size:cover;" data-item-id="{{$i->id}}">
                                <div class="component-card-1ptd-4ptd-vertical__card__bottom">
                                    <h3 class="component-card-1ptd-4ptd-vertical__card-title">{{$i->cover->title}}</h3>
                                </div>
                            </a>

                        @endif

                    @endforeach
                @else
                    <div class="alert alert-warning alert-dismissable" role="alert">
                        <h3 class="alert-heading font-size-h4 font-w400">{{$item->component->title}}</h3>
                        <p class="mb-0">El componente dinámico no encontró elementos para mostrar. <a class="btn-edit" href="javascript:void(0)">Revisar configuración</a>!</p>
                    </div>
                @endif
            @else

                @isset($fields->folders)

                    @php($items = fieldObjectsOfArray($fields->folders,\App\Folder::class) )
                    @foreach($items as $key => $i)

                        @if($key==0)

                                <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="component-card-1ptd-4ptd-vertical__card component-card-1ptd-4ptd-vertical__card--highlighted" style="background-image: url('{{Resizer::widen(900,$i->cover->image)}}');background-size:cover;">
                                    <div class="component-card-1ptd-4ptd-vertical__card__bottom">
                                        <h3 class="component-card-1ptd-4ptd-vertical__card-title">{{$i->cover->title}}</h3>
                                    </div>
                                </a>

                            </div>

                            <div class="component-card-1ptd-4ptd-vertical__wrapper">

                        @else

                            <a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="component-card-1ptd-4ptd-vertical__card" style="background-image: url('{{Resizer::widen(900,$i->cover->image)}}');background-size:cover;">
                                <div class="component-card-1ptd-4ptd-vertical__card__bottom">
                                    <h3 class="component-card-1ptd-4ptd-vertical__card-title">{{$i->cover->title}}</h3>
                                </div>
                            </a>

                        @endif

                    @endforeach

                @else

                    <div class="component-card-1ptd-4ptd-vertical__wrapper">
                            <a href="#" class="component-card-1ptd-4ptd-vertical__card component-card-1ptd-4ptd-vertical__card--highlighted" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');background-size:cover;">
                                <div class="component-card-1ptd-4ptd-vertical__card__bottom">
                                    <h3 class="component-card-1ptd-4ptd-vertical__card-title">Titular<br> Rubik Regular</h3>
                                </div>
                            </a>
                        </div>

                        <div class="component-card-1ptd-4ptd-vertical__wrapper">
                            <a href="#" class="component-card-1ptd-4ptd-vertical__card" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');background-size:cover;">
                                <div class="component-card-1ptd-4ptd-vertical__card__bottom">
                                    <h3 class="component-card-1ptd-4ptd-vertical__card-title">Titular<br> Rubik Regular</h3>
                                </div>
                            </a>
                            <a href="#" class="component-card-1ptd-4ptd-vertical__card" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');background-size:cover;">
                                <div class="component-card-1ptd-4ptd-vertical__card__bottom">
                                    <h3 class="component-card-1ptd-4ptd-vertical__card-title">Titular<br> Rubik Regular</h3>
                                </div>
                            </a>
                            <a href="#" class="component-card-1ptd-4ptd-vertical__card" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');background-size:cover;">
                                <div class="component-card-1ptd-4ptd-vertical__card__bottom">
                                    <h3 class="component-card-1ptd-4ptd-vertical__card-title">Titular<br> Rubik Regular</h3>
                                </div>
                            </a>
                            <a href="#" class="component-card-1ptd-4ptd-vertical__card" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');background-size:cover;">
                                <div class="component-card-1ptd-4ptd-vertical__card__bottom">
                                    <h3 class="component-card-1ptd-4ptd-vertical__card-title">Titular<br> Rubik Regular</h3>
                                </div>
                            </a>
                        </div>

                    </div>

                @endisset


            @endif
        
        </div>
        @if($item->origin==1 && isset($p_pointer))
        <div class="load-more">
            <a href="{{route('api.more_news')}}" data-source={{$p_pointer}} data-size="{{$page_size}}" data-max="{{$max_items}}">Cargar Más</a>
        </div>
        @endif

</section>

@if($item->origin==1 && isset($p_pointer))
<script>
    $(document).ready(function() {
        var $component = $('.component-card-1ptd-4ptd-vertical[data-folder-id="{{$item->folder->id}}"]');
        var $wrapper = $component.find('.component-card-1ptd-4ptd-vertical__wrapper.children');
        var $load_more = $component.find('.load-more');
        var $load_more_link = $load_more.find('a');
        var is_loading = false;
        var can_load_more = true;
        var params = JSON.parse({!! json_encode($item->params) !!});

        var loadMoreNews = function(last) {
            var url = $load_more_link.attr('href');
            is_loading = true;
            $load_more.addClass('loading');
            $.ajax({
                url: url + '?source=' + $load_more_link.attr('data-source') + '&last=' + $wrapper.find('.component-card-1ptd-4ptd-vertical__card').last().attr('data-item-id') + '&size=' + $load_more_link.attr('data-size') + '&params=' + JSON.stringify(params),
                success: function(data) {
                    $wrapper.append(data);
                    is_loading = false;
                    $load_more.removeClass('loading');
                    if($wrapper.find('>a').length + 1 === parseInt($load_more_link.attr('data-max'), 10)) {
                        $load_more.hide();
                    }
                }
            });
        }

        $load_more_link.on('click', function() {
            loadMoreNews();
        })

        $(window).on('scroll', function() {
            var docViewTop = $(window).scrollTop();
            var docViewBottom = docViewTop + $(window).height();

            var elemTop = $load_more_link.offset().top;
            var elemBottom = elemTop + $load_more_link.height();
            var is_visible = ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));

            if(is_visible && !is_loading) {
                loadMoreNews();
            }
        });
    });
</script>
@endif