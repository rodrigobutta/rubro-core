<div class="component component-btn-it-landscape" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    @isset($fields->list)
        @foreach($fields->list as $i)
            <a href="{{ getLink($i->fields->link) }}" target="{{ gg($i->fields->blank)==1?'_blank':'_self' }}" class="btn-it-landscape__btn">
                <img src="{{$i->fields->image or './images/icons/1.png'}}" alt="" class="btn-it-landscape__btn__icon">
                <span class="btn-it-landscape__btn__text">{{$i->fields->name or ''}}</span>
            </a>
        @endforeach
    @else

        <a href="#" target="_blank" class="btn-it-landscape__btn">
            <img src="./images/icons/4.png" alt="" class="btn-it-landscape__btn__icon">
            <span class="btn-it-landscape__btn__text">Circulo de Empleo</span>
        </a>
        <a href="#" target="_blank" class="btn-it-landscape__btn">
            <img src="./images/icons/4.png" alt="" class="btn-it-landscape__btn__icon">
            <span class="btn-it-landscape__btn__text">Reuniones Cientificas y Tecnicas</span>
        </a>
        <a href="#" target="_blank" class="btn-it-landscape__btn">
            <img src="./images/icons/4.png" alt="" class="btn-it-landscape__btn__icon">
            <span class="btn-it-landscape__btn__text">Circulo de Empleo</span>
        </a>
        <a href="#" target="_blank" class="btn-it-landscape__btn">
            <img src="./images/icons/4.png" alt="" class="btn-it-landscape__btn__icon">
            <span class="btn-it-landscape__btn__text">Circulo de Empleo</span>
        </a>
        <a href="#" target="_blank" class="btn-it-landscape__btn">
            <img src="./images/icons/4.png" alt="" class="btn-it-landscape__btn__icon">
            <span class="btn-it-landscape__btn__text">Circulo de Empleo</span>
        </a>
        <a href="#" target="_blank" class="btn-it-landscape__btn">
            <img src="./images/icons/4.png" alt="" class="btn-it-landscape__btn__icon">
            <span class="btn-it-landscape__btn__text">Circulo de Empleo</span>
        </a>
        <a href="#" target="_blank" class="btn-it-landscape__btn">
            <img src="./images/icons/4.png" alt="" class="btn-it-landscape__btn__icon">
            <span class="btn-it-landscape__btn__text">Circulo de Empleo</span>
        </a>
        <a href="#" target="_blank" class="btn-it-landscape__btn">
            <img src="./images/icons/4.png" alt="" class="btn-it-landscape__btn__icon">
            <span class="btn-it-landscape__btn__text">Circulo de Empleo</span>
        </a>

    @endif

</div>