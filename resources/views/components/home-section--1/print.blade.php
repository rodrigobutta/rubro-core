<section class="component component-home-section--1 section section--1" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @if(isset($fields->folders) && sizeof($fields->folders)>4)

        @php($items = fieldObjectsOfArray($fields->folders,\App\Folder::class) )

        <div class="home-card-1ptd-4td home-card-1ptd-4td--main">
            <div class="home-card-1ptd-4td__wrapper">
                <a href="{{ $items[0]->getLink()['href'] }}" target="{{$items[0]->getLink()['target']}}" class="home-card-1ptd-4td__card home-card-1ptd-4td__card--highlighted" style="background-image: url('{{Resizer::widen(900,$items[0]->cover->image)}}');">
                    <div class="home-card-1ptd-4td__card__bottom">
                        <h3 class="home-card-1ptd-4td__card__title">{{ $items[0]->cover->title }}</h3>
                    </div>
                </a>
            </div>
            <div class="home-card-1ptd-4td__wrapper">
                
                @if(isset($items[1]))
                <a href="{{ $items[1]->getLink()['href'] }}" target="{{$items[1]->getLink()['target']}}" class="home-card-1ptd-4td__card" style="background-image: url('{{Resizer::widen(900,$items[1]->cover->image)}}');">
                    <div class="home-card-1ptd-4td__card__bottom">
                        <h3 class="home-card-1ptd-4td__card__title">{{ $items[1]->cover->title or '' }}</h3>
                    </div>
                </a>
                @endif
                @if(isset($items[2]))
                <a href="{{ $items[2]->getLink()['href'] }}" target="{{$items[2]->getLink()['target']}}" class="home-card-1ptd-4td__card" style="background-image: url('{{Resizer::widen(900,$items[2]->cover->image)}}');">
                    <div class="home-card-1ptd-4td__card__bottom">
                        <h3 class="home-card-1ptd-4td__card__title">{{ $items[2]->cover->title or '' }}</h3>
                    </div>
                </a>
                @endif
                @if(isset($items[3]))
                <a href="{{ $items[3]->getLink()['href'] }}" target="{{$items[3]->getLink()['target']}}" class="home-card-1ptd-4td__card" style="background-image: url('{{Resizer::widen(900,$items[3]->cover->image)}}');">
                    <div class="home-card-1ptd-4td__card__bottom">
                        <h3 class="home-card-1ptd-4td__card__title">{{ $items[3]->cover->title or '' }}</h3>
                    </div>
                </a>
                @endif
                @if(isset($items[4]))
                <a href="{{ $items[4]->getLink()['href'] }}" target="{{$items[4]->getLink()['target']}}" class="home-card-1ptd-4td__card" style="background-image: url('{{Resizer::widen(900,$items[4]->cover->image)}}');">
                    <div class="home-card-1ptd-4td__card__bottom">
                        <h3 class="home-card-1ptd-4td__card__title">{{ $items[4]->cover->title or '' }}</h3>
                    </div>
                </a>
                @endif

            </div>
        </div>

    @else

        <div class="home-card-1ptd-4td home-card-1ptd-4td--main">
            <div class="home-card-1ptd-4td__wrapper">
                <a href="#" class="home-card-1ptd-4td__card home-card-1ptd-4td__card--highlighted" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');">
                    <div class="home-card-1ptd-4td__card__bottom">
                        <h3 class="home-card-1ptd-4td__card__title">Titular<br> Rubik Regular</h3>
                    </div>
                </a>
            </div>
            <div class="home-card-1ptd-4td__wrapper">
                <a href="#" class="home-card-1ptd-4td__card" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');">
                    <div class="home-card-1ptd-4td__card__bottom">
                        <h3 class="home-card-1ptd-4td__card__title">Titular<br> Rubik Regular</h3>
                    </div>
                </a>
                <a href="#" class="home-card-1ptd-4td__card" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');">
                    <div class="home-card-1ptd-4td__card__bottom">
                        <h3 class="home-card-1ptd-4td__card__title">Titular<br> Rubik Regular</h3>
                    </div>
                </a>
                <a href="#" class="home-card-1ptd-4td__card" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');">
                    <div class="home-card-1ptd-4td__card__bottom">
                        <h3 class="home-card-1ptd-4td__card__title">Titular<br> Rubik Regular</h3>
                    </div>
                </a>
                <a href="#" class="home-card-1ptd-4td__card" style="background-image: url('http://clientes.agenciaego.com.ar/Consejo/dummy.gif');">
                    <div class="home-card-1ptd-4td__card__bottom">
                        <h3 class="home-card-1ptd-4td__card__title">Titular<br> Rubik Regular</h3>
                    </div>
                </a>
            </div>
        </div>


    @endif


</section>