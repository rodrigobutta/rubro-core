@foreach($items as $i)
<a href="{{$i->getLink()['href']}}" target="{{$i->getLink()['target']}}" class="component-card-1ptd-4ptd-vertical__card" style="background-image: url('{{Resizer::widen(900,$i->cover->image)}}');background-size:cover;" data-item-id="{{$i->id}}">
    <div class="component-card-1ptd-4ptd-vertical__card__bottom">
        <h3 class="component-card-1ptd-4ptd-vertical__card-title">{{$i->cover->title}}</h3>
    </div>
</a>
@endforeach