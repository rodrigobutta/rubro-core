<section class="component component-card-ti-stacked" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    {{-- contenido dinamico --}}
    @if($item->origin==1 && isset($p_pointer))
        @php($folder = \App\Folder::find($p_pointer))
        @foreach($folder->getChildren($item->getParams()) as $i)

            <a href="{{$i->getLink()['href']}}" class="component-card-ti-stacked__card">
                <h3 class="component-card-ti-stacked__card__title">{{$i->cover->title or ''}}</h3>
                @isset($i->cover->image)
                <img src="{{Resizer::widen(160,$i->cover->image)}}" alt="" class="component-card-ti-stacked__card__icon">
                @endisset
            </a>

        @endforeach
    @else

        @isset($fields->list)
            @foreach($fields->list as $i)
                <a href="{{ getLink($i->fields->link) }}" class="component-card-ti-stacked__card">
                    <h3 class="component-card-ti-stacked__card__title">{!! field($i->fields->name, '') !!}</h3>
                    @isset($i->fields->image)
                    <img src="{{Resizer::widen(160,$i->fields->image)}}" alt="" class="component-card-ti-stacked__card__icon">
                    @endisset
                </a>
            @endforeach
        @else

            <a href="" class="component-card-ti-stacked__card">
                 <h3 class="component-card-ti-stacked__card__title">Ley de CPCECABA</h3>
                 <img src="./images/icons/1.png" alt="" class="component-card-ti-stacked__card__icon">
             </a>
             <a href="" class="component-card-ti-stacked__card">
                 <h3 class="component-card-ti-stacked__card__title">Ley de CPCECABA</h3>
                 <img src="./images/icons/2.png" alt="" class="component-card-ti-stacked__card__icon">
             </a>
             <a href="" class="component-card-ti-stacked__card">
                 <h3 class="component-card-ti-stacked__card__title">Ley de CPCECABA</h3>
                 <img src="./images/icons/3.png" alt="" class="component-card-ti-stacked__card__icon">
             </a>
             <a href="" class="component-card-ti-stacked__card">
                 <h3 class="component-card-ti-stacked__card__title">Ley de CPCECABA</h3>
                 <img src="./images/icons/3.png" alt="" class="component-card-ti-stacked__card__icon">
             </a>
             <a href="" class="component-card-ti-stacked__card">
                 <h3 class="component-card-ti-stacked__card__title">Ley de CPCECABA</h3>
                 <img src="./images/icons/3.png" alt="" class="component-card-ti-stacked__card__icon">
             </a>
             <a href="" class="component-card-ti-stacked__card">
                 <h3 class="component-card-ti-stacked__card__title">Ley de CPCECABA</h3>
                 <img src="./images/icons/3.png" alt="" class="component-card-ti-stacked__card__icon">
             </a>
             <a href="" class="component-card-ti-stacked__card">
                 <h3 class="component-card-ti-stacked__card__title">Ley de CPCECABA</h3>
                 <img src="./images/icons/3.png" alt="" class="component-card-ti-stacked__card__icon">
             </a>

        @endif


    @endisset

</section>