<section class="component component-card-ti-stretched" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    @isset($fields->list)
        @foreach($fields->list as $i)
            <a href="{{ getLink($i->fields->link) }}" class="component-card-ti-stretched__card">
                <h3 class="component-card-ti-stretched__card__title">{!! field($i->fields->name, '') !!}</h3>
                @isset($i->fields->image)
                <img src="{{Resizer::widen(300,$i->fields->image)}}" alt="" class="component-card-ti-stretched__card__icon">
                @endisset
            </a>
        @endforeach
    @else

        <a href="" class="component-card-ti-stretched__card">
            <h3 class="component-card-ti-stretched__card__title">Ley de CPCECABA</h3>
            <img src="./images/icons/1.png" alt="" class="component-card-ti-stretched__card__icon">
        </a>
        <a href="" class="component-card-ti-stretched__card">
            <h3 class="component-card-ti-stretched__card__title">Ley de CPCECABA</h3>
            <img src="./images/icons/2.png" alt="" class="component-card-ti-stretched__card__icon">
        </a>
        <a href="" class="component-card-ti-stretched__card">
            <h3 class="component-card-ti-stretched__card__title">Ley de CPCECABA</h3>
            <img src="./images/icons/3.png" alt="" class="component-card-ti-stretched__card__icon">
        </a>

    @endif

</section>